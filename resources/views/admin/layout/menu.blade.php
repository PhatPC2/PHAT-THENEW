<style>
  .nav-second-level {
    display: none;
    /* Ẩn các menu con ban đầu */
    padding-left: 50px;
  }


  li:hover .nav-second-level {
    display: block;
    /* Hiển thị menu con khi rê chuột vào menu cha */
  }
</style>


<div id="sidebar" class="column">
  <h5>Navigation</h5>
  <ul>
    <li><a href="#"><em class="fa fa-home"></em> Home</a></li>
    <li>
      <a href="admin/theloai/danhsach"><em class="fa fa-bar-chart"></em> Thể Loại</a>
      <ul class="nav nav-second-level">
        <li><a href="{{route('admin.theloai.danhsach')}}">Danh sách</a> </li>
        <li><a href="admin/theloai/them">Thêm</a></li>
      </ul>
    </li>
    <li>
      <a href="admin/loaitin/danhsach"><em class="fa fa fa-clone"></em> Loại Tin</a>
      <ul class="nav nav-second-level">
        <li><a href="admin/loaitin/danhsach">Danh sách</a> </li>
        <li><a href="admin/loaitin/them"> Thêm</a></li>
      </ul>
    </li>
    <li>
      <a href="admin/tintuc/danhsach"><em class="fa fa-pencil-square-o"></em>Tin Tức</a>
      <ul class="nav nav-second-level">
        <li><a href="admin/tintuc/danhsach">Danh sách</a> </li>
        <li><a href="admin/tintuc/them"> Thêm</a></li>
      </ul>
    </li>
    
    <li>
      <a href="admin/user/danhsach"><em class="bi bi-people"></em>User</a>
      <ul class="nav nav-second-level">
        <li><a href="admin/user/danhsach">Danh sách</a> </li>
        <li><a href="admin/user/them"> Thêm</a></li>
      </ul>
    </li>
    
  </ul>
</div>