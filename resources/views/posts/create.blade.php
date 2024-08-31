@extends('layouts.app')

@section('content')
<div class="container">


    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <h2>Add New Post</h2>

                <div class="row mb-3">
                    <label for="caption" class="col-md-4 col-form-label">Caption</label>

                    <input id="caption" type="caption" class="form-control @error('caption') is-invalid @enderror" name="caption" autocomplete="new-caption">

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-md-4 col-form-label">image</label>


                    <input id="image" type="file" class="form-control-file" name="image" autocomplete="new-image">

                    @error('image')
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row pt-3">
                    <button class="btn btn-primary"> Add New Post </button>
                </div>

            </div>
        </div>
    </form>

</div>
@endsection