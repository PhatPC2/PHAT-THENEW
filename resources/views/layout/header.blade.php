

<div class="header_area">
  <div class="logo floatleft"><a href="#"><img src="{{asset('images/logo.png')}}" alt="" /></a></div>
  <div class="top_menu floatleft">
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="#">Contact us</a></li>
      @if(isset($user_login))
       <li><a href="">{{$user_login->name}}</a></li>
       <li><a href="/dangxuat">Logout</a></li>

       @else
      <li><a href="/dangnhap">Login</a></li>
      <li><a href="/dangki">Sigup</a></li>
      
      @endif
    </ul>
  </div>
  <div class="social_plus_search floatright">
    <div class="social">
      <ul>
        <li><a href="#" class="twitter"></a></li>
        <li><a href="#" class="facebook"></a></li>
        <li><a href="#" class="feed"></a></li>
      </ul>
    </div>
    <div class="search">
      <form action="#" method="post" id="search_form">
        <input type="text" value="Search news" id="s" />
        <input type="submit" id="searchform" value="search" />
        <input type="hidden" value="post" name="post_type" />
      </form>
    </div>
  </div>
</div>
