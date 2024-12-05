<div class="sidebar col-xs-12 col-md-4">
    <!-- <aside class="widget widget_search">
        <form action="#" method="get" class="search-form">
            <input type="text" name="s" placeholder="Search...">
            <button type="submit" class="btn btn-search">
                <i class="icon-magnifier"></i>
            </button>
        </form>
    </aside> -->
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
            <li><a href="#" >{{ $cat->title }}</a>{{ $cat->posts_count }}</li>
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
    @if ($post->tags->count())
        <aside class="widget widget_tags">
            <h3 class="widget-title">Tags</h3>
            <div class="content">
            @foreach ($post->tags as $tag)
                <a href="#" title="news">{{ $tag->title }}</a>
            @endforeach
            </div>
        </aside>
    @endif
</div>