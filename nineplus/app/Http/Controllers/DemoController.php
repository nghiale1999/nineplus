<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RequestRegister;
use App\Http\Requests\RequestLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;
class DemoController extends Controller
{
    
    public function GetDemo(){
        $data = User::all();
        return view('qluser',compact('data'));
    }

    public function GetRegister(){
        return view('register');
    }
    public function PostRegister(RequestRegister $request){
        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $password = bcrypt($request->password);
        $data->password = $password;
        $data->phone = '0';
        $data->address = '';
        $data->id_nationality = 0;
        $data->id_project = 0;

        if($data->save()){
            return redirect()->back()->with('success','them USER thang cong');
        }else{
            return redirect()->back()->withErrors('them user that bai');
        }
        
        
    }

    public function GetLogin(Request $request){
        
        return view('login');
    }



    public function PostLogin(RequestLogin $request){
       
        if($request->remember==null){
            setcookie('login_email',$request->email,100);
            setcookie('login_pass',$request->password,100);
         }
         else{
            setcookie('login_email',$request->email,time()+60*60*24*100);
            setcookie('login_pass',$request->password,time()+60*60*24*100);

         }
        
        $login=[
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if(Auth::attempt($login)){
            return redirect('qluser');
        }else{
            return redirect()->back()->withErrors('email hoac password bi sai');
        }
    }



    public function DeleteUser(Request $request){

        $id_user = $request->id_user;
        if(User::where('id',$id_user)->delete()){
            return "xóa user thành công";
        }else{
            return "xóa user thất bại";
        }

    }


    public function GetEditUser($id){
        $data = User::where('id',$id)->get();
        return view('edit',compact('data'));
    }


    public function PostEditUser(Request $request,$id){
        $name = $request->name;
        $phone = $request->phone;
        $address = $request->address;
        if(User::where('id',$id)->update(['name' => $name,'phone' => $phone,'address' => $address])){
            return redirect()->back()->with('success','update thang cong');
        }else{
            return redirect()->back()->withErrors('update that bai');
        
        }

    }

}
