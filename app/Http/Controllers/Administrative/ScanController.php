<?php

namespace App\Http\Controllers\Administrative;

use App\Http\Controllers\Controller;
use App\Models\GuestUser;
use App\Models\Instance;
use App\Models\ScanHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DataTables;
use Auth;

class ScanController extends Controller
{

    public  function index(){
        return view('administrative.scan.index');
    }
    public  function create(){
        return view('administrative.scan.create');
    }
    public  function data(){
        $data = ScanHistory::with(['instances','guests'])->get();
        return Datatables::of($data)
            ->addColumn('action', function ($row) {
                $html = '';
                $html .= '<ul class="orderDatatable_actions mb-0 d-flex justify-content-start flex-wrap">';
                if(Auth::user()->hasPermissionTo('read_scan_qr')) {
                    $html .= '<li>
                                    <a href="' . route('administrative.scan.show', $row->id) . '" class="edit">
                                    <i class="fas fa-eye"></i>
                                    </a>
                                </li>';
                }
                if(Auth::user()->hasPermissionTo('delete_scan_qr')) {
                    $html .= '<li>
                                    <a href="#" onclick="deleteData(' . $row->id . ');" class="edit">
                                    <i class="fas fa-trash-alt"></i>
                                    </a>
                                </li>';
                }
                $html .= '</ul>';
                return $html;
            })

            ->editColumn('instance_name', function ($row) {
                return $row->instances ? $row->instances->name : 'Others';
            })
            ->editColumn('guest_name', function ($row) {
                return  $row->guests?$row->guests->name:'';
            })
            ->editColumn('instance_location', function ($row) {
                return $row->instances ? $row->instances->location : 'Office';
            })
            ->editColumn('start_date_time', function ($row) {
                return $row->instances ? date('Y-m-d h:mA',strtotime($row->instances->start_date_time)) : date('Y-m-d h:mA',strtotime($row->guests?$row->guests->start_date_time:''));
            })
            ->editColumn('end_date_time', function ($row) {
                return $row->instances ? date('Y-m-d h:mA',strtotime($row->instances->end_date_time)) : date('Y-m-d h:mA',strtotime($row->guests?$row->guests->end_date_time:''));
            })
            ->editColumn('created_at', function ($row) {
                return date('Y-m-d h:mA',strtotime($row->created_at));
            })

            ->rawColumns(['action', 'instance_name','guest_name','instance_location','start_date_time','end_date_time','created_at'])
            ->blacklist([ 'updated_at', 'action', 'deleted_at'])
            ->addIndexColumn()
            ->toJson();
    }
    public function destroy($id)
    {
        $history = ScanHistory::findOrFail($id);
        $history->delete();
        echo 'success';
    }
    public function show($id)
    {
        $history = ScanHistory::with(['instances','guests'])->findOrFail($id);
        $history['scan_count'] =  ScanHistory::where(['instance_code'=>($history->instances?$history->instances->code:'000000'),'guest_code'=>($history->guests?$history->guests->code:'')])->count();
        $history['last_scan'] =  ScanHistory::where(['instance_code'=>($history->instances?$history->instances->code:'000000'),'guest_code'=>($history->guests?$history->guests->code:'')])->orderBy('id','DESC')->first();
        $history['qr'] = 'Invitation,'.($history->guests?$history->guests->type:'').','.($history->instances?$history->instances->code:'000000').','.($history->guests?$history->guests->code:'');
        $history['url'] = 'show-invitation/'.($history->guests?$history->guests->type:'').'/'.($history->instances?$history->instances->code:'000000').'/'.($history->guests?$history->guests->code:'');
        return view('administrative.scan.show', compact('history'));
    }

    public  function check(Request $request){
        if($request->data){
           $exdata = explode(",",$request->data);
            $type = $exdata[1];
            $instance_code = $exdata[2];
            $guest_code = $exdata[3];
            if($instance_code == '000000' && $type == 'others'){
                $history_count =  ScanHistory::where(['type'=>$type,'guest_code'=>$guest_code])->count();
                $guest = GuestUser::where('code',$guest_code)->first();
                $scan_validity = $guest->scan_limitation -  $history_count;
                if($scan_validity > 0){
                    $guest = GuestUser::where('code',$guest_code)
                        ->whereDate('start_date_time','<=',Carbon::now())
                        ->whereDate('end_date_time','>=',Carbon::now())
                        ->first();
                    if($guest){
                        $storeHistory =  ScanHistory::create(['type'=>$type,'instance_code'=>$instance_code,'guest_code'=>$guest_code,'scan_time'=>1]);
                        if($storeHistory){
                            return response()->json([
                                'error'=>'false',
                                'message'=>'Qr Code Scanning Successful',
                                'code'=>200,
                                'guest'=>$guest
                            ]);
                        }else{
                            return response()->json(['error'=>'true','message'=>'Qr Code Scanning Failed','code'=>400]);
                        }
                    }else{
                        return response()->json(['error'=>'true','message'=>'In-active Qr code','code'=>400]);
                    }
                }else{
                    return response()->json(['error'=>'true','message'=>'Qr Code Scan Limit is Over','code'=>400]);
                }
            }else{
                $instance = Instance::where('code',$instance_code)->first();
                $history_count =  ScanHistory::where(['type'=>$type,'instance_code'=>$instance_code,'guest_code'=>$guest_code])->count();
                $scan_validity = ($instance?(integer)$instance->scan_limitation:0)  -  $history_count;
                if($scan_validity > 0){
                    $instanceDate = Instance::where('code',$instance_code)
                        ->whereDate('start_date_time','<=',Carbon::now())
                        ->whereDate('end_date_time','>=',Carbon::now())
                        ->first();
                    if($instanceDate){
                        $storeHistory =  ScanHistory::create(['type'=>$type,'instance_code'=>$instance_code,'guest_code'=>$guest_code,'scan_time'=>1]);
                        if($storeHistory){
                            $guest = GuestUser::where('code',$guest_code)->first();
                            return response()->json([
                                'error'=>'false',
                                'message'=>'Qr Code Scanning Successful',
                                'code'=>200,
                                'guest'=>$guest
                            ]);
                        }else{
                            return response()->json(['error'=>'true','message'=>'Qr Code Scanning Failed','code'=>400]);
                        }
                    }else{
                        return response()->json(['error'=>'true','message'=>'In-active Qr code','code'=>400]);
                    }

                }else{
                    return response()->json(['error'=>'true','message'=>'Qr Scan Limit is Over','code'=>400]);
                }
            }
        }else{
            return response()->json(['error'=>'true','message'=>'Qr Code is invalid','code'=>400]);
        }
    }
}
