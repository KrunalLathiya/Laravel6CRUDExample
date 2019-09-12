@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Update Shows
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <form method="post" action="{{ route('shows.update', $show->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Show Name:</label>
              <input type="text" class="form-control" name="show_name" value="{{ $show->show_name }}"/>
          </div>
          <div class="form-group">
              <label for="price">Show Genre :</label>
              <input type="text" class="form-control" name="genre" value="{{ $show->genre }}"/>
          </div>
          <div class="form-group">
              <label for="price">Show IMDB Rating :</label>
              <input type="text" class="form-control" name="imdb_rating" value="{{ number_format($show->imdb_rating, 2) }}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Show Lead Actor :</label>
              <input type="text" class="form-control" name="lead_actor" value="{{ $show->lead_actor }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Show</button>
      </form>
  </div>
</div>
@endsection