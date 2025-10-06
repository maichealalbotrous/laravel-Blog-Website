@extends('layout.page')

@section('content')
<form method="POST" action="{{ route('store') }}">
  @csrf

   
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


  <div class="mb-3 mt-4">
    <label for="exampleFormControlInput1" class="form-label">Title</label>
    <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Put your title">
  </div>

  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

  <div class="mt-3">
    <label class="form-label">Post Creator</label>
    <select name="postcreator" class="form-control" id="">
@foreach ($ALLuser as $user)
      <option value="{{$user->id}}">{{$user->name}}</option>
@endforeach
    </select>

    <button type="submit" class="btn btn-success mt-4">Submit</button>
  </div>
</form>
@endsection
