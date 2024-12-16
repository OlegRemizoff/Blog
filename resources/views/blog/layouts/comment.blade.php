

@foreach ($comments as $comment)
<ul class="comment-child">
    <li>
        <div class="comment">
            <div class="avatar">
                <a href="#"><img src="{{ asset('assets/blog/img/blog/about5.jpg') }}" alt="images" class="img-responsive"></a>
            </div>
            <div class="comment-box">
                <div class="first-box">
                    <div class="comment-author-meta">
                        <strong>{{ $comment->user->name }}</strong>
                        <div class="date">December 29, 2016</div>
                    </div>
                    <div class="comment-post-reply">
                        <a href="#" class="comment-reply">Reply</a>
                    </div>
                </div>
                <div class="comment-content">
                    {{ $comment->content }}
                </div>
            </div>
        </div>
    </li>
</ul>
@endforeach