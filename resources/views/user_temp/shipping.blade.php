@extends('user_temp.layout.template')

@section('main-content')
<div class="container">
    <h2>Provide Your Shipping Information</h2>
    <div class="row">
        <div class="col-12">
            <div class="box_main">
                <form action="{{ route('addshipping') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" name="phone_number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="city">City/Village</label>
                        <input type="text" name="city" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" name="postal_code" class="form-control">
                    </div>
                    <input type="submit" value="Next" class="btn btn-info">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
