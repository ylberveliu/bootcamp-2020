@extends('layouts.master')

@section('title', 'Imazhet e albumit')

@section('content')
    @if($images && count($images))
        @foreach($images as $image)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <img src="{{ $image->image }}" alt="">
                <h5 class="card-title">{{ $image->title }}</h5>
            </div>
        </div>
        @endforeach
    @else
        <div class="alert alert-info">
            Ende nuk keni shtuar asnje fotografi ne kete album!
        </div>
    @endif
@endsection 