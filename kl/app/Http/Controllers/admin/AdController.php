<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateAdmin;
use Illuminate\Support\Facades\DB;
use App\ModelQuocgia;

class AdController extends Controller
{
   public function GetDashboard(){
       return view('admin.dashboard');
   }

   public function GetThongtincanhan(){
        $dataquocgia = ModelQuocgia::all();
        $data = Auth::user();
        return view('admin.thongtincanhan',compact('data','dataquocgia'));
   }

    public function PostThongtincanhan(UpdateAdmin $request){

        $name = $request->name;
        $anh = $request->file('anh');
        $password = bcrypt($request->password);
        $adt = $request->sdt;
        $quocgia = $request->quocgia;
        $diachi = $request->diachi;
    
        
        
        $anh = $anh->getClientOriginalName();
        $id = Auth::user()->id;

        if($password == ''){
            $password = bcrypt(Auth::user()->password);
        }

        if(DB::table('users')->where('id',$id)->update([
            'name'=>$name,
            'diachi'=>$diachi,
            'password'=>$password,
            'sdt'=>$adt,
            'anh'=>$anh,
            'id_quocgia'=>$quocgia]))
        {
            $link ='admin/assets/images/users';
            $anh->move($link,$anh->getClientOriginalName());
            
            return redirect()->back()->with('success','Cập nhật thông tin thành công');
        }else{
            return redirect()->back()->withErrors('Cập nhật thông tin that bai');
        
        }    
        
    }


    public function GetQuocgia(){
        $data = ModelQuocgia::all();
        return view('admin.quocgia',compact('data'));
    }

    public function GetXoaquocgia($id){
        if (ModelQuocgia::where('id',$id)->delete()) {
            return redirect()->back()->with('success','Xóa thông tin quốc gia thành công');
        }else{
            return redirect()->back()->withErrors('Xóa thông tin quốc gia thất bại');
        }
    }


    public function GetThemquocgia(){
        return view('admin.themquocgia');
    }

    public function PostThemquocgia(Request $request){
        $data = new ModelQuocgia;
         $data->tenqg = $request->tenqg;
         $data->save();
         if($data->save()){
             return redirect()->back()->with('success','Thêm thông tin quốc gia thành công');
         }else{
             return redirect()->back()->withErrors('Thêm thông tin quốc gia thất bại');
         }
    }

}
