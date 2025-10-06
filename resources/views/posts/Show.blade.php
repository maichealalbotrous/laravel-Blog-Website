@extends('layout.page');

@section('content')

<div class="card mt-4">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">

    <h2 class="card-title">{{$post->title}}</h2>
    <p class="card-text">{{$post->description}}</p>
    <h4 class="card-text">{{$post->user->name}}</h4>
    <h6 class="card-text">{{$post->user->email}}</h6>
    <h5 class="card-text">{{$post->user->postcreator}}</h5>
  </div>
</div>




@endsection
