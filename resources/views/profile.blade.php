@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $user[0]->name }}'s Profile</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="post-content">
                    <div class="post-container">
                        <img src={{ $user[0]->avatar }} alt="user" class="profile-photo-md pull-left">
                        <div class="post-detail">
                            <div class="user-info">
                                @if($user[0]->id == Auth::user()->id || Auth::user()->is_admin == 1)
                                    <a class="float-right prof-btn" href="" style="color: blue" ><i class="far fa-trash-alt"></i> Edit Profile</a>
                                @endif
                                <form action="">
                                    <input type="hidden" id="user-id" value="{{$user[0]->id}}">
                                    <h4 class="prof" style="color: grey;">Name: </h4><input type="text" value="{{$user[0]->name}}" disabled>
                                    <h4 class="prof" style="color: grey;">Email: </h4><input type="text" value="{{$user[0]->email}}" disabled>
                                </form>
                                <h4 style="color: grey; margin-top: 10px;">Number Of Posts: {{count($user[0]->posts)}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($user[0]->posts as $post)
                <div class="col-md-8">
                    <div class="post-content">
                    <div class="post-container">
                        <img src={{ $user[0]->avatar }} alt="user" class="profile-photo-md pull-left">
                        <div class="post-detail">
                        <div class="user-info">
                            @if($post->user->id == Auth::user()->id || Auth::user()->is_admin == 1)
                                <a class="float-right" style="color: red" href={{ URL::to('/delete-post/')}}{{ '/'.$post->id }}><i class="far fa-trash-alt"></i> Delete Post</a>
                            @endif
                            <h5><a href="{{ URL::to('/');}}{{'/profile/'}}{{ $user[0]->id }}" class="profile-link">{{ $user[0]->name }}</a></h5>
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
                                    <a class="ml-5" style="color: grey" href={{ URL::to('/delete-comment/')}}{{ '/'.$comment->id }}>Delete Comment</a>
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
</div>
<script>
    $(".prof-btn").on("click", function(){
        var user_name = window.prompt("Enter Your Name: ");
        var user_email = window.prompt("Enter Your New Email: ");
        var user_id = $("#user-id").val();
        var perm = confirm("Name: "+user_name+" & Email: "+user_email);
        // alert(window.location.origin + "/update-user/" + id);
        if(perm){
        $.ajax({
            url: "" + window.location.origin + "/update-user/",
            type: "POST",
            data: {"_token": "{{ csrf_token() }}", "id" : user_id, "name": user_name, "email": user_email},
            success: function(data){
                alert("Successfully updated");
                location.reload();
            }
        });
        }
    });
</script>
@endsection
