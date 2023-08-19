<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TheLoai;

class TheLoaiController extends Controller
{
    //
    public function danhSach(){
        $theloai = TheLoai::all();
         return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }

    public function them(){
        return view('admin/theloai/them');
    }
    public function them_(Request $req){
        $this->validate($req,
        [
           'Ten'=>'required|min:3|max:100'
        ],
        [
           'Ten.required'=>'Bạn chưa nhập tên thể loại',
           'Ten.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 kí tự',
           'Ten.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 kí tự',

        ]);
        $theloai = new TheLoai;
        $theloai->Ten = $req->Ten;
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','Thêm thành công');
    }

    function xoa($id){
        $theloai = TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }

    function sua($id){
        $theloai = TheLoai::find($id);
        return view('admin/theloai/sua',['theloai'=>$theloai]);
    }
    function sua_(Request $req, $id){
        $theloai = TheLoai::find($id);
        $this->validate($req,
        [
           'Ten'=>'required|min:3|max:100'
        ],
        [
           'Ten.required'=>'Vui lòng nhập tên danh mục',
           'Ten.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 kí tự',
           'Ten.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 kí tự',
        ]);

        $theloai->Ten = $req->Ten;
        $theloai->save();
        return redirect('admin/theloai/danhsach')->with('thongbao','Cập nhập thành công!');
    }
   
}
