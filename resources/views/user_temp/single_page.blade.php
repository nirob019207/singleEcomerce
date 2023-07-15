@extends('user_temp.layout.template')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="box_main">
                <div class="tshirt_img">
                    <img src="{{ asset($products->product_img) }}" alt="Product Image">
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="box_main">
                <div class="product-info text-left">
                    <h4 class="shirt_text">{{ $products->product_name }}</h4>
                    <p class="price_text">Product Price: <span style="color:#262626;">${{ $products->price }}</span></p>
                </div>
                <div class="product-details my-3">
                    <p class="lead">
                        {{ $products->product_long_des }}<br>
                        {{ $products->products_short_des }}
                    </p>
                    <ul class="p-2 bg-light m-2">
                        <li>Product Category: {{ $products->product_category_name }}</li>
                        <li>Product SubCategory: {{ $products->product_subcategory_name }}</li>
                        <li>Product Quantity: {{ $products->product_quantity }}</li>
                    </ul>
                </div>
                <div class="btn_main">
                    <form action="{{ route('addtocartproduct', $products->id) }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $products->id }}" name="product_id">
                        <div class="form-group">
                            <input type="hidden" value="{{ $products->price }}" name="price">

                            <label for="quantity">How many pieces?</label>
                            <input type="number" min="1" placeholder="" required name="quantity" class="form-control"><br>
                        </div>
                        <input class="btn btn-warning" type="submit" value="Add To Cart">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fashion_section">
    <div id="main_slider" class="carousel slide" data-ride="carousel">
        <div class="container">
            <h1 class="fashion_taital">Related Products</h1>
            <div class="fashion_section_2">
                <div class="row">
                    @foreach($related_products as $product)
                    <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                            <h4 class="shirt_text">{{ $product->product_name }}</h4>
                            <p class="price_text">Price: <span style="color: #262626;">$ {{ $product->price }}</span></p>
                            <div class="tshirt_img">
                                <img src="{{ asset($product->product_img) }}" alt="Product Image">
                            </div>
                            <div class="btn_main">
                                <form action="{{ route('addtocartproduct') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                    <input type="hidden" value="{{ $products->price }}" name="price">
                                    <input type="hidden" value="1" name="quantity">
                                    <input class="btn btn-warning" type="submit" value="Buy Now">
                               
                                </form>
                                <div class="seemore_bt">
                                 <button class="btn btn-info">   <a href="{{ route('singleproduct', [$product->id, $product->slug]) }}">See More</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
