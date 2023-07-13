@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<link rel="stylesheet" type="text/css" media="screen" href="/css/main.css" />
<link rel="stylesheet" type="text/css" href="/css/product_info.css" />
<link rel="stylesheet" type="text/css" href="/css/960.css" />
<script type="text/javascript" src="/js/jquery-3.6.4.min.js"></script>
<script type="text/javascript" src="/js/slideshow.js"></script>

<!-- load jQuery and tablesorter scripts -->
<!-- <script type="text/javascript" src="/js/jquery-latest.js"></script> -->
<script type="text/javascript" src="/js/jquery.tablesorter.js"></script>

<!-- tablesorter widgets (optional) -->
<script type="text/javascript" src="/js/jquery.tablesorter.widgets.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script> -->
<script type="text/javascript">
$(document).ready(function() {
    // (a little sooner than page load)
    $('#extraInfo_Area').hide();
    $('a#extraInfo_link').click(function() {
        $('#extraInfo_Area').toggle(300);
        return false;
    });
});

function currency_translate2() {
    var currency = document.getElementById('currency_convert2');

    if (currency.value != "no") {
        var currency_value = currency.value;
        //Get Currency Type
        var code = currency_value.substring(currency_value.length - 3, currency_value.length);
        //Get the Exchange Rate
        var currency = currency_value.substring(0, currency_value.length - 4);
        var price_now = document.getElementById('newPrice_label');
        var HK_price = document.getElementById('HK_price');
        var final_price = currency * HK_price.value;

        price_now.innerHTML = code + '$' + final_price.toFixed(2); // ** Update the Price in another Currency
    }
}
</script>
<article class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped">
     <tbody>
        <tr>
            <td class="field">Name</td>
            <td class="value">{{ $book->name }}</td>
        </tr>
        <tr>
            <td class="field">Author</td>
            <td class="value">{{ $book->author }}</td>
        </tr>
        <tr>
            <td class="field">Publisher</td>
            <td class="value">{{ $book->publisher }}</td>
        </tr>
        <tr>
            <td class="field">ISBN</td>
            <td class="value">{{ $book->isbn }}</td>
        </tr>
        <tr>
            <td class="field">Price</td>
            <td class="value"><span id="newPrice_label">HKD${{ $book->price }}</span></td>
        </tr>
        <tr style="display:none;">
            <td class="field">&nbsp;</td>
            <td class="value">
                <select id="" name="" id="productInfo_currency_select"></select>
                <div id="">Exchange Rate is just for reference</div>
            </td>
        </tr>
        <tr>
            <td class="field">Exchange Rate Reference</td>
            <td class="value">
                <form id="productInfo_currency" action="{{ route('books.show', $book->id)}}">
                    <input type="hidden" id="HK_price" value="{{ $book->price }}">
                    <select id="currency_convert2" name="currency_convert2" onchange="currency_translate2()" id="productInfo_currency_select">
                        <option value="no" selected="selected">Exchange Rate</option>
                        <option label="HKD" value="1.00000000HKD">HKD</option>
                        <option label="USD" value="0.12840000USD">USD</option>
                        <option label="RMB" value="0.89920002RMB">RMB</option>
                        <option label="TWD" value="3.90300012TWD">TWD</option>
                        <option label="JPY" value="13.17300034JPY">JPY</option>
                        <option label="CAD" value="0.12909999CAD">CAD</option>
                        <option label="EUR" value="0.08190000EUR">EUR</option>
                    </select>
                </form>
            </td>
        </tr>
        <tr>
            <td class="field" colspan="2">
                <a href="javascript:;" onmousedown="singleLink_toggleSlide('extraInfo_Area');" id="extraInfo_link">
                    <img src="/images/extraInfo_arrow.gif" border="0" width="15" height="14" id="extraInfo_img">&nbsp; More information
                </a>
            </td>
        </tr>
        <tr>
            <td class="value" colspan="2">
                <div id="extraInfo_Area" style="display: none; overflow: hidden;">
                    <table id="extraInfo_table" cellpadding="0">
                        <tbody>
                            <tr>
                                <td class="field">Language</td>
                                <td class="value">{{ $book->language }}</td>
                            </tr>
                            <tr>
                                <td class="field">Pages</td>
                                <td class="value">{{ $book->pages }}</td>
                            </tr>
                            <tr>
                                <td class="field">Edition</td>
                                <td class="value">{{ $book->edition }}</td>
                            </tr>
                            <tr>
                                <td class="field">Binding</td>
                                <td class="value">{{ $book->binding }}</td>
                            </tr>
                            <tr>
                                <td class="field">Description</td>
                                <td class="value">{{ $book->description }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        <tr>
            <td class="productImg" rowspan="13" colspan="2" align="center">
            <center>
                <div class="container_12" id="wrapper">
                    <div class="grid_8" id="content">
                        <div class="grid_6 prefix_1 suffix_1" id="gallery">
                            <div id="pictures">
                                <img src="/images/books/{{ $book->isbn}}-12.png" alt="" />
                                <img src="/images/books/{{ $book->isbn}}-11.png" alt="" />
                                <img src="/images/books/{{ $book->isbn}}-10.png" alt="" />
                                <img src="/images/books/{{ $book->isbn}}-09.png" alt="" />
                                <img src="/images/books/{{ $book->isbn}}-08.png" alt="" />
                                <img src="/images/books/{{ $book->isbn}}-07.png" alt="" />
                                <img src="/images/books/{{ $book->isbn}}-06.png" alt="" />
                                <img src="/images/books/{{ $book->isbn}}-05.png" alt="" />
                                <img src="/images/books/{{ $book->isbn}}-04.png" alt="" />
                                <img src="/images/books/{{ $book->isbn}}-03.png" alt="" />
                                <img src="/images/books/{{ $book->isbn}}-02.png" alt="" />
                                <img src="/images/books/{{ $book->isbn}}-01.png" alt="" />
                            </div>
                            <div class="grid_3" id="prev">
                                <a href="#previous">&laquo; Previous page</a>
                            </div>
                            <div class="grid_3" id="next" >
                                <a href="#next">Next page &raquo;</a>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
            </td>
        </tr>
    </tbody>
</table>

</article>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script>

<style>
.table-striped tbody tr:nth-child(odd) {
    background-color: #f9f9f9; /* Light gray color for odd rows */
}
.table-striped tbody tr:nth-child(even) {
    background-color: #ffffff; /* White color for even rows */
}
.table-striped tbody tr:nth-child(3n+1) {
    background-color: #f2f2f2; /* Another color for every third row */
}
</style>

<script type="text/javascript">
$(document).ready(function() {
    $('#search-form').on('submit', function(e) {
        e.preventDefault();
        var value = $('#search-form input[name=search]').val();
        $.ajax({
            type: 'get',
            url: '{{ route('books.search') }}',
            data: { 'search': value },
            success: function(data) {
                // Construct the result table HTML
                var tableHtml = '<table class="searched_table">';
                tableHtml += '<thead><tr>';
                tableHtml += '<th>Name</th>';
                tableHtml += '<th>Author</th>';
                tableHtml += '<th>Publisher</th>';
                tableHtml += '<th>Price</th>';
                tableHtml += '<th>Cover</th>';
                tableHtml += '</tr></thead><tbody>';

                // Loop through the data to construct each row
                $.each(data, function(index, book) {
                    tableHtml += '<tr>';
                    tableHtml += '<td>' + book.name + '</td>';
                    tableHtml += '<td>' + book.author + '</td>';
                    tableHtml += '<td>' + book.publisher + '</td>';
                    tableHtml += '<td>' + book.price + '</td>';

                    // Book cover image
                    var imgHtml = '<img class="book-cover" src="' + book.image_url + '">';
                    tableHtml += '<td>' + imgHtml + '</td>';

                    tableHtml += '</tr>';
                });

                tableHtml += '</tbody></table>';

                // Insert the constructed HTML
                $('table.table tbody').html(tableHtml);

                $('.book-cover').click(function() {
                    var imgSrc = $(this).attr('src');

                    var popup = '<div class="img-popup">' +
                        '<img src="' + imgSrc + '">' +
                        '<button class="close">Close</button>' +
                        '</div>';

                    $('body').append(popup);

                    $('.close').click(function() {
                        $('.img-popup').remove();
                    });
                });

                // Remove any existing tablesorter initialization
                $(".searched_table").trigger('destroy');

                // Initialize tablesorter on the dynamic table
                $(".searched_table").tablesorter({
                    theme: 'blue'
                });
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});
</script>
@endsection
