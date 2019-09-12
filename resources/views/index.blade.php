@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Show Name</td>
          <td>Show Genre</td>
          <td>Show IMDB Rating</td>
          <td>Lead Actor</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($shows as $show)
        <tr>
            <td>{{$show->id}}</td>
            <td>{{$show->show_name}}</td>
            <td>{{$show->genre}}</td>
            <td>{{number_format($show->imdb_rating,2)}}</td>
            <td>{{$show->lead_actor}}</td>
            <td><a href="{{ route('shows.edit', $show->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('shows.destroy', $show->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection