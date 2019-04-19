<div id="modal1-{{$service->id}}" class="modal">
    <form action="{{ route('services.destroy', $service->id) }}" method="post">
        @csrf
        @method('DELETE')

        <div class="modal-content">
            <h4>Confirm Delete</h4>
            <p>Are you sure you want to delete <b>{{ $service->name }}</b>?</p>
        </div>
        <div class="modal-footer">
            <a href="#!"
               class="modal-close waves-effect waves-green btn-flat">Cancel</a>
            <button type="submit"
                    class="modal-close waves-effect waves-red btn-flat">Delete</button>
        </div>
    </form>

</div>