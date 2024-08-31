@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" alt="" class="w-100 h-50">
        </div>
        <div class="col-4">
            <div>
                <img src="{{$post->user->profile->imageProfile()}}" class="rounded-circle w-25 h-25">
                <strong>
                    <a style="color: black; text-decoration: none; margin-left: 15px" href="/profile/{{$post->user->id}}">
                        {{$post->user->username}}
                    </a>
                </strong>
                @can('view', $post)
                <span style="border-radius: 50%; background-color: #000; width:7px; height:7px; display: inline-block; margin-left: 5px; margin-right: 5px">
                </span>
                <span class="ml-3"><a style="text-decoration: none !important; font-weight: bold;" href="#">Follow</a></span>
                @endcan
                <br>
                <hr>
                <div>
                    <span>
                        <a style="font-weight: bold; text-decoration: none; color: black" href="/profile/{{$post->user_id}}">
                            {{$post->user->username}}
                        </a>
                    </span>
                    <span style="margin-left: 5px;">
                        {{$post->caption}}
                    </span>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection