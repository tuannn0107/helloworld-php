@extends('common.base')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Update a Post</h1>

            @if(session()->get('error'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{{ $error }}</li>
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('post.update', $post->id) }}">
                @method('PATCH')
                @csrf
                @csrf
                <div class="form-group">
                    <label for="denotation">denotation:</label>
                    <input type="text" class="form-control" name="denotation" value={{ $post->denotation }}/>
                </div>

                <div class="form-group">
                    <label for="description">description:</label>
                    <input type="text" class="form-control" name="description" value={{ $post->description }}/>
                </div>
                <button type="submit" class="btn btn-primary-outline">Update Post</button>
            </form>
        </div>
    </div>
@endsection
