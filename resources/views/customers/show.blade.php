@extends('app')
@section('content')
    <h2>Customer: {{$customer->name}} </h2>

          <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Name</td>
                <td>{{$customer->name}}</td>
            </tr>
            <tr>
                <td>Cust Number</td>
                <td><?php echo ($customer['cust_number']); ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo ($customer['address']); ?></td>
            </tr>
            <tr>
                <td>City </td>
                <td><?php echo ($customer['city']); ?></td>
            </tr>
            <tr>
                <td>State</td>
                <td><?php echo ($customer['state']); ?></td>
            </tr>
            <tr>
                <td>Zip </td>
                <td><?php echo ($customer['zip']); ?></td>
            </tr>
            <tr>
                <td>Home Phone</td>
                <td><?php echo ($customer['home_phone']); ?></td>
            </tr>
            <tr>
                <td>Cell Phone</td>
                <td><?php echo ($customer['cell_phone']); ?></td>
            </tr>
            </tbody>
        </table>


    <h3>{{$customer->name}}'s Stocks</h3>
    <hr>
    <table class="table table-striped table-bordered table-hover ", table style="text-align:center;">
        <thead>
        <tr class="bg-info">
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Purchase Price</th>
            <th>Purchase Date</th>
            <th>Original Value</th>
            <th>Current Price</th>
            <th>Current Value</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $stockprice=null;
        $stockindvalue = 0; //Individual stock value (#shares * purchase_price)
        $sinitial = 0; //Total initial stocks
        $svalue=0; //Total current stocks
        $iportfolio = 0;
        $cportfolio = 0;
        ?>
        @foreach ($stocks as $stock)
            <?php
            $stockindvalue = $stock['shares']*$stock['purchase_price'];
            $sinitial = $sinitial + $stockindvalue;
            $ssymbol = $stock['symbol'];
            $URL = "http://www.google.com/finance/info?q=NSE:" . $ssymbol;
            $file = fopen("$URL", "r");
            $r = "";
            do {
                $data = fread($file, 500);
                $r .= $data;
            } while (strlen($data) != 0);
            //Remove CR's from ouput - make it one line
            $json = str_replace("\n", "", $r);
            //Remove //, [ and ] to build qualified string
            $data = substr($json, 4, strlen($json) - 5);
            //decode JSON data
            $json_output = json_decode($data, true);
            //echo $sstring, "<br>   ";
            $price = "\n" . $json_output['l'];
            $svalue = $svalue + $stock->shares*$price;
            ?>
            <tr>
                <td>{{ $stock->symbol }}</td>
                <td>{{ $stock->name }}</td>
                <td>{{ $stock->shares }}</td>
                <td><?php echo number_format($stock->purchase_price, 2)?></td>
                <td>{{ $stock->purchased }}</td>
                <td>$<?php echo number_format($stockindvalue, 2)?></td>
                <td>$<?php echo $price?></td>
                <td>$<?php echo number_format($price*$stock->shares, 2) ?></td>
             </tr>
        @endforeach
        </tbody>
    </table>
    <h4>Total of Initial Stock Portfolio: $<?php echo number_format($sinitial, 2)?> </h4>
    <h4>Total of Current Stock Portfolio: $<?php echo number_format($svalue, 2)?> </h4>



    <h3>{{$customer->name}}'s Investments</h3>
    <hr>
    <table class="table table-striped table-bordered table-hover ", table style="text-align:center;">
        <thead>
        <tr class="bg-info">
            <th>Category</th>
            <th>Description</th>
            <th>Acquired Value</th>
            <th>Acquired Date</th>
            <th>Recent Value</th>
            <th>Recent Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($investments as $investment)
            <?php
            $iportfolio = $iportfolio + $investment['acquired_value'];
            $cportfolio = $cportfolio + $investment['recent_value'];
            ?>
            <tr>
                <td>{{ $investment->category }}</td>
                <td>{{ $investment->description }}</td>
                <td>$<?php echo number_format($investment->acquired_value, 2)?></td>
                <td>{{ $investment->acquired_date }}</td>
                <td>$<?php echo number_format($investment->recent_value, 2)?></td>
                <td>{{ $investment->recent_date }}</td>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    <h4>Total of Initial Investment Portfolio: $<?php echo number_format($iportfolio, 2)?> </h4>
    <h4>Total of Current Investment Portfolio: $<?php echo number_format($cportfolio, 2)?> </h4>
    <br><br>
    <h2>Summary</h2>
    <h3>Total of Initial Portfolio: $<?php echo number_format($sinitial+$iportfolio, 2)?> </h3>
    <h3>Total of Current Portfolio: $<?php echo number_format($svalue+$cportfolio, 2)?> </h3>

@stop
