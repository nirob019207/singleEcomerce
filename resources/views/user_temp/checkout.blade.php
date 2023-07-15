@extends('user_temp.layout.template')

@section('main-content')
<h2>Final Step To Place Your Order</h2>

<div class="row">
    <div class="col-4">
        <h3></h3>
        Products Will Be Sent To:

        <p>City/Village: {{ $shipping_address->city }}</p>
        <p>Postal code: {{ $shipping_address->postal_code }}</p>
        <p>Phone Number: {{ $shipping_address->phone_number }}</p>

    </div>
    <div class="col-8">
        <div class="box_main">
            Your Final Products:

                <div class="tabe-responsive">
                    <table  class="table">
                        <tr>

                            <th>product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>

                        </tr>
                         @php

                         $total=0;


                         @endphp
                        @foreach($cart_item as $item)

                        @php

                        $product_name=App\Models\Product::where('id',$item->product_id)->value('product_name');

                        @endphp
                         <tr>

                        <td>{{ $product_name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            <a href="{{ route('removeitem',$item->id) }}"class="btn btn-info">Remove</a>
                        </td>
                    </tr>
                    @php

                    $total=$total+$item->price


                   @endphp

                        @endforeach


                        <tr>


                            <td>Total</td>
                            <td >{{ $total }}</td>






                            </tr>



                    </table>

            </div>
        </div>
    </div>
    <form action="{{ route('placeorder') }}"method="POST">

        @csrf
        <input type="submit"class="btn btn-primary mr-3" value="cash On delicary ">
    </form>
    
        <input type="submit"class="btn btn-warning" value="Online payment">
    </form>
</div>
@endsection
