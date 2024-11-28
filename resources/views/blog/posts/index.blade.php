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
                        <div class="blog-post-item">
                            <div class="blog-post-img">
                                <a class="hover-images" href="#"><img src="{{ asset('assets/blog/img/blog/1.jpg') }}" class="img-reponsive" alt="blog-img"></a>
                            </div>
                            <div class="blog-post-info">
                                <div class="post-date">February 22, 2017</div>
                                <h3 class="post-name"><a href="#">21 Pastel Picks Your Closet Is Craving</a></h3>
                                <p class="post-desc">
                                    Cteractively pontificate efficient growth strategies via innovative information. Phosfluorescently cultivate installed base total linkage after impactful technology. Objectively repurpose ethical scenarios through leveraged niches....
                                </p>
                                <a href="#" class="readmore">Read more</a>
                            </div>
                            <div class="post-metas">
                                <div class="categories">
                                    <a href="#" rel="category tag">BEAUTY</a>,
                                    <a href="#" rel="category tag">FASHION</a>
                                </div>
                                <span class="post-comments-number">3</span>
                            </div>
                        </div>
                        <!-- <div class="blog-item-list">
                            <div class="blog-post-item post-item">
                                <div class="blog-post-img">
                                    <a class="hover-images" href="#"><img src="{{ asset('assets/blog/img/blog/1_sm.jpg') }}" alt="blog-img" class="img-reponsive"></a>
                                </div>
                                <div class="blog-post-info">
                                    <div class="post-date">FEBRUARY 22, 2017</div>
                                    <h3 class="post-name"><a href="#">The Must Have Neutral Layers for Spring</a></h3>
                                    <p>Cteractively pontificate efficient growth strategies via innovative information. Phosfluorescently cultivate installed base total linkage after impactful technology. Objectively repurpose...</p>
                                    <div class="post-metas">
                                        <div class="categories">
                                            <a href="#" rel="category tag">BEAUTY</a>,
                                            <a href="#" rel="category tag">FASHION</a>
                                        </div>
                                        <span class="post-comments-number">3</span>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-post-item post-item">
                                <div class="blog-post-img">
                                    <a class="hover-images" href="#"><img src="{{ asset('assets/blog/img/blog/2_sm.jpg') }}" alt="blog-img" class="img-reponsive"></a>
                                </div>
                                <div class="blog-post-info">
                                    <div class="post-date">February 22, 2017</div>
                                    <h3 class="post-name"><a href="#">Giving the design and production</a></h3>
                                    <p>Cteractively pontificate efficient growth strategies via innovative information. Phosfluorescently cultivate installed base total linkage after impactful technology. Objectively repurpose...</p>
                                    <div class="post-metas">
                                        <div class="categories">
                                            <a href="#" rel="category tag">BEAUTY</a>,
                                            <a href="#" rel="category tag">FASHION</a>
                                        </div>
                                        <span class="post-comments-number">3</span>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-post-item post-item">
                                <div class="blog-post-img">
                                    <a class="hover-images" href="#"><img src="{{ asset('assets/blog/img/blog/3_sm.jpg') }}" alt="blog-img" class="img-reponsive"></a>
                                </div>
                                <div class="blog-post-info">
                                    <div class="post-date">February 22, 2017</div>
                                    <h3 class="post-name"><a href="#">A planner tool to help coordinate</a></h3>
                                    <p>Cteractively pontificate efficient growth strategies via innovative information. Phosfluorescently cultivate installed base total linkage after impactful technology. Objectively repurpose...</p>
                                    <div class="post-metas">
                                        <div class="categories">
                                            <a href="#" rel="category tag">BEAUTY</a>,
                                            <a href="#" rel="category tag">FASHION</a>
                                        </div>
                                        <span class="post-comments-number">3</span>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    </div>
                    <div class="pagination-container pagination-blog">
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
                    </div>
                </div>
                <!-- Sidebar -->
                @include('blog.layouts.sidebar')
                <!-- ./sidebar -->
            </div>
        </div>
    </div>
    <footer>
        @include('blog.layouts.footer')
    </footer>
</div>
@endsection