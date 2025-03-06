<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\GuestUser;
use App\Models\Instance;
use App\Models\ScanHistory;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public  function invitation($type,$instance_code,$guest_code)
    {
        $instance = Instance::where('code',$instance_code)->first();
        $guest = GuestUser::where('code',$guest_code)->first();
        if($instance_code == '000000' && $type == 'others'){
           $history_count =  ScanHistory::where(['type'=>$type,'guest_code'=>$guest_code])->count();
            $data['scan_validity'] = $guest->scan_limitation -  $history_count;
        }else{
           $history_count =  ScanHistory::where(['type'=>$type,'instance_code'=>$instance_code,'guest_code'=>$guest_code])->count();
           $data['scan_validity'] = $instance->scan_limitation  -  $history_count;
        }
        $data['instance_name'] = $instance?$instance->name:'Official Invitation';
        $data['start_date_time'] = $instance?$instance->start_date_time:$guest->start_date_time;
        $data['end_date_time'] = $instance?$instance->end_date_time:$guest->end_date_time;
        $data['instance_location'] = $instance?$instance->location:'Office';
        $data['guest'] = $guest;
        $data['qr'] = 'Invitation,'.$type.','.$instance_code.','.$guest_code;

        return view('frontend.invitation',$data);
    }
    //

}
