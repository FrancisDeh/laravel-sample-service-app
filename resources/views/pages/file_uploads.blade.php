@extends('layouts.main')
@section('title', 'File Uploads Page')

@section('content-table')
    <p class="flow-text">Files ({{ $files->count() }})</p>
    <div class="divider"></div>

    @if($files->count())

        <p>Table displays all services available.</p>
        <table class="responsive-table highlight">
            <thead>
            <tr>
                <th>File Name</th>
                <th>File Format</th>
                <th>Created</th>
                <th>Options</th>
            </tr>
            </thead>

            <tbody>
            @foreach($files as $file)
                <tr>
                    <td>{{ $file->name }}</td>
                    <td>{{ $file->format }}</td>
                    <td>{{ $file->created_at->diffForHumans() }}</td>
                    <td>
                        <a class="waves-effect waves-teal dropdown-trigger btn btn-flat"
                           href='#' data-target='dropdown1-{{$file->id}}'>
                            <i class="fa fa-ellipsis-v fa-1x grey-text "></i>
                        </a>

                        <ul id='dropdown1-{{$file->id}}' class='dropdown-content'>
                            <li><a href="#modal1-{{$file->id}}" class="modal-trigger"><i
                                            class="fa fa-trash red-text "></i> </a></li>
                            <li><a href="#modal2-{{$file->id}}" class="modal-trigger"><i class="fa fa-edit"></i></a></li>

                        </ul>

                        <!-- Modal Structure -->
                        @include('partials.file_uploads._file_uploads_delete_modal')
                        @include('partials.file_uploads._file_uploads_update_modal')
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
    <p class="flow-text">Upload File</p>
    <div class="divider"></div>

    <form method="post" action="{{ route('files.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="input-field col s12">
                <input id="name" type="text" name="name" value="{{ old('name') }}" autocomplete="off" required class="validate">
                <label for="name">Name</label>
            </div>
        </div>

        <div class="row">
            <div class="file-field input-field">
                <div class="btn green">
                    <span>File</span>
                    <input type="file" name="file" required>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate"  type="text">
                </div>
            </div>
        </div>

        <div class="row">
            <button type="submit" class="waves-effect waves-light btn right">Upload File</button>
        </div>
    </form>

@endsection