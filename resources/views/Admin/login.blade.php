<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class='container'>
        <div class="card">
            <div class='card-header'>Admin Login</div>
                <div class='card-body'>
                    <form method='post' action='{{route('admin.save')}}'>
                        @csrf
                        <div class='form-group form-group-lg row'>
                            <label class='control-label col-sm-2' for='emailInput'>email</label>
                            <input class='form-control col-sm-8' id='emailInput' name ='email' type='email' placeholder="Type Your Email">
                        </div>
                        @error('email')
                            <div class='alert alert-danger offset-sm-2 col-sm-8'>
                                <span>
                                    {{$message}}    
                                </span>    
                            
                            </div>
                        @enderror
                        <div class='form-group form-group-lg row'>
                            <label class='control-label col-sm-2' for='emailInput'>Password</label>
                            <input class='form-control col-sm-8' name ='password'id='emailInput' type='password' placeholder="Type Your passord">
                        </div>
                        @error('password')
                            <div class='alert alert-danger offset-sm-2 col-sm-8'>
                                <span>
                                    {{$message}}    
                                </span></div>
                        @enderror
                        <div class='form-group from-group-lg'>
                            <input class='form-control offset-sm-2 col-sm-2 btn btn-success' value='Save' type='submit'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/jquery-1.11.1.js')}}"></script>
    <script src="{{asset('js/backend.js')}}"></script>
</body>
</html>