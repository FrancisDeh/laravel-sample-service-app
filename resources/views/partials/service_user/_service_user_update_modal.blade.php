<div id="modal2-{{$serviceUser->id}}" class="modal modal-fixed-footer">
    <form action="{{ route('service_users.update', $serviceUser->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="modal-content">
            <h4>Update <b>{{ $serviceUser->name }}</b></h4>

            <div class="row">
                <div class="input-field col s12">
                    <input id="name" type="text" name="name" value="{{ $serviceUser->name }}" autocomplete="off" required class="validate">
                    <label for="name">Name</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" name="email" autocomplete="off" value="{{ $serviceUser->email }}" required class="validate">
                    <label for="email">Email</label>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s12">
                    <input id="tel" type="tel" name="tel" maxlength="10" autocomplete="off" value="{{ $serviceUser->tel }}" required class="validate">
                    <label for="tel">Telephone</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <select id="service_id" name="service_id" required>
                        <option value="" disabled selected>Choose service</option>
                        @foreach($services as $service)
                            <option value="{{$service->id}}" {{ $service->id == $serviceUser->service_id ? 'selected' : '' }}>{{ $service->name }}</option>
                        @endforeach
                    </select>
                    <label for="service_id">Service</label>
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