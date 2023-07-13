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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $('form').on('submit', function(e) {
    e.preventDefault();
    var searchQuery = $(this).find('input[name="search"]').val(); // 获取搜索查询值

    $.ajax({
      url: "{{ route('books.search') }}",
      type: "GET",
      data: { search: searchQuery },
      success: function(response) {
        // 清除现有的搜索结果
        $('table.table tbody').empty();

        // 插入新的搜索结果
        $('table.table tbody').append(response);
      },
      error: function(error) {
        console.log(error);
      }
    });
  });
});
</script>

</script>

@endsection
