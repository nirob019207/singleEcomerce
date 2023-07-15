@extends('user_temp.layout.template')

@section('main-content')


<div class="continer">
    <div class="row">
        <div class="col-lg-4">
            <div class="box_main">
                <ul>
                    <li><a href="{{ route('userprofile') }}">Dashboard</a></li>
                    <li><a href="">pending Orders</a></li>
                    <li><a href="{{ route('history') }}">History</a></li>
                    <li><a href="">Logout</a></li>
                </ul>
            </div>

        </div>
        <div class="col-lg-8">
            @yield('profilecontent');

        </div>
    </div>
</div>
@endsection




