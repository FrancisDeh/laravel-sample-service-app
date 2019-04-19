
    <div class="card horizontal">
        <div class="card-stacked">
            <div class="card-content">
                <p class="flow-text">Menu</p>
                <div class="divider"></div>
                <div class="collection">
                    <a href="{{ route('services.index') }}" class="collection-item {{ Route::is('services.index')  ? 'active' : ''}}">
                        <i class="fa fa-server"></i>
                        Services</a>
                    <a href="{{ route('service_users.index') }}" class="collection-item {{ Route::is('service_users.index') ? 'active' : '' }}">
                        <i class="fa fa-users"></i>
                        Service Users</a>
                    <a href="{{ route('files.index') }}" class="collection-item {{ Route::is('files.index') ? 'active' : '' }}">
                        <i class="fa fa-upload"></i>
                        Uploads</a>
                </div>
            </div>
        </div>
    </div>
