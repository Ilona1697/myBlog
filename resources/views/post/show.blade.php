@extends('layouts.main')

@section('content')
<main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{ $date->translatedFormat('F') }} {{ $date->day }}, {{ $date->year }} • {{ $date->format('H:i')}} •  Комментарии: • {{ $post->comments->count() }}</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/app/public/' . $post->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                             @auth()
                             <form action="{{ route('post.liked.store', $post->id) }}" method="post">
                                @csrf
                                <span>{{ $post->liked_users_count }}</span>
                                <button type="submit" class="border-0 bg-transparent" style="outline:none; font-size:24px">
                                   
                                        @if(auth()->user()->likedPosts->contains($post->id))
                                            <i class="nav-icon fas fa-heart text-danger"></i>
                                        @else
                                            <i class="nav-icon far fa-heart text-danger"></i>
                                        @endif
                                    
                                </button>
                            </form>
                            @endauth
                            @guest()
                                <div>
                                    <span>{{ $post->liked_users_count }}</span>
                                    <i class="nav-icon far fa-heart text-danger"></i>
                                </div>
                            @endguest
                        </div>
                        @if($relatedPosts->count() > 0)
                            <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>
                            <div class="row">
                                @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <div class="blog-post-thumbnail-wrapper mb-3">
                                        <img src="{{ asset('storage/app/public/' . $relatedPost->preview_image) }}" alt="related post" class="w-100" style="height:170px; object-fit:cover;">
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <p class="post-category ">Blog post</p>
                                        @auth()
                                        <form action="{{ route('post.liked.store', $relatedPost->id) }}" method="post">
                                            @csrf
                                            <span>{{ $relatedPost->liked_users_count }}</span>
                                            <button type="submit" class="border-0 bg-transparent">
                                                
                                                    @if(auth()->user()->likedPosts->contains($relatedPost->id))
                                                        <i class="nav-icon fas fa-heart text-danger"></i>
                                                    @else
                                                        <i class="nav-icon far fa-heart text-danger"></i>
                                                    @endif
                                                
                                            </button>
                                        </form>
                                        @endauth
                                        @guest()
                                            <div>
                                                <span>{{ $relatedPost->liked_users_count }}</span>
                                                <i class="nav-icon far fa-heart text-danger"></i>
                                            </div>
                                        @endguest
                                    </div>
                                    
                                    <a href="{{ route('post.show', $relatedPost->id)}}" class="blog-post-permalink">
                                        <h5 class="post-title">{{ $relatedPost->title }}</h5>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        @endif
                    </section>
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Комментарии ({{ $post->comments->count() }})</h2>
                        @auth
                        <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <textarea name="message" id="message" class="form-control" placeholder="Напишите комментарий" rows="10"></textarea>
                                    @error('message')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Добавить комментарий" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                        @endauth
                    </section>
                    <section class="comment-section">
                        @foreach($post->comments as $comment)
                        <div class="card-comment mb-3 border border-secondary p-3">
                            <div class="comment-text">
                                <div class="username text-primary" style="font-size:20px;">
                                    {{ $comment->user->name }}
                                </div>
                                <div class="text-muted mb-2" style="font-size:14px;"> {{$comment->getDateCarbon()->diffForHumans() }}</div>
                                <p class="text-dark">{{ $comment->message }}</p>
                            </div>
                        </div>
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection