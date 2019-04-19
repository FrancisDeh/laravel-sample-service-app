<div id="modal2-{{$service->id}}" class="modal modal-fixed-footer">
    <form action="{{ route('services.update', $service->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="modal-content">
            <h4>Update <b>{{ $service->name }}</b></h4>

            <div class="row">
                <div class="input-field col s12">
                    <input id="name" type="text" name="name" value="{{ $service->name }}" autocomplete="off" required class="validate">
                    <label for="name">Name</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="description" type="text" name="description" autocomplete="off" value="{{ $service->description }}" required class="validate">
                    <label for="description">Description</label>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <a href="#!"
               class="modal-close waves-effect waves-green btn-flat">Cancel</a>
            <button type="submit"
                    class="modal-close waves-effect waves-red btn-flat">Update</button>
        </div>
    </form>

</div>