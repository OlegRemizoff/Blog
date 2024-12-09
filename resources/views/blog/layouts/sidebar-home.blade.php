<div class="sidebar col-xs-12 col-md-4">
    @if (request()->is('/'))
        <aside class="widget widget_search ">
            <form action="{{ route('search') }}" method="get" class="search-form">
            <input  type="text" name="s" required class="@error('s') is-invalid @enderror" placeholder="Search..." >
                <!-- <input  type="text" name="s" required oninvalid="this.setCustomValidity('Пожалуйста, введите текст для поиска.')" oninput="this.setCustomValidity('')" placeholder="Search..." > -->
                <button type="submit" class="btn btn-search">
                    <i class="icon-magnifier"></i>
                </button>
                @error('s')
                    <div class="invalid-feedback" style="color: red;">
                {{ $message }}
            </div>
            @enderror
            </form>
        </aside>
    @endif

    <aside class="widget widget_social">
        <h3 class="widget-title">Social</h3>
        <div class="social">
            <a href="#" title="twitter">
                <i class="fa fa-twitter"></i>
            </a>
            <a href="#" title="facebook">
                <i class="fa fa-facebook"></i>
            </a>
            <a href="#" title="google plus">
                <i class="fa fa-google-plus"></i>
            </a>
            <a href="#" title="Pinterest">
                <i class="fa fa-pinterest"></i>
            </a>
        </div>
    </aside>
    <aside class="widget widget_category">
        <h3 class="widget-title">Categories</h3>
        <ul>
        @foreach ($cats as $cat)
            <li><a href="{{ route('posts.by.category', [$cat->slug]) }}">{{ $cat->title }}</a>{{ $cat->posts_count }}</li>
        @endforeach
        </ul>
    </aside>
    <aside class="widget widget_popular_posts">
        <h3 class="widget-title">Popular Posts</h3>
        <div class="post-item-list">
            @if ($popular_posts->count())
                @foreach ($popular_posts as $pp)
                <div class="post-item">
                    <div class="post-item-img">
                        <a href="#"><img src="{{ $pp->getImage() }}" width="98" alt="blog-img" class="img-reponsive"></a>
                    </div>
                    <div class="post-item-text">
                        <div class="post-date">{{ $pp->getPostDate() }}</div>
                        <h3><a href="#">{{ $pp->title }}</a></h3>
                    </div>
                </div>
                @endforeach
            @else
            <div class="post-item">
                <div class="post-item-img">
                    <a href="#"><img src="{{ asset('assets/blog/img/blog/popular_2.jpg') }}" alt="blog-img" class="img-reponsive"></a>
                </div>
                <div class="post-item-text">
                    <div class="post-date">February 22, 2017</div>
                    <h3><a href="#">A planner tool to help coordinate</a></h3>
                </div>
            </div>
            <div class="post-item">
                <div class="post-item-img">
                    <a href="#"><img src="{{ asset('assets/blog/img/blog/popular_2.jpg') }}" alt="blog-img" class="img-reponsive"></a>
                </div>
                <div class="post-item-text">
                    <div class="post-date">February 22, 2017</div>
                    <h3><a href="#">A planner tool to help coordinate</a></h3>
                </div>
            </div>
            <div class="post-item">
                <div class="post-item-img">
                    <a href="#"><img src="{{ asset('assets/blog/img/blog/popular_2.jpg') }}" alt="blog-img" class="img-reponsive"></a>
                </div>
                <div class="post-item-text">
                    <div class="post-date">February 22, 2017</div>
                    <h3><a href="#">A planner tool to help coordinate</a></h3>
                </div>
            </div>
            @endif

        </div>
    </aside>
    <!-- <aside class="widget widget_newletters">
        <h3 class="widget-title">Newletters</h3>
        <div class="newletter-form">
            <form action="#">
                <input type="text" name="s" placeholder="Your email address..." class="form-control">
                <button type="submit" class="btn btn-submit">Submit</button>
            </form>
        </div>
    </aside> -->
    <!-- <aside class="widget widget_instagram">
        <h3 class="widget-title">Instagrams</h3>
        <div class="cosre-instagram">
            <div class="item">
                <a class="hover-images" href="#"><img src="{{ asset('assets/blog/img/blog/insta_1.jpg') }}" alt="" class="img-reponsive"></a>
            </div>
            <div class="item">
                <a class="hover-images" href="#"><img src="{{ asset('assets/blog/img/blog/insta_2.jpg') }}" alt="" class="img-reponsive"></a>
            </div>
            <div class="item">
                <a class="hover-images" href="#"><img src="{{ asset('assets/blog/img/blog/insta_3.jpg') }}" alt="" class="img-reponsive"></a>
            </div>
            <div class="item">
                <a class="hover-images" href="#"><img src="{{ asset('assets/blog/img/blog/insta_4.jpg') }}" alt="" class="img-reponsive"></a>
            </div>
            <div class="item">
                <a class="hover-images" href="#"><img src="{{ asset('assets/blog/img/blog/insta_5.jpg') }}" alt="" class="img-reponsive"></a>
            </div>
            <div class="item">
                <a class="hover-images" href="#"><img src="{{ asset('assets/blog/img/blog/insta_6.jpg') }}" alt="" class="img-reponsive"></a>
            </div>
        </div>
    </aside> -->

    @if (($recent_tags ?? collect())->count() > 0)
            <aside class="widget widget_tags">
                <h3 class="widget-title">Recent tags</h3>
                <div class="content">
                @foreach ($recent_tags as $tag)
                    <a href="{{ route('posts.by.tag', [$tag->slug]) }}" title="news">{{ $tag->title }}</a>
                    <!-- <a href="#" title="design" class="active">Design</a> -->
                @endforeach
                </div>
            </aside>
    {{--@else--}}
        <!-- <aside class="widget widget_tags">
            <h3 class="widget-title">Recent tags</h3>
            <div class="content">
                <a href="#" title="design" class="active">Design</a>
                <a href="#" title="design" class="active">Fashion</a>
                <a href="#" title="design" class="active">Nature</a>
            </div>
        </aside> -->
    @endif
</div>