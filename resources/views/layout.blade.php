<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
        <header> 
 <nav> 
         <center>
            <table width="700"> 
   <tr valign="bottom"> 
    <td class="value"><a href="{{ route('home') }}"><img src="/images/logo.jpg" border="0"  width="180"/> </a></td> 
    <td class="value"><a href="/"><img src="/images/home.png" border="0"  width="55"></a></td> 
    <td class="value"><a href="/register"><img src="/images/register.png" border="0"  width="55"></a></td> 
    <td class="value"><a href="/books"><img src="/images/cart.png" border="0"  width="55"></a></td> 
    <td class="value"><a href="/books"><img src="/images/login.png" border="0"  width="55"></a></td> 
    <td class="value"><a href="/contact"><img src="/images/admin.png" border="0"  width="55"></a></td> 
  </tr> 
  </table>
</center>
</nav> 
</header>
  <div class="container">
    @yield('content')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>

<footer><center>Copyright 2023 Online Book Store</center></footer>
</body>
</html>