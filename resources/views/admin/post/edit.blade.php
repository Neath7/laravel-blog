@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    Update Post
                    <a href="{{ route('admin.post.create') }}" class="float-right">New</a> 
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            <a class="close" data-dismiss="alert">×</a>
                            {{ session('status') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">
                            <a class="close" data-dismiss="alert">×</a>
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('admin.post.update',$post->id) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $post->id }}" />
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title')?old('title'):$post->title }}"  autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Content</label>

                            <div class="col-md-6">
                                <textarea id="content" type="content" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" >{{ old('content')?old('content'):$post->content }}</textarea>

                                @if ($errors->has('content'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a class="btn btn-primary float-left" href="{{ route('admin.post.index') }}">
                                    Post List
                                </a>
                                <button type="submit" class="btn btn-success float-right">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
