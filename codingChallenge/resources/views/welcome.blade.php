<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Product</title> 
        <link href="{{asset('css/app.css')}}" rel="stylesheet"  />

         <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script type="module" src="{{asset('js/app.js')}}" defer></script>
    </head>
    <body >
        <div id="app">
            
        </div>
    </body>
</html>
