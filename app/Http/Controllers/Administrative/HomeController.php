<?php

namespace App\Http\Controllers\Administrative;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\GuestUser;
use App\Models\Instance;
use App\Models\NewsEvents;
use App\Models\ScanHistory;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
  public function index()
  {
      $data['guest_count'] = 0;
      $data['instance_count'] = 0;
      $data['total_scan_count'] = 0;
      $data['admin_count'] = 0;
      $data_ins = 0;
      $label = [];
      $data_one = [];
      $data_tow = [];
      $data['label'] = 0;
      $data['data_one'] = 0;
      $data['data_tow'] = 0;
      return view('administrative.dashboard',$data);
  }
}
