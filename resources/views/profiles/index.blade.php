@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-3 ps-5 pt-5">
            <img src="{{$user->profile->imageProfile()}}" class="rounded-circle w-100 h-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">

                <div class="d-flex">
                    <div class="h2 mr-4">{{$user->username}}</div>
                    @can('view', $user->profile)
                    <follow-button user-id = "{{$user->id}}" follows="{{$follows}}"></follow-button>
                    @endcan
                </div>
                @can('update', $user->profile)
                <a href="/p/create">Add New Post</a>
                @endcan
                <br>
            </div>

            <div class="div">
                @can('update', $user->profile)
                <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
                @endcan
            </div>
            <div class="d-flex">
                <div class="pe-5"><strong>{{$user->posts->count()}}</strong> Posts</div>
                <div class="pe-5"><strong>{{$user->profile->follower->count()}}</strong> Followers</div>
                <div class="pe-5"><strong>{{$user->following->count()}}</strong> Following</div>
            </div>
            <div class="pt-5"><strong>{{$user->profile->title}}</strong></div>
            <div>{{$user->profile->description}}</div>
            <div><a href="#">{{$user->profile->url}}</a></div>
        </div>
    </div>
    <div class="row pt-4">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{$post->id}}">
                <img src="/storage/{{$post->image}}" class="w-100 h-150">
            </a>
        </div>
        @endforeach

    </div>

</div>
@endsection