@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Posts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List</h3>
                </div>

                <div class="card-body">
                    <a href="{{ route('posts.create') }}" class="btn btn-block btn-primary mb-2 col-3">Create</a>
                    @if (count($posts) != 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Data</th>
                                    <th style="width: 130px">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>Category</td>
                                        <td>Tags</td>
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <a href="{{ route('categories.edit', $post->id) }}"
                                                        class=" btn btn-default">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <form action="{{ route('categories.destroy', $post->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>


                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @else
                        <p>Категорий пока нет...</p>
                    @endif
                </div>


                <div class="card-footer clearfix">
                    {{ $posts->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>

        </div>
    </div>

@endsection
