@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Authorization</div>

                <div class="panel-body">
                    You are logged in!
                </div>
                <div class="panel-body">
                    <a href="{{ url('/customers') }}">Customers</a>
                </div>
                <div class="panel-body">
                    <a href="{{ url('/stocks') }}">Stocks</a>
                </div>
                <div class="panel-body">
                    <a href="{{ url('/investments') }}">Investments</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
