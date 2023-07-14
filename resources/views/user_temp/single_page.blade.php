@extends('user_temp.layout.template')

@section('main-content')


<div class="container">
    <div class="row">
        <div class="col-lg-4">
          <div class="box_main">
            <div class="tshirt_img"><img src="{{ asset($products->product_img) }}" alt=""></div>

          </div>
        </div>
        <div class="col-lg-8">
           <div class="box_main">

            <div class="product-info text-left">
                <h4 class="shirt_text">
{{ $products->product_name }}
                </h4>
                <p class="price_text"> Product Price : <span style="color:#262626"> ${{ $products->price }}</span></p>
            </div>
            <div class="product-details my-3">
                <p class="lead">
                    {{ $products->product_long_des }}<br>
                    {{ $products->products_short_des }}
                </p>
                <ul class="p-2 bg-light m-2">
                    <li><h2> Product Category : {{ $products->product_category_name }}</h2></li>
                    <li><h2> Product SubCategory : {{ $products->product_subcategory_name }}</h2></li>
                    <li> <h2> Product Quantity : {{ $products->product_quantity }}</h2></li>
                </ul>




            </div>
            <div class="btn_main">

                <div class="btn btn-warning"><a href="">Add To Cart</a></div>
             </div>

           </div>



        </div>
    </div>
    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="container">
                <h1 class="fashion_taital">Relate Products</h1>
                <div class="fashion_section_2">
                    <div class="row">
                        @foreach($related_products as $product)
                        <div class="col-lg-4 col-sm-4">
                            <div class="box_main">
                                <h4 class="shirt_text">{{ $product->product_name }}</h4>
                                <p class="price_text">Price <span style="color: #262626;">$ {{ $product->price }}</span></p>
                                <div class="tshirt_img">
                                    <img src="{{ asset($product->product_img) }}">
                                </div>
                                <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="{{ route('singleproduct', [$product->id, $product->slug]) }}">See More</a></div>
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
