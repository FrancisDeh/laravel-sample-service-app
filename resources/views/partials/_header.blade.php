<header>
    <nav>
        <div class="nav-wrapper white">

            <a href="#" class="brand-logo black-text left" style="margin-left: 20px;">
                <img src="{{ asset('images/services.png') }}" height="40" width="40" style="border-radius: 50%; margin-bottom: -10px;">
                <b>Service App</b>
            </a>
            <ul id="nav-mobile" class="right">
                <li>
                    <a href="#" class="black-text">
                        <i class="fa fa-user-circle fa-1x" style="margin-right: 5px;"></i>
                        {{ auth()->user()->name }} (admin)
                    </a>
                </li>
                <li>
                    <a  class="black-text" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-times-circle fa-1x" style="margin-right: 5px;"></i>
                        {{ __('Sign Out') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>


                </li>
            </ul>
        </div>
    </nav>
</header>