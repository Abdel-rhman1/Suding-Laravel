@include('elements.navbar')
@section('title')
    Contuct Us
@stop
<div class='container'>
    <div class="card">
        <div class="card-header">Login User</div>
        <div class="card-body">
            <form action="{{route('tr')}}" method="post">
                @csrf
                <div class="form-group form-group-lg row">
                    <label class='col-sm-2 control-label'>Email</label>
                    <input class="col-sm-8 form-control" type="mail" name='mail'placeholder="Enter Your Mail">
                </div>
                <div class="form-group form-group-lg row">
                    <label class='col-sm-2 control-label'>Message</label>
                    <textarea class="col-sm-8 form-control" placeholder="Type Your Messages"  name='message'></textarea>
                </div>
                <div class="form-group form-group-lg">
                    <input class='col-sm-2 offset-sm-2 form-control' value="Send" type="submit">
                </div>
            </form>
        </div>
    </div>
</div>
@extends('elements.footer')

