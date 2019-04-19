<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Error Page | Service App</title>
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
                        <div class=" center-align">
                            <i class="fa fa-exclamation-triangle fa-4x amber-text text-lighten-1"></i>
                        </div>
                        <h3 class="flow-text red-text center-align"><b>Sorry, an Error occurred.</b></h3>
                        <div class="divider"></div>
                        <p class="flow-text center-align">
                            @yield('error')
                        </p>
                        <div class="center-align">
                            <a href="#" onclick="window.history.back();" class="btn btn-flat">Back</a>
                        </div>
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