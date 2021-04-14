@extends('AjaxOffers.index');

@section('content')
<div class="container">
    <h1 class="text-center">All Offers Using Ajax</h1>
    <div class="text-center removeSccess alert alert-success" style="display: none" >
            Deleted
    </div>
    <table class="table table-striped table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">details</th>
            <th scope="col">controls</th>
        </tr>
        @foreach ($offer as $off)
        
        <tr scope="row"class="OfferRow{{$off->ID}}">
            {{-- <input hidden="on" value="{{$off->ID}}" type="text" class="IDClass"> --}}
            <td class='id'> {{$off->ID}}</td>
            <td>{{$off->Name}}</td>
            <td> {{$off->Price}}</td>
            <td> {{$off->details}}</td>
            <td> 
                <a  href= "{{route('offer.ajax.edit', $off->ID)}}" class="alert alert-success btn btn-sm">
                    Update
                </a>
                <a href="" offer_id='{{$off->ID}}' class="alert alert-danger btn btn-sm remove">
                    Delete
                </a>
            </td>
        </tr>
    @endforeach
    </table>
</div>
@endsection
@section('script')
    <script>
        $( function (){
            $('.remove').on('click' , function(){
                var offer_id = $(this).attr('offer_id');
                alert(offer_id);
                $.ajax({
                    type : 'post',
                    url : "{{route('offer.ajax.delete')}}",
                    data:{
                        '_token' : "{{csrf_token()}}",
                        'id' : offer_id,
                    },
                    cache:false,
                    success:function(res , status , xhr){
                        if(res.status === true){
                            $('.OfferRow'+offer_id).remove();
                            // console.log('OfferRow'+offer_id);
                            $('.removeSccess').show();
                        }else{

                        }
                    },
                    error:function(error , status){
                        console.log(error);
                    }

                })
            });
        })
    </script>
@endsection