<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiTin;
use App\Models\TheLoai;

class AjaxController extends Controller
{
    //
   public function getLoaiTin($idTheLoai){
       $loaitin = LoaiTin::where('idTheLoai',$idTheLoai)->get();
       foreach($loaitin as $lt){
       echo "<option value='".$lt->id."'>".$lt->Ten."</option>";
       }
   }
}
?>