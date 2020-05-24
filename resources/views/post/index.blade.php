<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Post</title>
    @extends('common.header.resource')
</head>
<body>
    <div class="container">
        @yield('main')
    </div>
@extends('common.footer.resource')
</body>
</html>


@section('main')
    <div class="row">
        <div class="col-sm-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Posts</h1>
            <div>
                <a style="margin: 19px;" href="{{ route('post.create')}}" class="btn btn-primary">New post</a>
            </div>
            <table class="table table-striped" style="border: 1px solid">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Denotation</td>
                    <td>Description</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->denotation}}</td>
                        <td>{{$post->description}}</td>
                        <td>
                            <a href="{{ route('post.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('post.destroy', $post->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
@endsection
