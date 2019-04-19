@extends('layouts.main')
@section('title', 'Services Page')

@section('content-table')
    <p class="flow-text">Services ({{ $services->count() }})</p>
    <div class="divider"></div>

    @if($services->count())

    <p>Table displays all services available.</p>
    <table class="responsive-table highlight">
        <thead>
        <tr>
            <th>Service</th>
            <th>Description</th>
            <th>Number of Users</th>
            <th>Created</th>
            <th>Options</th>
        </tr>
        </thead>

        <tbody>
        @foreach($services as $service)
        <tr>
            <td>{{ $service->name }}</td>
            <td>{{ $service->description }}</td>
            <td>{{ $service->service_user->count() }}</td>
            <td>{{ $service->created_at->diffForHumans() }}</td>
            <td>
                <a class="waves-effect waves-teal dropdown-trigger btn btn-flat"
                   href='#' data-target='dropdown1-{{$service->id}}'>
                    <i class="fa fa-ellipsis-v fa-1x grey-text "></i>
                </a>

                <ul id='dropdown1-{{$service->id}}' class='dropdown-content'>
                    <li><a href="#modal1-{{$service->id}}" class="modal-trigger"><i
                                    class="fa fa-trash red-text "></i> </a></li>
                    <li><a href="#modal2-{{$service->id}}" class="modal-trigger"><i class="fa fa-edit"></i></a></li>

                </ul>

                <!-- Modal Structure -->
                @include('partials.services._service_delete_modal')
                @include('partials.services._service_update_modal')
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
    <p class="flow-text">Create Service</p>
    <div class="divider"></div>

    <form method="post" action="{{ route('services.store') }}">
        @csrf

        <div class="row">
            <div class="input-field col s12">
                <input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="off" required class="validate">
                <label for="name">Name</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <input id="description" type="text" name="description" autocomplete="off" value="{{ old('description') }}" required class="validate">
                <label for="description">Description</label>
            </div>
        </div>

        <div class="row">
            <button type="submit" class="waves-effect waves-light btn right">Create Service</button>
        </div>
    </form>

@endsection