<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/backend.css')}}" rel="stylesheet">
    <title>@yield('title' , 'Document')</title>
</head>
<body>
    <div class='container-fluid'>
    <ul class="nav" id="navId">
        <li class="nav-item">
            <a href="{{route('home2')}}" class="nav-link active">@lang('messages.home page')</a>
        </li>
        <li class="nav-item">
            <a href="{{route('about-us')}}" class="nav-link">@lang('messages.about us')</a>
        </li>
        <li class="nav-item">
            <a href="{{route('contuct-us')}}" class="nav-link">@lang('messages.contuct us')</a>
        </li>
        <div class="pull-right">
            
                <a href="{{route('locale',['ar'])}}"  class='btn btn-md btn btn-success lang'>
                    {{trans('messages.arabicLan')}}
                </a>
    
                <a href="{{route('locale',['en'])}}"  class='btn btn-md btn btn-success lang'>
                    {{trans('messages.englishLan')}}
                </a>
 
        </div>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="tab1Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
        <div class="tab-pane fade" id="tab5Id" role="tabpanel"></div>
    </div>
</div>
