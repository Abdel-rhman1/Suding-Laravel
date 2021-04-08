@include('elements.navbar')
@section('title')
    Index
@endsection
<div class='container text-center' style='margin-top:100px'>
    {{trans('messages.message')}}
</div>


@extends('elements.footer')