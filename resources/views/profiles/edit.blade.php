@extends('layouts.app')

@section('content')
<div class="container">

    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method("PATCH")
        <div class="row">
            <div class="col-8 offset-2">
                <h2>Edit Profile</h2>

                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label">Title</label>

                    <input id="title" type="text" value="{{ $user->profile->title ?? ''}}" class="form-control @error('title') is-invalid @enderror" name="title" autocomplete="new-title">

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label">Description</label>

                    <input id="description" type="text" value="{{ $user->profile->description ?? ''}}" name="description" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="new-description">

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="url" class="col-md-4 col-form-label">URL</label>

                    <input id="url" type="text" value="{{ $user->profile->url ?? ''}}" name="url" class="form-control @error('url') is-invalid @enderror" name="url" autocomplete="new-url">

                    @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-md-4 col-form-label">Profile Image</label>


                    <input id="image" type="file" class="form-control-file" name="image" autocomplete="new-image">

                    @error('image')
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row pt-3">
                    <button class="btn btn-primary">Save Profile</button>
                </div>

            </div>
        </div>
</div>
</form>

</div>
@endsection