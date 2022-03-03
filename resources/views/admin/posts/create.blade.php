@extends('admin.layouts.layout')

@section('content')
    <div class="content mt-3">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create category</h3>
                </div>


                <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control mb-2" placeholder="Title">

                            <label>Description</label>
                            <textarea class="form-control mb-2" name="description" rows="3"
                                placeholder="Enter ..."></textarea>

                            <label>Content</label>
                            <textarea class="form-control mb-2" name="content" rows="3" placeholder="Enter ..."></textarea>

                            <label>Select category</label>
                            <select class="form-control mb-2" name="rubric_id">
                                <option value="Not category">Select category</option>
                                @foreach ($categories as $id => $category)
                                    <option value="{{ $id }}">{{ $category }}</option>
                                @endforeach

                            </select>

                            <div class="form-group" data-select2-id="42">
                                <label>Tags</label>
                                <select name="tags" class="select2 select2-hidden-accessible" multiple="multiple"
                                    data-placeholder="Select a State" style="width: 100%;" aria-hidden="true">
                                    @foreach ($tags as $id => $tag)
                                        <option data-select2-id="{{ $id }}" value="{{ $id }}">
                                            {{ $tag }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="trumbnail">Trumbnail</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="trumbnail" class="custom-file-input" id="trumbnail">
                                        <label class="custom-file-label" name="trumbnail" for="trumbnail">Choose
                                            file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
