<div class="main_menu_area">
    <ul id="nav">
        @foreach($theloai as $tl)
        @if(count($tl->loaitin)>0)
        <li><a href="#">{{$tl->Ten}}</a>
            <ul>
            @foreach($tl->loaitin as $lt)
                <li><a href="/tintrongloai/{{$lt->id}}">{{$lt->Ten}}</a></li>
                @endforeach
            </ul>
        </li>
        @endif
        @endforeach
    </ul>
</div>