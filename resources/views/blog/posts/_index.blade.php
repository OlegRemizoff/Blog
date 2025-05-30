@extends('blog.layouts.base')

@section('title')@parent Home @endsection

@section('content')
<div class="wrappage">
    @include('blog.layouts.navbar')
    <!-- /header -->
    <!--hero-section-->
    @include('blog.layouts.banner')
    <!--end hero-section-->
    <div class="main-container right-slidebar">
        <div class="container">
            <div class="row">
                <div class="main-content col-xs-12 col-md-8">
                    <div class="blog-post-container blog-page">
                        @foreach($posts as $post)
                        <div class="blog-post-item">
                            <div class="blog-post-img">
                                <a class="hover-images" href="#"><img src="{{ $post->getImage() }}" class="img-reponsive" alt="blog-img"></a>
                            </div>
                            <div class="blog-post-info">
                                <div class="post-date">
                                    {{ $post->getPostDate() }} / &#x1F441;{{ $post->views }}
                                </div>
                                <!-- <div class="post-date">February 22, 2017</div> -->
                                <h3 class="post-name"><a href="{{ route('posts.single', [$post->slug]) }}">{{ $post->title }}</a></h3>
                                <p class="post-desc">
                                    {{ strip_tags($post->description) }}
                                </p>
                                <a href="{{ route('posts.single', [$post->slug]) }}" class="readmore">Read more</a>
                            </div>
                            <div class="post-metas">
                                <div class="categories">
                                    <a href="{{ route('posts.by.category', [$post->category->slug]) }}" rel="category tag">Категория -> {{ $post->category->title }}</a>
                                </div>
                                <span class="post-comments-number">{{ $post->total_comments }}</span>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <div class="pagination-container pagination-blog">
                        <nav>
                        {{ $posts->links('vendor.pagination.template') }}
                        </nav>
                    </div>

                    <!-- <div class="pagination-container pagination-blog">
                        <nav>
                            <ul class="pagination">
                                <li><a class="active" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div> -->
                </div>
                <!-- Sidebar -->
                @include('blog.layouts.sidebar-home')
                <!-- ./sidebar -->
            </div>
        </div>
    </div>
    <footer>
        @include('blog.layouts.footer')
    </footer>
</div>
@endsection