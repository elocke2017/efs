<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hedgehog Financial Services</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <a href="{{ action('CustomerController@index') }}">Customers</a> |
    <a href="{{ action('StockController@index') }}">Stocks</a> |
    <a href="{{ action('InvestmentController@index') }}">Investments</a> |
    <a href="http://localhost/efs/public">Home</a>
</div>
<hr>
<div class="container">
    @yield('content')
</div>
</body>
</html>
