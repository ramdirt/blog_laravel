@extends('admin.layouts.layout')

@section('content')
    <div class="content mt-3">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit category</h3>
                </div>


                <form method="post" action="{{ route('categories.update', $category->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $category->title }}">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
