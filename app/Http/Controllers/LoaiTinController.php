<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiTin;
use App\Models\TheLoai;

class LoaiTinController extends Controller
{
    //
    public function danhSach(){
        $loaitin = LoaiTin::all();
         return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }

    public function them(){
        $theloai = TheLoai::all();
        return view('admin/loaitin/them',['theloai'=>$theloai]);
    }
    public function them_(Request $req){
        $this->validate($req,
        [
           'Ten'=>'required|unique:LoaiTin,Ten|min:1|max:100',
           'TheLoai'=>'required'
        ],
        [
           'Ten.required'=>'Bạn chưa nhập tên loại tin',
           'Ten.unique'=>'Tên loại tin đã tồn tại',
           'Ten.min'=>'Tên loại tin phải có độ dài từ 1 đến 100 kí tự',
           'Ten.max'=>'Tên loại tin phải có độ dài từ 1 đến 100 kí tự',
           'TheLoai.required'=>'Bạn chưa chọn thể loại'
        ]);
        $loaiTin = new LoaiTin;
        $loaiTin->Ten = $req->Ten;
        $loaiTin->idTheLoai = $req->TheLoai;
        $loaiTin->save();
        return redirect('admin/loaitin/them')->with('thongbao','Thêm thành công');
    }

    function xoa($id){
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();
        return redirect('admin/loaitin/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }

    function sua($id){
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::find($id);
        return view('admin/loaiTin/sua',['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }
    function sua_(Request $req, $id){
        $loaitin = LoaiTin::find($id);
        $this->validate($req,
        [
            'Ten'=>'required|unique:LoaiTin,Ten|min:1|max:100',
            'TheLoai'=>'required'
         ],
         [
            'Ten.required'=>'Bạn chưa nhập tên loại tin',
            'Ten.unique'=>'Tên loại tin đã tồn tại',
            'Ten.min'=>'Tên loại tin phải có độ dài từ 1 đến 100 kí tự',
            'Ten.max'=>'Tên loại tin phải có độ dài từ 1 đến 100 kí tự',
            'TheLoai.required'=>'Bạn chưa chọn thể loại'
         ]);

        $loaitin->Ten = $req->Ten;
        $loaitin->idTheLoai = $req->TheLoai;
        $loaitin->save();
        return redirect('admin/loaitin/danhsach')->with('thongbao','Cập nhập thành công!');
    }
}
