

@extends('user_temp.layout.user_profile_template')
@section('profilecontent')


@if(session()->has('message'))
<div class='alert alert-success'>
    {{ session()->get('message') }}
</div>
@endif

@endsection
