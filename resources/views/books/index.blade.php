@extends('layout')

@section('content')
<style>
      .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        font-weight: bold;
    }
    .form-group input {
        width: 100%;
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    .form-group input[type="submit"] {
        width: auto;
        background-color: #00796B;
        color: white;
    }
  .uper {
    margin-top: 40px;
    /* Define the default row color */
  }
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/css/theme.default.min.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

table#book-table tr {
        background-color: #f30000; /* Red */
    }

    /* Define the color for every 3rd row starting from the first */
    table#book-table tr:nth-child(3n+1) {
        background-color: #fadb5f; /* Chrysanthemum color (light orange) */
    }

    /* Define the color for every 3rd row starting from the second */
    table#book-table tr:nth-child(3n+2) {
        background-color: #ffff00; /* Yellow */
    }
</style>

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
  @endif
  <div class="login-status">
    @if(Auth::check())
        <p>You are logged in, welcome. {{ Auth::user()->name }}!</p>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger">Log out</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @else
        <p>Please log in, you have not logged in yet.</p>
        <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
    @endif
</div>

  <form method="POST" action="{{ route('bookrequest.store') }}">
    @csrf
    <div class="form-group">
        <label for="aliasname">Alias Name:</label>
        <input type="text" id="aliasname" name="aliasname">
        <small id="aliasHelp" class="form-text text-muted">Must be at least 8 alphanumeric characters.</small>
    </div>
    <div class="form-group">
        <label for="mobile">Mobile:</label>
        <input type="text" id="mobile" name="mobile">
        <small id="mobileHelp" class="form-text text-muted">Must be 8 numbers.</small>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <small id="emailHelp" class="form-text text-muted">Must be a valid email pattern.</small>
    </div>
    <div class="form-group">
        <label for="book_name">Book Name:</label>
        <input type="text" id="book_name" name="book_name">
        <small id="bookNameHelp" class="form-text text-muted">Must be at least 10 alphanumeric characters.</small>
    </div>
    <div class="form-group">
        <label for="pickup_date">Pickup Date:</label>
        <input type="text" id="pickup_date" name="pickup_date">
        <small id="pickupDateHelp" class="form-text text-muted">Must be a date format.</small>
    </div>
    <div class="form-group">
        <input type="submit" value="Submit">
    </div>
</form>

  <aside>
    <h2>Search Books</h2>
    <form id="search-form" action="{{ route('books.search') }}" method="get">
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Search for a book...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
  </aside>

  <table class="table table-striped tablesorter" id="book-table">
    <thead>
        <tr>
          <td>ID</td>
          <td>Book Name</td>
          <td>Book Author</td>
          <td>Book Publisher</td>
          <td>Book Price</td>
          <td>Book Cover</td>
        </tr>
    </thead>
    <tbody>
        <!-- We will generate the rows here using JavaScript -->
    </tbody>
  </table>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    $("#pickup_date").datepicker({
        dateFormat: "yy-mm-dd"
    });
    var $table = $("#book-table");
    // Function to populate the table and apply tablesorter
    function populateTable(data) {
        var tableHtml = '';

        $.each(data, function(index, book) {
            tableHtml += '<tr>';
            tableHtml += '<td><a href="{{ url('/books') }}/' + book.id + '">' + book.id + '</a></td>';
            tableHtml += '<td><a href="{{ url('/books') }}/' + book.id + '">' + book.name + '</a></td>';
            tableHtml += '<td>' + book.author + '</td>';
            tableHtml += '<td>' + book.publisher + '</td>';
            tableHtml += '<td>' + book.price + '</td>';
            tableHtml += '<td><img class="book-cover" src="' + book.image_url + '" style="cursor: pointer;"></td>';
            tableHtml += '</tr>';
        });

        $('table.table tbody').html(tableHtml);

        // Update tablesorter
        $table.trigger("update");
        $table.trigger("appendCache");

        // Add image popup functionality
        $('.book-cover').click(function() {
            var imgSrc = $(this).attr('src');

            var popup = '<div class="img-popup" style="position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.5); display:flex; justify-content:center; align-items:center;">' +
                            '<img src="' + imgSrc + '" style="max-width:90%; max-height:90%;">' +
                            '<button class="close-popup" style="position: absolute; top: 20px; right: 20px;">Close</button>' +
                        '</div>';

            $('body').append(popup);

            $('.close-popup').click(function(e) {
                e.stopPropagation();
                $(this).closest('.img-popup').remove();
            });

            $('.img-popup').click(function() {
                $(this).remove();
            });
        });
    }

    // Initialize tablesorter
    $table.tablesorter({
    theme : 'blue'
  });

    // Fetch all books and populate the table
    $.ajax({
        type: 'get',
        url: '{{ route('books.all') }}',
        success: function(data) {
            populateTable(data);
        },
        error: function(error) {
            console.log(error);
        }
    });

    // Handle search form submission
    $('#search-form').on('submit', function(e) {
        e.preventDefault();
        var value = $('#search-form input[name=search]').val();
        $.ajax({
            type: 'get',
            url: '{{ route('books.search') }}',
            data: { 'search': value },
            success: function(data) {
                populateTable(data);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});
</script>

@endsection
