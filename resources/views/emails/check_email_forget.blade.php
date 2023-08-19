<div style="width: 600px; margin:0 auto">
  <div style="text-align:center">
    <h2>Xin Chào {{$user->name}}</h2>
    <p>Email này giúp bạn lấy lại mật khẩu</p>
    <p>Vui lòng bấm vào link này: <a href="{{ route('user.getPass',['user'=> $user->id,'token'=>$user->token])}}">Đặt lại mật khẩu</a></p>
  </div>


</div> 