@extends('layouts.master')

@section('title', 'Albumet')

@section('content')
    <a href="{{ route('albums.create') }}" class="btn btn-sm btn-primary mb-4">Krijo album te ri</a>
    @if($albums && count($albums))
    <div class="row">
        @foreach($albums as $album)
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $album->title }}</h5>
                    <p class="card-text">{{ $album->images->count() }} imazhe</p>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('albums.show', ['album' => $album->id]) }}" class="btn btn-primary">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('albums.edit', ['album' => $album->id]) }}" class="btn btn-primary">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('albums.destroy', ['album' => $album->id]) }}" class="btn btn-danger" onclick='return confirm("A jeni i sigurte?");'>
                                <i class="fa fa-close" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
        <div class="alert alert-info">
            Ende nuk keni krijuar asnje album!
        </div>
    @endif
@endsection 