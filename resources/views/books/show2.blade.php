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
     <tbody>
        <tr><td>Book Name</td><td>{{ $book->name }}</td></tr>
         <tr><td>Book Author</td><td>{{ $book->author }}</td></tr>
        <tr><td>Book Price</td> <td>{{ $book->price }}</td></tr>
        <tr><td>Book Image</td><td><img src='/{{ $book->image_url }}' width='60%' /></td></tr>
    </tbody>
  </table>
<div>
@endsection