<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Mail\ConfirmEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TheLoai; 
use App\Models\LoaiTin; 
use App\Models\TinTuc;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;


class TinController extends Controller
{
   function __construct()
   {
      $theloai = TheLoai::all();
      view()->share('theloai',$theloai);
      
   }
   
   function trangchu(){
    $data = TinTuc::orderBy('created_at','desc')->limit(3)->get();
    $noibat = TinTuc::where('NoiBat',1)->orderBy('created_at')->limit(3)->get();
    $images = TinTuc::select('id','Hinh')->limit(6)->get();
    $sports = TinTuc::where('idLoaiTin',6)->get();
    $loaitin = DB::table('loaitin')
    ->join ('tintuc','loaitin.id','=','tintuc.idLoaiTin')
   ->select('loaitin.*','tintuc.TieuDe as tintuc_TieuDe','tintuc.created_at as ngaydang')
   ->limit(3)
   ->get();
    $topic = DB::table('tintuc')
     ->join('loaitin','tintuc.idLoaiTin','=','loaitin.id')
     ->join('theloai','loaitin.idTheLoai','=','theloai.id')
     ->select('theloai.Ten as tentl','tintuc.Hinh as hinhtl')
     ->where('NoiBat',1)
     ->limit(4)
     ->get();
    return view('pages.trangchu',['data'=>$data,'noibat'=>$noibat,'images'=>$images,'sports'=>$sports,'loaitin'=>$loaitin,'topic'=>$topic]); 
   }

   // function chitiet($id){    
   //    $tin = TinTuc::where('id',$id)->first();
   //    return view('pages.chitiet',['tin'=>$tin]);
   // }
   function chitiet($id){    
      $tin = TinTuc::find($id);
      return view('pages.chitiet',['tin'=>$tin]);
   }

   function tintrongloai($id){
     $loaitin =LoaiTin::find($id);
     $tintuc = TinTuc::where('idLoaiTin',$id)->get();
     return view('pages.tintrongloai',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);

   }
 
   function getdangnhap(){
      return view('pages.dangnhap');
   }
   function postdangnhap(Request $req){
   
      $this->validate($req,[
         'email'=>'required|email',
         'password'=>'required|min:8',
      ],[
         'email.required'=>'Vui lòng nhập email',
         'email.email'=>'Vui lòng nhập đúng dạng email',
         'password.required'=>'Vui lòng nhập password',
      ]);

      if(Auth::attempt(['email'=>$req->email,'password'=>$req->password])){
         if(Auth::user()->status == 0){
            Auth::logout();
            return redirect('dangnhap')->with('thongbao','Tài khoản của bạn chưa được kích hoạt');
         }
         return redirect('/');
      }
      else{
         return redirect('dangnhap')->with('thongbao','Đăng nhập không thành công');
      }
   }

   function getdangxuat(){
      Auth::logout();
      return redirect('/');
   }


   function getdangki(){
      return view('pages.dangki');
   }

   function postdangki(Request $req){
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
      $user->level = 0;
      $user->token = $req->token ?? Str::random(10);
      $user->save();
      Mail::send('emails.kichhoat',compact('user'),function($email) use($user){
         $email->subject('The New - Xác nhận tài khoản');
         $email->to($user->email,$user->name);
      });
      return redirect('dangki')->with('thongbao','Đăng kí thành công.Vui lòng kiểm tra email để xác nhận!');
  }


  function actived(User $user, $token){
      if($user->token == $token){
         $user->update(['status'=>1]);
         return redirect('dangnhap')->with('success','Xác nhận Tài khoản thành công!');

      }else{
         return redirect('dangnhap')->with('thongbao','Mã xác nhận không hợp lệ');
      }
  }


  function forgetPass(){
      return view('pages.forgetPass');
  }

   function postForgetPass(Request $req)
   {

      $this->validate(
         $req,
         [
            'email' => 'required|exists:users',
         ],
         [
            'email.required' => 'Bạn chưa nhập email',
            'email.exists' => 'Email không tồn tại trong hệ thống',

         ]
      );

      $user = User::where('email', $req->email)->first();
      $user->token = $req->token ?? Str::random(10);
      $user->update(['token' => $user->token]);
      Mail::send('emails.check_email_forget', compact('user'), function ($email) use ($user) {
         $email->subject('The New - Lấy lại mật khẩu');
         $email->to($user->email, $user->name);
      });
      return redirect('dangnhap')->with('success', 'Vui lòng check email để thực hiện thay đổi mật khẩu');
   }


   function getPass(User $user, $token){

      if($user->token== $token){
         return view('pages.getPass');
      }
      return abort(404);

   }

   function postGetPass(User $user, Request $req){
      $this->validate($req,[
             'password'=>'required',
             'passwordAgain'=>'required|same:password',
      ],
      [
             'password.required'=>'Password chưa nhập',
             'passwordAgain.required'=>'Nhập lại password',
             'passwordAgain.same'=>'Không khớp',
      ]);
      $user->password = bcrypt($req->password);
      $user->update(['password'=>$user->password,'token'=>null]);
      return redirect('dangnhap')->with('success','đổi mật khẩu thành công!');
   }

}


