<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome | Service App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--include the styles here-->
    @include('partials._styles')

    <style>
        body {
            background: url('{{ asset('images/services.png') }}') no-repeat fixed 20% 50%;
            width: 100%;
            height: 100%;
        }
    </style>

</head>


<body>
<div class="section">
    <div class="row">
        <div class="col l4 m5 s10 offset-s1 offset-m6 offset-l7">
            <div class= "card horizontal animated slideInRight" style="margin-top: 100px;">
                <div class= "card-stacked">
                    <div class="card-content">
                        <div class="circle center-align">
                            <i class="fa fa-user-circle fa-4x red-text text-lighten-1"></i>
                        </div>
                        <h3 class="flow-text center-align">Admin Login</h3>
                        <div class="divider"></div>

                        <!--admin login form-->
                        <form method="post" action="{{ route('login') }}">
                            @csrf

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" type="email" name="email" autocomplete="off" value="{{ old('email') }}" class="validate" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password" type="password" name="password" class="validate" required>
                                    <label for="password">Password</label>
                                </div>
                            </div>

                            <div class="row">
                                <button type="submit" class="waves-effect waves-light btn right">Sign In</button>
                            </div>
                        </form>
                        <!--end of form-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!--include scripts-->
@include('partials._scripts')

</body>
</html>