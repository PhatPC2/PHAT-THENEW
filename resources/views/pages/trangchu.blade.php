@extends('layout.index')
@section('content')
<div class="slider_area">
    <div class="slider">
        <ul class="bxslider">
            <li><img src="images/1.jpg" alt="" title="" /></li>
            <li><img src="images/2.jpg" alt="" title="" /></li>
            <li><img src="images/3.jpg" alt="" title="" /></li>
        </ul>
    </div>
</div>
<div class="content_area">
    <div class="main_content floatleft">
        <div class="left_coloum floatleft">
            <div class="single_left_coloum_wrapper">
                <h2 class="title">latest news</h2>
                <a class="more" href="#">more</a>
                @foreach($data as $tm)
                <div class="single_left_coloum floatleft"> <img src="/images/{{$tm->Hinh}}" alt="" />
                    <h3><a href="{{url('tintrongloai/chitiet',[$tm->id])}}">{{$tm->TieuDe}}</a></h3>
                    <p>{{$tm->TomTat}}</p>
                    <a class="readmore" href="#">read more</a>
                </div>
                @endforeach           
            </div>
            <div class="single_left_coloum_wrapper">
                <h2 class="title">most prominent</h2>
                <a class="more" href="#">more</a>
                @foreach($noibat as $nb)
                <div class="single_left_coloum floatleft"> <img src="/images/{{$nb->Hinh}}" alt="" />
                    <h3><a href="{{url('tintrongloai/chitiet',[$nb->id])}}">{{$nb->TieuDe}}</a></h3>
                    <p>{{$nb->TomTat}}</p>
                    <a class="readmore" href="#">read more</a>
                </div>
                @endforeach
            </div>
            <div class="single_left_coloum_wrapper gallery">
                <h2 class="title">Gallery</h2>
                <a class="more" href="#">more</a> 
                @foreach($images as $img)
                <img src="/images/{{$img->Hinh}}" alt="" /> 
                @endforeach
            </div>
            <div class="single_left_coloum_wrapper single_cat_left">
                <h2 class="title">SPORTS</h2>
                <a class="more" href="#">more</a>
                @foreach($sports as $sp)
                <div class="single_cat_left_content floatleft">
                    <h3><a href="{{url('tintrongloai/chitiet',[$sp->id])}}">{{$sp->TieuDe}}</a></h3>
                    <p>{{$sp->TomTat}}</p>
                    <p class="single_cat_left_content_meta">by <span>John Doe</span> | 29 comments</p>
                </div>
                @endforeach
            </div>
        </div>
        <div class="right_coloum floatright">
            <div class="single_right_coloum">
                <h2 class="title">Type of news</h2>
                <ul>
                    <li>
                        @foreach($loaitin as $lt)
                        <div class="single_cat_right_content">
                            <h3>{{$lt->Ten}}</h3>
                            <p>{{$lt->tintuc_TieuDe}}</p>
                            <p class="single_cat_right_content_meta"><a href="#"><span>read more</span></a>{{$lt->ngaydang}}</p>
                        </div>
                        @endforeach
                    </li>
                </ul>
                <a class="popular_more" href="#">more</a>
            </div>
            <div class="single_right_coloum">
                <h2 class="title">topic</h2>
                @foreach($topic as $tl)
                <div class="single_cat_right_content editorial"> <img src="/images/{{$tl->hinhtl}}" alt="" />
                    <h3>{{$tl->tentl}}</h3>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="sidebar floatright">
        <div class="single_sidebar"> <img src="images/add1.png" alt="" /> </div>
        <div class="single_sidebar">
            <div class="news-letter">
                <h2>Sign Up for Newsletter</h2>
                <p>Sign up to receive our free newsletters!</p>
                <form action="#" method="post">
                    <input type="text" value="Name" id="name" />
                    <input type="text" value="Email Address" id="email" />
                    <input type="submit" value="SUBMIT" id="form-submit" />
                </form>
                <p class="news-letter-privacy">We do not spam. We value your privacy!</p>
            </div>
        </div>
        <div class="single_sidebar">
            <!-- <div class="popular">
                <h2 class="title">Popular</h2>
                <ul>
                    <li>
                        <div class="single_popular">
                            <p>Sept 24th 2045</p>
                            <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit <a href="#" class="readmore">Read More</a></h3>
                        </div>
                    </li>
                    <li>
                        <div class="single_popular">
                            <p>Sept 24th 2045</p>
                            <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit <a href="#" class="readmore">Read More</a></h3>
                        </div>
                    </li>
                    <li>
                        <div class="single_popular">
                            <p>Sept 24th 2045</p>
                            <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit <a href="#" class="readmore">Read More</a></h3>
                        </div>
                    </li>
                    <li>
                        <div class="single_popular">
                            <p>Sept 24th 2045</p>
                            <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit <a href="#" class="readmore">Read More</a></h3>
                        </div>
                    </li>
                    <li>
                        <div class="single_popular">
                            <p>Sept 24th 2045</p>
                            <h3>Lorem ipsum dolor sit amet conse ctetur adipiscing elit <a href="#" class="readmore">Read More</a></h3>
                        </div>
                    </li>
                </ul>
                <a class="popular_more">more</a>
            </div> -->
        </div>
        <div class="single_sidebar"> <img src="images/add1.png" alt="" /> </div>
        <div class="single_sidebar">
            <h2 class="title">ADD</h2>
            <img src="images/add2.png" alt="" />
        </div>
    </div>
</div>
@endsection