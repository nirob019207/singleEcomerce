@php

$categories=App\Models\Product::latest()->get();
@endphp

@extends('user_temp.layout.template')

@section('main-content')
@if(session()->has('message'))
<div class='alert alert-success'>
    {{ session()->get('message') }}
</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="box_main">
            <div class="tabe-responsive">
                <table  class="table">
                    <tr>
                        <th>product image</th>
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
                    $product_image=App\Models\Product::where('id',$item->product_id)->value('product_img');
                    @endphp
                     <tr>
                        <td><img style="height:100px"src="{{ asset($product_image) }}" alt=""> </td>
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

                    @if($total>0)
                    <tr>
                        <td></td>
                        <td></td>

                        <td>Total</td>
                        <td >{{ $total }}</td>





                         <td><a href="{{ route('shipping') }}"class="btn btn-primary">checkout Now</a></td>
                        </tr>
                         @endif


                </table>
            </div>
        </div>
    </div>
</div>



@endsection
