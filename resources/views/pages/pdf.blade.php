<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Print Page | Service Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--include the styles here-->
    @include('partials._styles')


</head>


<body>
<div class="section">
    <div class="row">
        <div class="col l8 offset-l2">
            <div class= "card horizontal z-depth-0" style="margin-top: 20px;">
                <div class= "card-stacked">
                    <div class="card-content">
                        <div class="circle center-align">
                            <img src="{{ asset('images/services.png') }}" height="50" width="50" style="border-radius: 50%;">
                        </div>
                        <h3 class="flow-text center-align">Service App</h3>
                        <div class="divider"></div>

                        <table class="responsive-table highlight">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Tel</th>
                                <th>Service</th>
                                <th>Created</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if($serviceUsers->count() > 1)
                                @foreach($serviceUsers as $serviceUser)
                                <tr>
                                    <td>{{ $serviceUser->name }}</td>
                                    <td>{{ $serviceUser->email }}</td>
                                    <td>{{ $serviceUser->tel }}</td>
                                    <td>{{ $serviceUser->service->name }}</td>
                                    <td>{{ $serviceUser->created_at->diffForHumans() }}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>{{ $serviceUsers->name }}</td>
                                    <td>{{ $serviceUsers->email }}</td>
                                    <td>{{ $serviceUsers->tel }}</td>
                                    <td>{{ $serviceUsers->service->name }}</td>
                                    <td>{{ $serviceUsers->created_at->diffForHumans() }}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    //Automatically initiate print dialog
    window.print();

    //redirect user back once print is done
    window.history.back();

</script>
</body>
</html>