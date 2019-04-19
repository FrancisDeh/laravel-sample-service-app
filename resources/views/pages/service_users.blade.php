@extends('layouts.main')
@section('title', 'Service Users Page')

@section('content-table')
    <p class="flow-text">
        Service Users ({{ $serviceUsers->count() }})
        @if($serviceUsers->count())
        <span class="right">
        <a href="{{ route('service_users.export.excel') }}" title="Export Data to Excel"><i class="fa fa-file-export green-text"></i></a>
            @if($serviceUsers->count() > 1)
                    <a href="{{ route('service_users.export.pdf') }}" title="Export Data to Pdf" ><i class="fa fa-file-pdf red-text"></i></a>
                @endif
        @endif
        </span>
    </p>

    <div class="divider"></div>

    @if($serviceUsers->count())

        <p>Table displays all service users available.

        </p>
        <table class="responsive-table highlight">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Tel</th>
                <th>Service</th>
                <th>Created</th>
                <th>Options</th>
            </tr>
            </thead>

            <tbody>
            @foreach($serviceUsers as $serviceUser)
                <tr>
                    <td>{{ $serviceUser->name }}</td>
                    <td>{{ $serviceUser->email }}</td>
                    <td>{{ $serviceUser->tel }}</td>
                    <td>{{ $serviceUser->service->name }}</td>
                    <td>{{ $serviceUser->created_at->diffForHumans() }}</td>
                    <td>
                        <a class="waves-effect waves-teal dropdown-trigger btn btn-flat"
                           href='#' data-target='dropdown1-{{$serviceUser->id}}'>
                            <i class="fa fa-ellipsis-v fa-1x grey-text "></i>
                        </a>

                        <ul id='dropdown1-{{$serviceUser->id}}' class='dropdown-content'>
                            <li><a href="#modal1-{{$serviceUser->id}}" class="modal-trigger"><i
                                            class="fa fa-trash red-text "></i> </a></li>
                            <li><a href="#modal2-{{$serviceUser->id}}" class="modal-trigger"><i class="fa fa-edit"></i></a></li>
                        </ul>

                        <!-- Modal Structure -->
                        @include('partials.service_user._service_user_delete_modal')
                        @include('partials.service_user._service_user_update_modal')
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @else
        <!--empty view will go here-->
        @include('partials._empty_view')
    @endif
@endsection

@section('content-form')
    <p class="flow-text">Create Service User</p>
    <div class="divider"></div>

    <form method="post" action="{{ route('service_users.store') }}">
        @csrf

        <div class="row">
            <div class="input-field col s12">
                <input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="off" required class="validate">
                <label for="name">Name</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <input id="email" type="email" name="email" autocomplete="off" value="{{ old('email') }}" required class="validate">
                <label for="email">Email</label>
            </div>
        </div>


        <div class="row">
            <div class="input-field col s12">
                <input id="tel" type="tel" name="tel" maxlength="10" autocomplete="off" value="{{ old('tel') }}" required class="validate">
                <label for="tel">Telephone</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <select id="service_id" name="service_id" required>
                    <option value="" disabled selected>Choose service</option>
                    @foreach($services as $service)
                        <option value="{{$service->id}}" {{ $service->id == old('service_id') ? 'selected' : '' }}>{{ $service->name }}</option>
                    @endforeach
                </select>
                <label for="service_id">Service</label>
            </div>
        </div>


        <div class="row">
            <button type="submit" class="waves-effect waves-light btn right">Create Service User</button>
        </div>
    </form>

@endsection
