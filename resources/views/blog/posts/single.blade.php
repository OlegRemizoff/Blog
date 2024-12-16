@extends('blog.layouts.base')
@section('title')@parent {{ $post->title }} @endsection

@section('content')
<div class="wrappage">
    @include('blog.layouts.navbar')
    <!-- /header -->
    <!--hero-section-->
    @include('blog.layouts.banner')
    <!--end hero-section-->
    <div class="main-container right-slidebar single-post v2">
        <div class="container">
            <!-- Messages and Errors -->
            <div class="row">
                <div class="col-12">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session()->has('success')) <!-- ключ success указали в store -->
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="post-image col-xs-12 col-sm-12 col-md-12">
                    <img src="{{ $post->getImage() }}" alt="" class="img-reponsive">
                </div><!-- 1440-587 -->
                <div class="main-content col-xs-12 col-md-8">
                    <div class="blog-post-container blog-page">
                        <div class="blog-post-single blog-post-item">
                            <div class="blog-post-info">
                                <div class="post-date">{{ $post->getPostDate() }} / &#x1F441;{{ $post->views }}</div>
                                <h3 class="post-name ver2"><a href="#">{{ $post->title }}</a></h3>
                            </div>
                            <div class="post-metas ver2">
                                <div class="categories">
                                    <a href="#" rel="category tag">Категория -> <strong>{{ $post->category->title }}</strong></a>
                                </div>
                            </div>
                            <div class="post-content">
                                <!-- images -->
                                <!-- <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <a  class="hover-images" href="#"><img src="{{ asset('assets/blog/img/blog/1_sm.jpg') }}" alt="blog-img" class="img-reponsive"></a>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <a class="hover-images" href="#"><img src="{{ asset('assets/blog/img/blog/2_sm.jpg') }}" alt="blog-img" class="img-reponsive"></a>
                                    </div>
                                </div> -->
                                <div class="post-text">
                                    <p>{!! $post->content !!}</p>
                                    <blockquote>
                                        <p>There is only one happiness in this life, to love
                                            <br> and be loved.
                                        </p>
                                        <p class="author">George Sand</p>
                                    </blockquote>
                                    <p>Professionally initiate alternative metrics before high standards in synergy. Quickly enable orthogonal technology for enabled sources. Dramatically evisculate functional web services via emerging human capital. Synergistically promote high-payoff niches and client-based niches. Appropriately mesh technically sound processes vis-a-vis exceptional meta-services.</p>
                                    <p>Intrinsicly re-engineer standards compliant potentialities with business process improvements. Authoritatively reinvent cross-unit catalysts for change before high-quality outsourcing. Uniquely predominate technically sound web-readiness rather than cost effective solutions. Phosfluorescently synergize.</p>
                                </div>
                                <!-- <div class="post-text">
                                    <p>Completely network high standards in innovation whereas goal-oriented paradigms. Intrinsicly morph human capital via enabled convergence. Objectively pursue leading-edge web-readiness before market-driven paradigms. Competently disseminate go forward "outside the box" thinking before proactive expertise. Quickly incubate effective schemas through future-proof users.</p>
                                    <p>Professionally initiate alternative metrics before high standards in synergy. Quickly enable orthogonal technology for enabled sources. Dramatically evisculate functional web services via emerging human capital. Synergistically promote high-payoff niches and client-based niches. Appropriately mesh technically sound processes vis-a-vis exceptional meta-services.</p>
                                    <p>Intrinsicly re-engineer standards compliant potentialities with business process improvements. Authoritatively reinvent cross-unit catalysts for change before high-quality outsourcing. Uniquely predominate technically sound web-readiness rather than cost effective solutions. Phosfluorescently synergize.</p>
                                    <blockquote>
                                        <p>There is only one happiness in this life, to love
                                            <br> and be loved.
                                        </p>
                                        <p class="author">George Sand</p>
                                    </blockquote>
                                    <p>Professionally initiate alternative metrics before high standards in synergy. Quickly enable orthogonal technology for enabled sources. Dramatically evisculate functional web services via emerging human capital. Synergistically promote high-payoff niches and client-based niches. Appropriately mesh technically sound processes vis-a-vis exceptional meta-services.</p>
                                    <p>Intrinsicly re-engineer standards compliant potentialities with business process improvements. Authoritatively reinvent cross-unit catalysts for change before high-quality outsourcing. Uniquely predominate technically sound web-readiness rather than cost effective solutions. Phosfluorescently synergize.</p>
                                </div> -->
                                <!-- <div class="post-share">
                                    <ul class="social-share">
                                        <li><a href="#"><i class="fa fa-pinterest-p"></i>PIN THE POST</a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i>Tweet the Post</a></li>
                                        <li><a href="#"><i class="fa fa-facebook"></i>Share the post</a></li>
                                    </ul>
                                </div> -->
                                <!-- <div class="post-link">
                                    <div class="nav-links">
                                        <div class="nav-previous"><a href="">Previous Post</a></div>
                                        <div class="nav-next"><a href="">NExt POST</a></div>
                                    </div>
                                </div> -->
                                <!-- <div class="post-related">
                                    <h3 class="post-title widget-title">You Might Also Like</h3>
                                    <div class="post-related-slide">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="blog-post-item post-item">
                                                    <div class="blog-post-img">
                                                        <a class="hover-images" href="#"><img src="{{ asset('assets/blog/img/blog/5_sm.jpg') }}" alt="blog-img" class="img-reponsive"></a>
                                                    </div>
                                                    <div class="blog-post-info v2">
                                                        <div class="post-date">February 22, 2017</div>
                                                        <h3 class="post-name"><a href="#">A planner tool to help coordinate</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="blog-post-item post-item">
                                                    <div class="blog-post-img">
                                                        <a class="hover-images" href="#"><img src="{{ asset('assets/blog/img/blog/grid_7.jpg') }}" alt="blog-img" class="img-reponsive"></a>
                                                    </div>
                                                    <div class="blog-post-info v2">
                                                        <div class="post-date">February 22, 2017</div>
                                                        <h3 class="post-name"><a href="#">What a beautiful design!</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                @if ($post->comments()->count())
                                <div class="post-comments">
                                    <h3 class="post-comments-title widget-title">Comments ({{ $post->comments()->count() }})</h3>
                                    <ul class="commentlist">
                                        @foreach($post->comments->whereNull('parent_id') as $comment)
                                        <li>
                                            <div class="comment">
                                                <div class="avatar">
                                                    <a href="#"><img src="{{ asset('assets/blog/img/blog/about5.jpg') }}" alt="images" class="img-responsive"></a>
                                                </div>
                                                <div class="comment-box">
                                                    <div class="first-box">
                                                        <div class="comment-author-meta">
                                                            <strong>{{ $comment->user->name }}</strong>
                                                            <div class="date">{{ $comment->getCommentDate() }}</div>
                                                        </div>
                                                        @if (isset(auth()->user()->id) && auth()->user()->id == $comment->user_id)
                                                        <div class="comment-post-reply">
                                                            <form method="post" action="{{ route('comment.destroy', $comment->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" id="delete-button-{{ $comment->id }}" style="display: none;" onclick="return confirm('Вы действительно хотите удалить комментарий?')"></button>

                                                                <a href="#" class="comment-reply" onclick="document.getElementById('delete-button-{{ $comment->id }}').click(); return false;" class="btn btn-link">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </form>
                                                            <!-- Ссылка <a> с обработчиком onclick вызывает метод .click() для скрытой кнопки. return false; предотвращает выполнение стандартного действия ссылки (переход по href). -->

                                                        </div>
                                                        <div class="comment-post-reply">
                                                            <p id="comment-content-{{ $comment->id }}"></p>
                                                            <a href="#" class="comment-reply" onclick="openEditForm({{ $comment->id }}); return false;"><i class="fas fa-cog"></i></a>
                                                        </div>
                                                        @endif
                                                        <div class="comment-post-reply">
                                                            <a href="#" class="comment-reply">Reply</a>
                                                        </div>
                                                    </div>
                                                    <div class="comment-content">
                                                        {{ $comment->content }}
                                                    </div>
                                                </div>
                                            </div>
											<!-- Child comment -->
											@if ($comment->children->count())
											
											@include('blog.layouts.comment', ['comments' => $comment->children])
											@endif
                                            <!-- <ul class="comment-child">
                                                <li>
                                                    <div class="comment">
                                                        <div class="avatar">
                                                            <a href="#"><img src="{{ asset('assets/blog/img/blog/about5.jpg') }}" alt="images" class="img-responsive"></a>
                                                        </div>
                                                        <div class="comment-box">
                                                            <div class="first-box">
                                                                <div class="comment-author-meta">
                                                                    <strong>Darnell Patterson</strong>
                                                                    <div class="date">December 29, 2016</div>
                                                                </div>
                                                                <div class="comment-post-reply">
                                                                    <a href="#" class="comment-reply">Reply</a>
                                                                </div>
                                                            </div>
                                                            <div class="comment-content">
                                                                Competently leverage other's resource maximizing e-commerce and customer directed benefits. Progressively communicate progressive communities without value-added expertise. Distinctively pursue enterprise action.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul> -->
                                        </li>
                                        <!-- Edit comment -->
                                        <div class="post-reply">
                                            <form id="edit-form-{{ $comment->id }}" method="post" action="{{ route('comment.update', $comment->id) }}" style="display: none;">
                                                @csrf
                                                @method('PUT')
                                                <textarea rows="5" name="content" class="form-control">{{ $comment->content }}</textarea>
                                                <button type="submit" class="btn btn-submit">Save</button>
                                                <button type="button" class="btn btn-cancel" onclick="closeEditForm({{ $comment->id }})">Cancel</button>
                                            </form>
                                        </div>
                                        @endforeach
                                        <!-- <li>
                                            <div class="comment">
                                                <div class="avatar">
                                                    <a href="#"><img src="{{ asset('assets/blog/img/blog/about5.jpg') }}" alt="images" class="img-responsive"></a>
                                                </div>
                                                <div class="comment-box">
                                                    <div class="first-box">
                                                        <div class="comment-author-meta">
                                                            <strong>Darnell Patterson</strong>
                                                            <div class="date">December 29, 2016</div>
                                                        </div>
                                                        <div class="comment-post-reply">
                                                            <a href="#" class="comment-reply">Reply</a>
                                                        </div>
                                                    </div>
                                                    <div class="comment-content">
                                                        Competently leverage other's resource maximizing e-commerce and customer directed benefits. Progressively communicate progressive communities without value-added expertise. Distinctively pursue enterprise action.
                                                    </div>
                                                </div>
                                            </div>
                                        </li> -->
                                    </ul>
                                </div>
                                @else
                                @endif

                                <!-- Leave comment -->
                                <div class="post-reply">
                                    <!-- <h3 class="post-title widget-title">Leave A Reply</h3> -->
                                    <form method="post" action="{{ route('comment') }}" class="comment-form">
                                        @csrf
                                        <!-- <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6 col-xs-12">
                                                    <label>First Name *</label>
                                                    <input type="text" name="first_name" class="form-control" value="">
                                                </div>
                                                <div class="col-md-6 col-xs-12">
                                                    <label>Email *</label>
                                                    <input type="text" name="last_name" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div> -->
                                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Leave a comment</label>
                                                    <textarea name="note" id="message" tabindex="2" required class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        @if (auth()->check())
                                        <button type="submit" class="btn btn-submit">Submit</button>
                                        @else
                                        <h3 class="post-title widget-title"></h3>

                                        <button type="submit" class="btn btn-submit" disabled title="Только для зарегистрированных пользователей">Submit</button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
                @include('blog.layouts.sidebar-single')
                <!-- ./sidebar -->
            </div>
        </div>
    </div>
    <footer>
        @include('blog.layouts.footer')
    </footer>
</div>
<script>
    function openEditForm(commentId) {
        document.getElementById(`edit-form-${commentId}`).style.display = 'block';
    }

    function closeEditForm(commentId) {
        document.getElementById(`edit-form-${commentId}`).style.display = 'none';
    }
</script>

@endsection