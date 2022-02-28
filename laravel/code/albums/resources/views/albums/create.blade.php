@extends('layouts.master')

@section('title', 'Krijo album te ri')

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
            <form action="{{ route('albums.store') }}" method="POST">
                @csrf 
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="P.sh: Dasma 2020" class="form-control">
                </div>
                <button class="btn btn-sm btn-primary mt-2">Krijo</button>
            </form>
        </div>
    </div>
@endsection 