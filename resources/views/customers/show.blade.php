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
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Purchase price</th>
            <th>Purchase Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($stocks as $stock)
            <tr>
                <td>{{ $stock->symbol }}</td>
                <td>{{ $stock->name }}</td>
                <td>{{ $stock->shares }}</td>
                <td>{{ $stock->purchase_price }}</td>
                <td>{{ $stock->purchased }}</td>
             </tr>
        @endforeach

        </tbody>

    </table>

    <h3>{{$customer->name}}'s Investments</h3>
    <hr>
    <table class="table table-striped table-bordered table-hover">
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
            <tr>
                <td>{{ $investment->category }}</td>
                <td>{{ $investment->description }}</td>
                <td>{{ $investment->acquired_value }}</td>
                <td>{{ $investment->acquired_date }}</td>
                <td>{{ $investment->recent_value }}</td>
                <td>{{ $investment->recent_date }}</td>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

@stop
