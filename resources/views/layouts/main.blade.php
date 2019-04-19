<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Welcome') | Service App</title>

    <!--include styles-->
    @include('partials._styles')

</head>
<body class="grey lighten-5">
<div id="app">

    <!--header-->
    @include('partials._header')

    <!--main content-->
    <main>
        <div class="section">
            <div class="row">
                <!--general card-->
                <div class="card horizontal z-depth-0 animated slideInUp">
                    <div class="card-stacked">
                        <div class="card-content">

                            <!--nav-->
                            <div class="col l2 m4 s12">
                                @include('partials._nav')
                            </div>
                            <!--end nav-->

                            <!-- Table and Form-->
                            <div class="col l10 m12 s12">
                                <div class="card horizontal animated slideInUp">
                                    <div class="card-stacked">
                                        <div class="card-content">

                                            <div class="row">
                                                <!--table-->
                                                <div class="col l8 m8 s12">

                                                    @yield('content-table')

                                                </div>
                                                <!--end table-->

                                                <!--form-->
                                                <div class="col l3 m3 s12 offset-m1 offset-l1">

                                                    @yield('content-form')

                                                </div>
                                                <!--end form-->
                                            </div>
                                            <!--table and form row-->


                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div> <!--end general card content-->
                    </div><!--end general card stack-->
                </div>
                <!--end general card-->

            </div>
        </div>
    </main>

    <!--footer-->
    @include('partials._footer')

</div>
<!--include scripts-->
@include('partials._scripts')
</body>
</html>