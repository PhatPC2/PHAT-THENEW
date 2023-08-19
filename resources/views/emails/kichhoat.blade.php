<div style="width: 600px; margin:0 auto">
  <div style="text-align:center">
    <h2>Xin Chào {{$user->name}}</h2>
    <p>Bạn đã đăng kí tài khoản tại hệ thống chúng tôi</p>
    <p>Vui lòng xác thực tại đây: <a href="{{ route('user.actived',['user'=> $user->id,'token'=>$user->token])}}">Kích hoạt tài khoản</a></p>
  </div>


</div> 