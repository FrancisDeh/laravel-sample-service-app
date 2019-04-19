<div id="modal2-{{$file->id}}" class="modal modal-fixed-footer">
    <form action="{{ route('files.update', $file->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="modal-content">
            <h4>Update <b>{{ $file->name }}</b></h4>

            <div class="row">
                <div class="input-field col s12">
                    <input id="name" type="text" name="name" value="{{ $file->name }}" autocomplete="off" required class="validate">
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

        </div>
        <div class="modal-footer">
            <a href="#!"
               class="modal-close waves-effect waves-green btn-flat">Cancel</a>
            <button type="submit"
                    class="modal-close waves-effect waves-red btn-flat">Update</button>
        </div>
    </form>

</div>