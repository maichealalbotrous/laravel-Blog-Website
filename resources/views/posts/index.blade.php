@extends('layout.page');

@section('content')
  <div class="text-center mt-4">
      <a href="{{route('CreatePost')}}" type="button" class="btn btn-success mt-auto">Create Post</a>
</div>

<table class="table text-center mt-4">
  <thead class="text-black-50">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post )
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->user_id}}</td>
      <td>{{$post->created_at->format('y-m-d')}}</td>
      <td>
        <a href="{{route('singlePost',$post->id)}}" type="button" class="btn btn-info">View</a>
        <a href="{{route('EditePost',$post->id)}}" type="button" class="btn btn-primary">Edite</a>
      <form style="display:inline" method="POST" action="{{route('Delete', $post->id)}}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
      </td>
    </tr>    
    @endforeach

   
  </tbody>
</table>

@endsection


  