@extends('layout.page')

@section('content')
<form method="POST" action="{{ route('UpdatePost', $post->id) }}">
  @csrf
  @method('PUT')

  <div class="mb-3 mt-4">
    <label class="form-label">Title</label>
    <input name="title" type="text" class="form-control" value="{{ $post->title }}" placeholder="Put your title">
  </div>

  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="3">{{ $post->description }}</textarea>
  </div>

  <div class="mt-3">
    <label class="form-label">Post Creator</label>
    <select name="postcreator" class="form-control">
@foreach ($ALLuser as $user)
      <option value="{{$user->id}}">{{$user->name}}</option>
@endforeach
    </select>

    <button type="submit" class="btn btn-primary mt-4">Update</button>
  </div>
</form>
@endsection
