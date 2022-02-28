@extends('layouts.master')

@section('title', 'Azhurno imazhin')

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
            <form action="{{ route('images.update', ['image' => $image->id]) }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf 
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" value="{{ $image->title }}"  placeholder="P.sh: Une dhe Artani" class="form-control">
                </div>
                <div class="form-group mt-4">
                    <label for="image">Imazhi:</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <button class="btn btn-sm btn-primary mt-4">Krijo</button>
            </form>
        </div>
    </div>
@endsection 