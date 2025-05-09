<div class="sidebar col-xs-12 col-md-4">
    <style>
        .widget_search {
            visibility: hidden; /* Скрывает содержимое виджета */
            margin-top: 7.6px;
        }
    </style>
    <aside class="widget widget_search">
        <form action="#" method="get" class="search-form">
            <input type="text" name="s" placeholder="Search...">
            <button type="submit" class="btn btn-search">
                <i class="icon-magnifier"></i>
            </button>
        </form>
    </aside>
    <aside class="widget widget_social">
        <h3 class="widget-title">Контакты</h3>
        <div class="social">
        <a title="Скачать резюме" download href="{{ asset('Resume.pdf') }}"><i class="far fa-file"></i></a>
            <a href="https://t.me/rem1zoff_oleg" title="Телеграм" target="_blank">
                <i class="fab fa-telegram-plane"></i>
            </a>

            <a title="Скопировать почту" href="#" onclick="copyEmail(event, 'job.rem1zoff@gmail.com')">
                <i class="fab fa-google-plus-g"></i>
            </a>

            <a href="https://github.com/OlegRemizoff" title="Git" target="_blank">
                <i class="fab fa-github"></i>
            </a>

        </div>
    </aside>
    <aside class="widget widget_category">
        <h3 class="widget-title">Категории</h3>
        <ul>
        @foreach ($cats as $cat)
            <li><a href="{{ route('posts.by.category', [$cat->slug]) }}" >{{ $cat->title }}</a>{{ $cat->posts_count }}</li>
        @endforeach
        </ul>
    </aside>
    <aside class="widget widget_popular_posts">
        <h3 class="widget-title">Популярные посты</h3>
        <div class="post-item-list">
            @if ($popular_posts->count() > 0)
                @foreach ($popular_posts as $pp)
                <div class="post-item">
                    <div class="post-item-img">
                        <a href="{{ route('posts.single', [$pp->slug]) }}"><img src="{{ $pp->getImage() }}" width="98" alt="blog-img" class="img-reponsive"></a>
                    </div>
                    <div class="post-item-text">
                        <div class="post-date">{{ $pp->getPostDate() }}</div>
                        <h3><a href="{{ route('posts.single', [$pp->slug]) }}">{{ $pp->title }}</a></h3>
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
    @if ($post->tags->count() > 0)
        <aside class="widget widget_tags">
            <h3 class="widget-title">Теги</h3>
            <div class="content">
            @foreach ($post->tags as $tag)
                <a href="{{ route('posts.by.tag', [$tag->slug]) }}" title="news">{{ $tag->title }}</a>
            @endforeach
            </div>
        </aside>
    @else
        <aside class="widget widget_tags">
            <h3 class="widget-title">Теги</h3>
            <div class="content">
                <a href="#" title="design" class="active">Design</a>
                <a href="#" title="design" class="active">Fashion</a>
                <a href="#" title="design" class="active">Nature</a>
            </div>
        </aside>
    @endif
</div>

<!-- copy gmail -->
<script>
    function copyEmail(event, email) {
        event.preventDefault(); // Предотвращаем переход по ссылке

        // Проверяем поддержку clipboard
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(email)
                .then(() => {
                    alert('Почта скопирована: ' + email);
                })
                .catch(err => {
                    console.error('Ошибка копирования: ', err);
                });
        } else {
            // Fallback для старых браузеров
            const textarea = document.createElement('textarea');
            textarea.value = email;
            document.body.appendChild(textarea);
            textarea.select();
            try {
                document.execCommand('copy');
                alert('Почта скопирована: ' + email);
            } catch (err) {
                console.error('Ошибка копирования (fallback): ', err);
            }
            document.body.removeChild(textarea);
        }
    }
</script>