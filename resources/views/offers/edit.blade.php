@include('elements.navbar')
<div class='container'>
    <div class='card'>
        <div class='card-header'>
            @lang('offer.editoffer')
        </div>
        <div class='card-body'>
            @if (Session::has('updated'))
                <div class='form-group form-group-lg row'>
                    <span class='offset-sm-2 col-sm-8 alert alert-success text-center'>
                        {{Session::get('updated')}}
                    </span> 
                </div>
            @endif
            <form action="{{route('offerupdate' , $offer->ID)}}" method="post">
                @csrf
                <div class='form-group form-group-lg row'>
                    <label class='col-sm-2 control-label' for='NameInput'>@lang('offer.Name_ar')</label>
                    <input class='form-control col-sm-8' id='NameInput' type='text' name='Name_ar' value="{{$offer->Name_ar}}" placeholder="@lang('offer.Nameplace')">
                </div>
                @error('Name_ar')
                    <span class='form-text text-danger offset-sm-2' >
                        {{$message}}
                    </span>
                @enderror
                <div class='form-group form-group-lg row'>
                    <label class='col-sm-2 control-label' for='NameInput'>@lang('offer.Name_en')</label>
                    <input class='form-control col-sm-8' id='NameInput' type='text' name='Name_en' value="{{$offer->Name_en}}" placeholder="@lang('offer.Nameplace')">
                </div>
                @error('Name_en')
                    <span class='form-text text-danger offset-sm-2' >
                        {{$message}}
                    </span>
                @enderror

                <div class='form-group form-group-lg row'>
                    <label class='col-sm-2 control-label' for='EmailInput'>@lang('offer.Price')</label>
                    <input class='form-control col-sm-8' id='EmailInput' type='number' value="{{$offer->Price}}" name='Price' placeholder="@lang('offer.Priceplace')">
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
                    <textarea class='col-sm-8 form-control' id='detailsInput'  name ='details_en' placeholder="@lang('offer.detailsplace')" cols='70' rows='8'>{{$offer->details_en}}</textarea>
                </div>
                @error('details_en')
                    <span class='form-text text-danger offset-sm-2'>
                        {{$message}}
                    </span>
                @enderror
                
                <div class='form-group form-group-lg row'>
                    <input class='btn btn-success col-sm-2 offset-sm-2' type='submit' value='Upadet'>
                </div>
            </form>
        </div>
    </div>
</div>
@include('elements.footer')