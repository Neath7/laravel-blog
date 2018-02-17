@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    <h3>Post List</h3>
                    <hr>
                    <div class="form-group inline">
                        <form class="form-inline" method="get" action="{{ route('admin.post.index') }}">
                            <div class="float-left">
                                <div class="form-inline">
                                    <label class="mr-sm-2" for="show">Per Page</label>
                                    <select name="perPage" id="show" class="form-control mb-2 mr-sm-2 mb-sm-0">
                                        <option value="1" {{ $posts->perPage() == 1 ? 'selected' : '' }}>1</option>
                                        <option value="5" {{ $posts->perPage() == 5 ? 'selected' : '' }}>5</option>
                                        <option value="10" {{ $posts->perPage() == 10 ? 'selected' : '' }}>10</option>
                                        <option value="20" {{ $posts->perPage() == 20 ? 'selected' : '' }}>20</option>
                                        <option value="30" {{ $posts->perPage() == 30 ? 'selected' : '' }}>30</option>
                                        <option value="50" {{ $posts->perPage() == 50 ? 'selected' : '' }}>50</option>                            
                                    </select>
                                    <button type="submit" class="btn btn-outline-success">Filter</button> 

                                    <a href="{{ route('admin.post.create') }}" class="btn btn-outline-primary ml-1">New</a> 
                                </div>
                            </div>
                            <div class="float-right">
                                <div class="form-inline">
                                    <input class="form-control mr-sm-2" name="search" type="text" value="{{ $search }}" placeholder="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            <a class="close" data-dismiss="alert">×</a>
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped border">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
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
                                <td>{{ $post->id }}</td>
                                <td><a href="{{ route('admin.post.edit',$post->id) }}">{{ $post->title }}</a></td>
                                <td>{{ $post->author->name }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if(count($posts) > 0)
                    <div class="card-footer">
                        <div class="float-left">
                            @if($search)
                            {{ $posts->appends(['perPage' => $posts->perPage(),'search'=> $search])->links() }}
                            @else
                            {{ $posts->appends(['perPage' => $posts->perPage()])->links() }}
                            @endif
                        </div>
                        <div class="float-right">
                            <span class="badge badge-pill badge-info">Page : {{ $posts->currentPage() }}/{{ $posts->lastPage() }}</span>
                            <span class="badge badge-pill badge-success">Total : {{ $posts->total() }}</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection
