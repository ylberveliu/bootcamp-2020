@extends('layouts.master')

@section('title', 'Album')

@section('content')
    <h1>{{ $album->title }}</h1>
    <p>
        Ky album ka: {{ $album->images->count() }} imazhe - 
        <a href="{{ route('images.create', ['album' => $album->id]) }}" class="btn btn-sm btn-link">Shto fotografi te re</a>
    </p>
    <div class="row my-4">
        @foreach($album->images as $image)
            <div class="col-md-3">
                <img src="{{ asset('uploads/'.$image->image) }}" class="img-fluid d-block" alt="{{ $image->title }}" />
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('images.edit', ['image' => $image->id]) }}" class="btn btn-primary">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                    </a>
                    <a href="{{ route('images.destroy', ['image' => $image->id]) }}" class="btn btn-danger" onclick='return confirm("A jeni i sigurte?");'>
                            <i class="fa fa-close" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection 