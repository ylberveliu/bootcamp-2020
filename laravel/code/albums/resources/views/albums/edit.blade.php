@extends('layouts.master')

@section('title', 'Azhurno albumin')

@section('content')
    <div class="card">
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-info">
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
                </div>
            @endif
            <form action="{{ route('albums.update', ['album' => $album->id]) }}" method="POST">
                @method('put')
                @csrf 
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" value="{{ $album->title }}" class="form-control">
                </div>
                <button class="btn btn-sm btn-primary mt-2">Azhurno</button>
            </form>
        </div>
    </div>
@endsection 