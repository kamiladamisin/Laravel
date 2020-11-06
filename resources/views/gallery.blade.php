@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2>Gallery</h2>
            <table class="table">
                <thead class="thead-dark">
                <tr class="text-center">
                    <th scope="col">Image</th>
                    <th scope="col">Share link</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($images as $image):
                    <tr>
                        <th><img src="{{asset('images/' . $image->path)}}" alt="Image" style="max-width: 200px"></th>
                        <th><input value="http://127.0.0.1:8000/image/{{$image->id}}"></th>
                        <th><a href="/deleteImage/{{$image->id}}/{{ Auth::user()->name }}" class="btn btn-danger">Delete</a></th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
