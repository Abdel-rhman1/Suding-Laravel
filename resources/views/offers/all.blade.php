@include('elements.navbar')
<div class='container'>
    @if (Session::has('delete'))
        <div class="alert alert-success">
        <span class="text-center">
            {{Session::get('delete')}}</span>
        </div>
    @endif
    <table class="table table-striped table-dark" style="margin-top:100px">
        <tr>
            <th scope="col">@lang('offer.ID')</th>
            <th scope="col">@lang('offer.Name')</th>
            <th scope="col">@lang('offer.Price')</th>
            <th scope="col">@lang('offer.Details')</th>
            <th scope="col">@lang('offer.controls')</th>
        </tr>
        @foreach($offers as $offer)
            <tr>
                <?php $lang = Session()->get('locale');?>
                <th scope="row">{{$offer->ID}}</th>
                <td>{{$offer->Name}}</td>
                <td>{{$offer->Price}}</td>
                <td>{{$offer->details}}</td>
                <td>
                    <span>
                        <a href="{{route('offer_edit' , $offer->ID)}}"class="btn btn-sm alert alert-success">Edit</a>
                    </span>
                    <span>
                        <a href="{{route('offer_delete' , $offer->ID)}}" onclick="return confirm('Are you sure?')" class="btn btn-sm alert alert-danger">Delete</a>
                    </span>
                </td>
            </tr>
        @endforeach
    </table>
</div>

@include('elements.footer')