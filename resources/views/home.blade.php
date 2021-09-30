@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="post-content">
                <div class="post-container">
                    <img src={{ Auth::user()->avatar }} alt="user" class="profile-photo-md pull-left mb-2"><h3 class="mt-3">&ensp; Create Post</h3>
                    <form action="{{ URL::to('/');}}{{'/add-post/'}}{{ Auth::user()->id }}" method="GET">
                    <textarea class="form-group" name="text" cols="80" rows="10" required></textarea>
                    <button type="submit" class="btn btn-primary">Add Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-8">
                <div class="post-content">
                <div class="post-container">
                    <img src={{ $post->user->avatar }} alt="user" class="profile-photo-md pull-left">
                    <div class="post-detail">
                    <div class="user-info">
                        @if($post->user->id == Auth::user()->id || Auth::user()->is_admin == 1)
                        <a class="float-right" style="color: red;" href={{ URL::to('/delete-post/')}}{{ '/'.$post->id }}><i class="far fa-trash-alt"></i> Delete Post</a>
                        @endif
                        <h5><a href="{{ URL::to('/');}}{{'/profile/'}}{{ $post->user->id }}" class="profile-link">{{ $post->user->name }}</a></h5>
                        <p class="text-muted">{{$post->created_at}}</p>
                    </div>
                    <div class="line-divider"></div>
                    <div class="post-text">
                        <p>{{$post->text}}<i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                    </div>
                    <div class="line-divider"></div>
                    @foreach ($post->comments as $comment)
                        <div class="post-comment">
                            <img src={{ $comment->user->avatar }} alt="" class="profile-photo-sm">
                            <p><a href="{{ URL::to('/');}}{{'/profile/'}}{{ $comment->user->id }}" class="profile-link">{{$comment->user->name}} </a><i class="em em-laughing"></i>{{$comment->comment}}</p>
                            @if($comment->user->id == Auth::user()->id || Auth::user()->is_admin == 1)
                                <a class="ml-5" style="color: grey;" href={{ URL::to('/delete-comment/')}}{{ '/'.$comment->id }}>Delete Comment</a>
                            @endif
                        </div>
                    @endforeach
                    <div class="post-comment">
                        <img src={{ Auth::user()->avatar }} alt="" class="profile-photo-sm">
                        <form style="display: table;" action="{{ URL::to('/');}}{{'/add-comment/'}}{{ $post->id }}" method="GET">
                            <div style="display: table-cell;">
                                <input name="comment" type="text" class="form-control" placeholder="Post a comment" required>
                                <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                            </div>
                            <button class="btn btn-warning" style="height:35px;" type="submit">Post</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
