@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    Post List
                    <a href="{{ route('admin.post.create') }}" class="float-right">New</a> 
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            <a class="close" data-dismiss="alert">×</a>
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Created Date</th>
                            <th>Updated Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key => $post)
                                <tr>
                                <td>{{ $key + 1 }}</td>    
                                <td><a href="{{ route('admin.post.edit',$post->id) }}">{{ $post->title }}</a></td>
                                <td>{{ $post->author->name }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br />
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
