<?php

namespace App\Http\Controllers;
require app_path('Helpers/helper.php');

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

use App\Models\Common_model as Common_model;
use Session;
use Validator;

class UserController extends Controller{

    private $Common_model; 
    public function __construct(Common_model $Common_model){
        $this->Common_model = $Common_model; 
    }

    public function index(){
       echo 'User Index';
      //$data['title'] = 'Dashboard';
     // return view('admin/dashboard',$data);
    }

    public function dashboard(){

      echo 'User Dashboard';
      $data['title']   = 'My Account';
     // $user_id = session('user_id');
     
     // return view('frontEnd/userManagement/dashboard', $data);
    }

    

}
