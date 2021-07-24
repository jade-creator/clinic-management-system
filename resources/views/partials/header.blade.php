<nav class="navbar sticky-top w-100 d-flex flex-row-reverse py-3 shadow gradient-custom opacity-80">
    <ul class="nav">
        <li class="dropdown">
          <a class="dropdown-toggle d-flex align-items-center" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <h6 class="px-2 text-white">{{ auth()->user()->name }}</h6>
                <img class="rounded-circle" style="width: 30px;" src="https://thumbs.dreamstime.com/z/businessman-icon-image-male-avatar-profile-vector-glasses-beard-hairstyle-179728610.jpg" alt="avatar"/>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item mt-2" href="{{ route('profile.view', ['role' => auth()->user()->role->name, 'user_id' => auth()->user()->id]) }}">Profile</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </div>
        </li>
    </ul>
</nav>