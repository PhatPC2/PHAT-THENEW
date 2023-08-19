<div class="navbar">
    <div class="row">
        <div class="column column-30 col-site-title">
            <a href="#" class="site-title float-left">Medialoot</a>
        </div>
        <div class="column column-40 col-search">
            <a href="#" class="search-btn fa fa-search"></a>
            <input type="text" name="" value="" placeholder="Search..." />
        </div>
        <div class="column column-30">
            <div class="user-section">
                @auth
                    <a href="#">
                        <img src="http://via.placeholder.com/50x50" alt="profile photo" class="circle float-left profile-photo" width="50" height="auto">
                        <div class="username">
                            @isset($user_login)
                                <h4>{{ $user_login->name }}</h4>
                                <p><a href="admin/logout">Đăng xuất</a></p>
                            @endisset
                        </div>
                    </a>
                @else
                    <a href="admin/dangnhap">Login</a>
                @endauth
            </div>
        </div>
    </div>
</div>
