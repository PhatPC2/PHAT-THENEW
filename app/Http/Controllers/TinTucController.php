<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TinTuc;
use App\Models\LoaiTin;
use App\Models\TheLoai;


class TinTucController extends Controller
{
    //
     //
     public function danhSach(){
        $tintuc = TinTuc::orderBy('id')->get();
         return view('admin/tintuc/danhsach',['tintuc'=>$tintuc]);
    }
    
    public function them(){
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        return view('admin/tintuc/them',[ 'theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
    public function them_(Request $req){
        $this->validate($req,
        [
           'TieuDe'=>'required|unique:TinTuc,TieuDe|min:1|max:100',
           'LoaiTin'=>'required',
            'TomTat'=>'required',
            'NoiDung'=>'required'
        ],
        [
           'TieuDe.required'=>'Bạn chưa nhập tên loại tin',
           'TieuDe.unique'=>'Tên tin tức đã tồn tại',
           'TieuDe.min'=>'Tên tin tức phải có độ dài từ 1 đến 100 kí tự',
           'TieuDe.max'=>'Tên tin tức phải có độ dài từ 1 đến 100 kí tự',
           'LoaiTin.required'=>'Bạn chưa chọn loại tin',
           'TomTat.required'=>'Bạn chưa nhập tóm tắt',
           'NoiDung.required'=>'Bạn chưa nhập nội dung'
        ]);
        $tintuc = new TinTuc;
        $tintuc->TieuDe = $req->TieuDe;
        $tintuc->idLoaiTin = $req->LoaiTin;
        $tintuc->TomTat = $req->TomTat;
        $tintuc->NoiDung = $req->NoiDung;
        $tintuc->SoLuotXem = 0;
        if($req->hasFile('Hinh')){
            $file = $req->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('admin/tintuc/them')->with('loi','Bạn chỉ được chọn file có đuôi là jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = random_int(1,4)."_". $name; 
            while(file_exists("images/". $Hinh)){
                $Hinh = random_int(1,4)."_". $name;
            }
            $file->move("images/",$Hinh);
            $tintuc->Hinh = $Hinh;

        }else{
            $tintuc->Hinh = "";
        }
        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao','Thêm thành công');
    }

    function xoa($id){
        $tintuc = TinTuc::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }

    function sua($id){
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        $tintuc = TinTuc::find($id);
        return view('admin/tintuc/sua',['loaitin'=>$loaitin,'tintuc'=>$tintuc,'theloai'=>$theloai]);
    }
    function sua_(Request $req, $id){
        $tintuc = TinTuc::find($id);
        $this->validate($req,
        [
           'TieuDe'=>'required|unique:TinTuc,TieuDe|min:1|max:100',
           'LoaiTin'=>'required',
            'TomTat'=>'required',
            'NoiDung'=>'required'
        ],
        [
           'TieuDe.required'=>'Bạn chưa nhập tên loại tin',
           'TieuDe.unique'=>'Tên tin tức đã tồn tại',
           'TieuDe.min'=>'Tên tin tức phải có độ dài từ 1 đến 100 kí tự',
           'TieuDe.max'=>'Tên tin tức phải có độ dài từ 1 đến 100 kí tự',
           'LoaiTin.required'=>'Bạn chưa chọn loại tin',
           'TomTat.required'=>'Bạn chưa nhập tóm tắt',
           'NoiDung.required'=>'Bạn chưa nhập nội dung'
        ]);

        $tintuc->TieuDe = $req->TieuDe;
        $tintuc->idLoaiTin = $req->LoaiTin;
        $tintuc->TomTat = $req->TomTat;
        $tintuc->NoiDung = $req->NoiDung;
        if($req->hasFile('Hinh')){
            $file = $req->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('admin/tintuc/them')->with('loi','Bạn chỉ được chọn file có đuôi là jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $Hinh = random_int(1,4)."_". $name; 
            while(file_exists("images/". $Hinh)){
                $Hinh = random_int(1,4)."_". $name;
            }
           
            $file->move("images/",$Hinh);
            unlink("images/".$tintuc->Hinh);
            $tintuc->Hinh = $Hinh;

        }
        $tintuc->save();
        return redirect('admin/tintuc/danhsach')->with('thongbao','Cập nhập thành công!');
    }
}
