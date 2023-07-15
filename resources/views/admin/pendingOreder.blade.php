@extends('admin.layouts.template')
@section('page_title')
    Pending Orders
@endsection
@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">Pending Orders</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>User Id</th>
                        <th>Shipping Information</th>
                        <th>Product Id</th>
                        <th>Quantity</th>
                        <th>Total Will Pay</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pending_orders as $order)
                        <tr>
                            <td>{{ $order->userid }}</td>
                            <td>
                                <ul>
                                    <li>Phone Number: {{ $order->phone_number }}</li>
                                    <li>City: {{ $order->city }}</li>
                                    <li>Postal Code: {{ $order->postal_code }}</li>
                                </ul>
                            </td>
                            <td>{{ $order->product_id }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>
                                <a class="btn btn-success" href="">Approve Now</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
