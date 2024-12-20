<div class="">
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="fas fa-comments"></i>
                    {{ $comments->count() }}
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    @foreach ($comments as $comment)
                    <ul class="comment-child">
                        <li>
                            <div class="comment">
                                <div class="avatar">
                                    <a href="#"><img src="{{ $comment->user->getImage() }}" alt="images" class="img-responsive" width="96px"></a>
                                </div>
                                <div class="comment-box">
                                    <div class="first-box">
                                        <div class="row">
                                            @if (isset(auth()->user()->id) && auth()->user()->id == $comment->user_id)
                                            <!-- Delete -->
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
                                            <!-- Edit comment form -->
                                            <div class="comment-post-reply">
                                                <form id="edit-form-{{ $comment->id }}" method="post" action="{{ route('comment.update', $comment->id) }}" style="display: none;">
                                                    @csrf
                                                    @method('PUT')
                                                    <textarea rows="5" name="content" style="height: 243px; width: 750px; background: #f8f8f8" class="form-control">{{ $comment->content }}</textarea>
                                                    <button type="submit" class="btn btn-submit">Save</button>
                                                    <button type="button" class="btn btn-cancel" onclick="closeEditForm({{ $comment->id }})">Cancel</button>
                                                </form>
                                            </div>
                                            <div class="comment-author-meta">
                                                <strong>{{ $comment->user->name }}</strong>
                                                <div class="date">{{ $comment->getCommentDate() }}</div>
                                            </div>
                                            <!-- Edit Button -->
                                            <div class="comment-post-reply">
                                                <p id="comment-content-{{ $comment->id }}"></p>
                                                <a href="#" class="comment-reply" onclick="openEditForm({{ $comment->id }}); return false;"><i class="fas fa-cog"></i></a>
                                            </div>
                                            <!-- <div class="comment-post-reply">
                            <a href="#" class="comment-reply">Reply</a>
                        </div> -->
                                            @endif
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
                </div>
            </div>
        </div>
    </div>
</div>