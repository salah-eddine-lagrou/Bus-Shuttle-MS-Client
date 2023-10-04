<?php

namespace App\Http\Controllers;

use DB;
//use Brian2694
use Hash;
use Session;
use Carbon\Carbon;
use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOlPassword;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class UserManagementController extends Controller
{
    public function index(){
        if(Auth::user()->role_name=='Admin'){
            $data =DB::table('clients')->get();

            return view('usermanagement.user_control',compact('data'));
        }else{
            return redirect()->route('home');
        }
    }

    public function viewDetail($id){
        if(Auth::user()->role_name=='Admin'){
            $data = DB::table('clients')->where('id',$id)->get();
            $name= DB::table('role_type_users')->get();
            $email = DB::table('user_types')->get();

            return view('usermanagement.view_users',compact('data','roleName','userStatus'));
        }else{
            return redirect()->route('main_dashboard');

        }
    }
    public function activityLog(){

    }
}
