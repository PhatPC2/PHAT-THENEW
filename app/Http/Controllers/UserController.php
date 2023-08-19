<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiTin;
use App\Models\TheLoai;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    //


    public function danhSach(){
        $user = User::all();
        return view('admin/user/danhsach',['user'=>$user]);
    }

    public function them(){
       return view('admin/user/them');
    }
    public function them_(Request $req){
        $this->validate($req,[
           'name' =>'required|min:3',
           'email'=>'required|email|unique:users,email',
           'password' => 'required|min:3|max:32',
           'passwordAgain' => 'required|same:password'
        ],
        [
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải có ít nhất 3 kí tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa nhập đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' =>'Bạn chưa nhập password',
            'password.min' => 'Mật khẩu phải có ít nhất 3 kí tự',
            'password.max' => 'Mật khẩu tối đa 32 kí tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại password',
            'passwordAgain.same' => 'Bạn nhập lại chưa khớp password',

        ]);

        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->level = $req->level;
        $user->save();
        return redirect('admin/user/danhsach')->with('thongbao','Thêm thành công');
    }

    function xoa($id){
       $user = User::find($id);
       $user->delete();
       return redirect('admin/user/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }

    function sua($id){
        $user = User::find($id);
        return view('admin/user/sua',['user'=>$user]);
    }
    function sua_(Request $req, $id){
        $this->validate($req,[
            'name' =>'required|min:3',
        
         ],
         [
             'name.required' => 'Bạn chưa nhập tên người dùng',
             'name.min' => 'Tên người dùng phải có ít nhất 3 kí tự',
 
         ]);
         $user = User::find($id);
         $user->name = $req->name;
         $user->level = $req->level;


         if($req->changepass == "on"){
            $this->validate($req,[
                'password' => 'required|min:3|max:32',
                'passwordAgain' => 'required|same:password'
             ],
             [
                 'password.required' =>'Bạn chưa nhập password',
                 'password.min' => 'Mật khẩu phải có ít nhất 3 kí tự',
                 'password.max' => 'Mật khẩu tối đa 32 kí tự',
                 'passwordAgain.required' => 'Bạn chưa nhập lại password',
                 'passwordAgain.same' => 'Bạn nhập lại chưa khớp password',
     
             ]);

         $user->password = bcrypt($req->password);
         }
         $user->save();
         return redirect('admin/user/danhsach')->with('thongbao','Sửa thành công');
         
    }

function getdangnhapAdmin(){
    return view('admin.login');
}
 function postdangnhapAdmin(Request $req){
    $this->validate($req,[
                 'email'=>'required|email',
                 'password'=>'required|min:8',
              ],[
                 'email.required'=>'Vui lòng nhập email',
                 'email.email'=>'Vui lòng nhập đúng dạng email',
                 'password.required'=>'Vui lòng nhập password',
              ]);

         if(Auth::attempt(['email'=>$req->email,'password'=>$req->password])){
            return redirect('admin/theloai/danhsach');
         }else{
            return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công');
         } 
}

function DangXuatAdmin(){
    Auth::logout();
    return redirect('admin/dangnhap');
}

}
