<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;
class ControllerQuanlyuser extends Controller
{
    public function Quanlyuser(){
        $user = User::all();
        return view('admin.quanlyuser',compact('user'));
    }
    public function XoaUser(){

    }
    public function GetHotro(){

    }
    public function PostHotro(){

    }
    

    
}
