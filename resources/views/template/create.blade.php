<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List DummyModel</title>
    @extends('common.header.resource')
</head>
<body>
<div class="container">
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
            <form method="post" action="{{ route('dummyModel.store') }}">
                @csrf
                {{-- TODO implement here --}}
                <button type="submit" class="btn btn-primary-outline">Update DummyModel</button>
            </form>
        </div>
@extends('common.footer.resource')
</body>
</html>
