@extends('admin.layouts.layout')

@section('content')
    <div class="content mt-3">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit post</h3>
                </div>


                <form method="post" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control mb-2" value="{{ $post->title }}">

                            <label>Description</label>
                            <textarea class="form-control mb-2" name="description"
                                rows="3">{{ $post->description }}</textarea>

                            <label>Content</label>
                            <textarea class="form-control mb-2" name="content" rows="3">{{ $post->content }}</textarea>

                            <label>Select category</label>
                            <select class="form-control mb-2" name="category_id">
                                <option value="Not category">Select category</option>
                                @foreach ($categories as $id => $category)
                                    <option value="{{ $id }}" @if ($id == $post->category_id) selected @endif>
                                        {{ $category }}</option>
                                @endforeach

                            </select>

                            <div class="form-group" data-select2-id="42">
                                <label>Tags</label>
                                <select name="tags[]" class="select2 select2-hidden-accessible" multiple="multiple"
                                    data-placeholder="Select a State" style="width: 100%;" aria-hidden="true">
                                    @foreach ($tags as $id => $tag)
                                        <option data-select2-id="{{ $id }}" value="{{ $id }}"
                                            @if (in_array($id, $post->tags->pluck('id')->all())) selected @endif>
                                            {{ $tag }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="thumbnail">Thumbnail</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="thumbnail" class="custom-file-input" id="thumbnail">
                                        <label class="custom-file-label" for="thumbnail">Choose
                                            file</label>
                                    </div>
                                </div>
                                <img class="img-thumbnail mt-2 col-6" src="{{ $post->getImage() }}" alt="">
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
