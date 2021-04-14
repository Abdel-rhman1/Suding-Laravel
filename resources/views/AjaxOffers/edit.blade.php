@extends('AjaxOffers.index')

@section('title')
    Update Using Ajax
@endsection

@section('content')
    <div class="container">
        <div class="alert alert-success text-center" id="updateMessage" style="display: none ; margin-top:50px" >
            Updated
        </div>
        <div class="card">
            <div class="alert alert-success success text-center" style="display: none">
                <span class="text-center">
                    Updated Successfly
                </span>
            </div>
            <div class="card-header">
                Update Offer Using Ajax
            </div>
            <div class="card-body">
        <form class="" method="post" action="" enctype="multipart/form-data" id="updateFormData">
            @csrf
            <input type="hidden" value="{{$offer->ID}}" name="ID">
            <div class="form-group form-group-lg row">
                <label class="col-sm-2 control-label" for="photoInput">@lang('offer.photo')</label>
                <input class="form-control col-sm-8" id="photoInput" type="file" name="photo">
            </div>
            @error('photo')
            <span class='form-text text-danger offset-sm-2' >
                {{$message}}
            </span>
            @enderror
            <div class='form-group form-group-lg row'>
                <label class='col-sm-2 control-label' for='NameInput'>@lang('offer.Name_ar')</label>
                <input class='form-control col-sm-8' id='NameInput'  value="{{$offer->Name_ar}}" type='text' name='Name_ar' placeholder="@lang('offer.Nameplace')">
            </div>
            @error('Name_ar')
                <span class='form-text text-danger offset-sm-2' >
                    {{$message}}
                </span>
            @enderror
            <div class='form-group form-group-lg row'>
                <label class='col-sm-2 control-label' for='NameInput'>@lang('offer.Name_en')</label>
                <input class='form-control col-sm-8' id='NameInput' value="{{$offer->Name_en}}" type='text' name='Name_en' placeholder="@lang('offer.Nameplace')">
            </div>
            @error('Name_en')
                <span class='form-text text-danger offset-sm-2' >
                    {{$message}}
                </span>
            @enderror

            <div class='form-group form-group-lg row'>
                <label class='col-sm-2 control-label' for='EmailInput'>@lang('offer.Price')</label>
                <input class='form-control col-sm-8' id='EmailInput' value="{{$offer->Price}}"type='number' name='Price' placeholder="@lang('offer.Priceplace')">
            </div>
            @error('Price')
                <span class='form-text text-danger offset-sm-2'>
                    {{$message}}
                </span>
            @enderror
            <div class='form-group form-group-lg row'>
                <label class='col-sm-2 control-label' for='detailsInput'>@lang('offer.details_ar')</label>
                <textarea class='col-sm-8 form-control' id='detailsInput' name ='details_ar' placeholder="@lang('offer.detailsplace')" cols='70' rows='8'>{{$offer->details_ar}}</textarea>
            </div>
            @error('details_ar')
                <span class='form-text text-danger offset-sm-2'>
                    {{$message}}
                </span>
            @enderror
            <div class='form-group form-group-lg row'>
                <label class='col-sm-2 control-label' for='detailsInput'>@lang('offer.details_en')</label>
                <textarea class='col-sm-8 form-control' id='detailsInput' name ='details_en' placeholder="@lang('offer.detailsplace')" cols='70' rows='8'>{{$offer->details_en}}</textarea>
            </div>
            @error('details_en')
                <span class='form-text text-danger offset-sm-2'>
                    {{$message}}
                </span>
            @enderror
            
            <div class='form-group form-group-lg row'>
                <span class='btn btn-success col-sm-2 offset-sm-2' id="update">Update</span>
            </div>
        </form>
    </div>
</div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
        $('#update').click(function(){
            //var formData = new FormData($('#updateFormData')[0]);
            
            // alert(formData.get('ID'));
            // alert("Hello");
            $.ajax({
                 method:'post',
                 url : "{{route('offer.ajax.update')}}",
                 data: {

                    '_token' : "{{csrf_token()}}",
                   // 'photo' : $("input[name='photo']").val(),
                    'ID' : $("input[name='ID']").val(),
                    'Name_ar' : $("input[name='Name_ar']").val(),
                    'Name_en' : $("input[name='Name_en']").val(),
                    'Price' : $("input[name='Price']").val(),
                    'details_ar' : $("textarea[name='details_ar']").val(),
                    'details_en' : $("textarea[name='details_en']").val(),
                 },
                 cache : false,
                 success:function(res , status , xhr){
                    if(res.status === true){
                        $('#updateMessage').show();
                    }else{

                    }
                },
                error:function(status , error){
                    console.log(status)
                },
                complete:function(status , res , xhr){

                },
            });
        });
    });
    </script>
    
@endsection