
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
          <td>Book Name</td>
          <td>Book Author</td>
          <td>Book Price</td>
       </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td><a href="{{ route('books.show',$book->id)}}">{{$book->id}}</a></td>
            <td><a href="{{ route('books.show',$book->id)}}">{{$book->name}}</a></td>
            <td>{{$book->author}}</td>
            <td>{{$book->price}}</td>
         </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection