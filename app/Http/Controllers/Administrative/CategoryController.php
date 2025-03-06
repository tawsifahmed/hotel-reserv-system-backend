<?php

namespace App\Http\Controllers\Administrative;

use DataTables;
use App\Models\Instance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GuestUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\SimpleExcel\SimpleExcelReader;
use Spatie\SimpleExcel\SimpleExcelWriter;
use App\Jobs\GuestNotification;
class CategoryController extends Controller
{
    public function index()
    {
        return view('administrative.category.index');
    }
    public function data()
    {
        return  $this->getAllData();
    }
    public function create()
    {
        $instances = Instance::all();
        return view('administrative.category.create', compact('instances'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'organisation' => 'nullable|string',
            'phone' => 'nullable',
            'email' => 'nullable',
            'type' => 'required'
        ]);
        if($request->type == 'instance'){
            $request->validate(['instance_id' => 'required|string|max:255']);
            $request->start_date_time = '';
            $request->end_date_time = '';
            $request['scan_limitation']  = 0;
        }else{
            $request->instance_id = '';
            $request->validate(['start_date_time' => 'required','end_date_time' => 'required','scan_limitation' => 'required']);
        }
        $request['code'] = time() . bin2hex(random_bytes(10));
        $instance = Instance::find($request->instance_id);
        if($instance) {
            $request['scan_limitation'] = $instance->scan_limitation;
        }
        $create = GuestUser::create($request->all());
        if($create){
            if($request->email){
                $instance = Instance::find($request->instance_id);
                $inst_code ='000000';
                $instance_name = NULL;
                $scan_limitation = $create->scan_limitation;
                $location = 'Office';
                if($instance){
                    $inst_code = $instance->code;
                    $instance_name = $instance->name;
                    $scan_limitation = $instance->scan_limitation;
                    $location = $instance->location;
                    $request['start_date_time'] = date('Y-m-d H:i:s', strtotime($instance->start_date_time));
                    $request['end_date_time'] = date('Y-m-d H:i:s', strtotime($instance->end_date_time));
                }else{
                    $request['start_date_time'] = date('Y-m-d H:i:s', strtotime($request->start_date_time));
                    $request['end_date_time'] = date('Y-m-d H:i:s', strtotime($request->end_date_time));
                }

                $request['subject'] = $instance_name?'Invitation for '.$instance_name:'Invitation';
                $request['url'] = 'show-invitation/'.$create->type.'/'.$inst_code.'/'.$create->code;
                $request['qr'] = 'Invitation,'.$create->type.','.$inst_code.','.$create->code;
                $request['scan_limitation'] = $scan_limitation;
                $request['instance_location'] = $location;
                dispatch(new GuestNotification($request->all()));
            }
            return  redirect()->route('administrative.guest.user')->with('success', 'Guest added successfully');
        }else{
            return  redirect()->back()->with('failed', 'Guest added Failed');
        }
    }

    public function edit($id)
    {
        $data = GuestUser::findOrFail($id);
        $instances = Instance::all();
        return view('administrative.category.edit', compact('data', 'instances'));
    }

    public function show($id)
    {
        $data = GuestUser::findOrFail($id);
        $instances = Instance::where('id',$data->instance_id)->first();
        $url = 'show-invitation/'.$data->type.'/'.($instances?$instances->code:'000000').'/'.$data->code;
        $qr = 'Invitation,'.$data->type.','.($instances?$instances->code:'000000').','.$data->code;
        return view('administrative.category.show', compact('data', 'instances','url','qr'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'organisation' => 'nullable|string',
            'phone' => 'nullable',
            'email' => 'nullable',
            'type' => 'required'
        ]);
        if($request->type == 'instance'){
            $request->validate(['instance_id' => 'required|string|max:255']);
            $request->start_date_time = '';
            $request->end_date_time = '';
            $request['scan_limitation']  = 0;
        }else{
            $request->instance_id = '';
            $request->validate(['start_date_time' => 'required','end_date_time' => 'required','scan_limitation' => 'required']);
        }

        $data = GuestUser::findOrFail($id);
        if(!$data->code){
            $data->code = time() . bin2hex(random_bytes(10));
        }
        $data->name = $request->input('name');
        $data->organisation = $request->input('organisation');
        $data->phone = $request->input('phone');
        $data->email = $request->input('email');
        $data->type = $request->input('type');
        if ($request->input('type') == 'instance') {
            $data->start_date_time = null;
            $data->end_date_time = null;
            $data->instance_id = $request->input('instance_id');
            $instance = Instance::find($data->instance_id);
            if($instance) {
                $data->scan_limitation = $instance->scan_limitation;
            }
        } elseif ($request->input('type') == 'others') {
            $data->start_date_time = $request->input('start_date_time');
            $data->end_date_time = $request->input('end_date_time');
            $data->instance_id = null;
            $data->scan_limitation = $request->input('scan_limitation');
        }
        $data->save();

        return redirect()->route('administrative.guest.user')->with('success', 'Guest update successfully');
    }

    public function destroy($id)
    {
        $instance = GuestUser::findOrFail($id);
        $instance->delete();
        echo 'success';
    }


    public function getAllData()
    {
        $data = GuestUser::with('instance')->get();
        return Datatables::of($data)
            ->addColumn('action', function ($row) {
                $html = '';
                $html .= '<ul class="orderDatatable_actions mb-0 d-flex justify-content-start flex-wrap">';
                    if(Auth::user()->hasPermissionTo('read_guest')) {
                        $html .= '<li>
                                    <a href="' . route('administrative.guest.user.show', $row->id) . '" class="edit">
                                    <i class="fas fa-eye"></i>
                                    </a>
                                </li>';
                    }
                    if(Auth::user()->hasPermissionTo('update_guest')) {
                        $html .= '<li>
                                    <a href="' . route('administrative.guest.user.edit', $row->id) . '" class="edit">
                                        <i class="uil uil-edit"></i>
                                    </a>
                                </li>';
                    }
                   if(Auth::user()->hasPermissionTo('delete_guest')) {
                       $html .= '<li>
                                    <a href="#" onclick="deleteData(' . $row->id . ');" class="edit">
                                    <i class="fas fa-trash-alt"></i>
                                    </a>
                                </li>';
                   }
                $html .= '</ul>';
                return $html;
            })

            ->editColumn('instance_id', function ($row) {
                return $row->instance ? $row->instance->name : 'Others';
            })

            ->rawColumns(['action', 'instance_id'])
            ->blacklist(['created_at', 'updated_at', 'action', 'deleted_at'])
            ->addIndexColumn()
            ->toJson();
    }

//    Import guest user xls
    public function import(Request $request){
        $rules = array(
            'file' => 'required',
        );
        $validate = Validator::make( $request->all(), $rules);
        if ($validate->passes()) {
            if($request->hasFile('file')){
                $image = $request->file('file');
                $ext = $image->getClientOriginalExtension();
                $new_name = rand() . '.' . $ext;
                $image->move(public_path('import-file'), $new_name);
                $file_name = 'import-file/'.$new_name;
                $rows = SimpleExcelReader::create($file_name,'xlsx')->getRows();
                $rows->each(function(array $rowProperties) {
                    $instance_id = NULL;
                    $instance_name = NULL;
                    $instance_code = NULL;
                    $scan_limitation = $rowProperties['ScanLimitation'];
                    $instance_location = 'Office';
                    $instance_start_date_time = '';
                    $instance_end_date_time = '';
                    if($rowProperties['InstanceCode']){
                        $instance = Instance::where('code',$rowProperties['InstanceCode'])->first();
                        if($instance){
                            $instance_id = $instance->id;
                            $instance_code = $instance->code;
                            $instance_name = $instance->name;
                            $scan_limitation = $instance->scan_limitation;
                            $instance_location = $instance->location;
                            $instance_start_date_time = $instance->start_date_time;
                            $instance_end_date_time = $instance->end_date_time;
                        }
                    }
                    $data = [
                        'name'=>$rowProperties['Name'],
                        'code'=> time() . bin2hex(random_bytes(10)),
                        'organisation'=>$rowProperties['Organisation'],
                        'phone'=>$rowProperties['Phone'],
                        'email'=>$rowProperties['Email'],
                        'instance_id'=>$instance_id,
                        'start_date_time'=>$instance_id?NULL:date('Y-m-d H:i:s', strtotime($rowProperties['StartDateTime'])),
                        'end_date_time'=>$instance_id?NULL:date('Y-m-d H:i:s', strtotime($rowProperties['EndDateTime'])),
                        'type'=>$instance_id?'instance':'others',
                        'scan_limitation' => $scan_limitation
                    ];
                   $create = GuestUser::create($data);
                   if($create){
                       if($rowProperties['Email']){
                           $inst_code ='000000';
                           if($instance_code){
                               $inst_code = $instance_code;
                               $data['start_date_time'] = date('Y-m-d H:i:s', strtotime($instance_start_date_time));
                               $data['end_date_time'] = date('Y-m-d H:i:s', strtotime($instance_end_date_time));
                           }else{
                               $data['start_date_time'] = date('Y-m-d H:i:s', strtotime($create->start_date_time));
                               $data['end_date_time'] = date('Y-m-d H:i:s', strtotime($create->end_date_time));
                           }
                           $data['subject'] = $instance_name?'Invitation for '.$instance_name:'Invitation';
                           $data['url'] = 'show-invitation/'.$data['type'].'/'.$inst_code.'/'.$data['code'];
                           $data['qr'] = 'Invitation,'.$data['type'].','.$inst_code.','.$data['code'];
                           $data['scan_limitation'] = $scan_limitation;
                           $data['instance_location'] = $instance_location;
                           dispatch(new GuestNotification($data));
                       }
                   }
                });
                return response()->json(['success'=>'Guest Excel Import successfully']);
            }
        }
        return response()->json(['error'=>$validate->errors()]);
        exit;
    }

}
