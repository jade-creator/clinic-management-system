<nav class="navbar sticky-top w-100 d-flex flex-row flex-xl-row-reverse py-3 shadow gradient-custom opacity-80">
    <a class="d-block d-xl-none h4 text-white font-weight-bold d-flex align-items-center justify-center" role="button">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M13 3a1 1 0 0 1 1 1v4.535l3.928 -2.267a1 1 0 0 1 1.366 .366l1 1.732a1 1 0 0 1 -.366 1.366l-3.927 2.268l3.927 2.269a1 1 0 0 1 .366 1.366l-1 1.732a1 1 0 0 1 -1.366 .366l-3.928 -2.269v4.536a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-4.536l-3.928 2.268a1 1 0 0 1 -1.366 -.366l-1 -1.732a1 1 0 0 1 .366 -1.366l3.927 -2.268l-3.927 -2.268a1 1 0 0 1 -.366 -1.366l1 -1.732a1 1 0 0 1 1.366 -.366l3.928 2.267v-4.535a1 1 0 0 1 1 -1h2z"></path>
      </svg>
    </a>
    <ul class="nav d-flex align-items-center justify-content-between">
        <li class="dropdown">
          <a class="dropdown-toggle d-flex align-items-center" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <h6 class="px-2 text-white">{{ auth()->user()->name }}</h6>
                <img class="rounded-circle" style="width: 30px;" src="https://thumbs.dreamstime.com/z/businessman-icon-image-male-avatar-profile-vector-glasses-beard-hairstyle-179728610.jpg" alt="avatar"/>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            @if (auth()->user()->role->name == 'patient')
              <a class="dropdown-item d-block d-xl-none" href="{{ route('patient.dashboard.view') }}">Dashboard</a>
              <a class="dropdown-item d-block d-xl-none" href="{{ route('patient.appointments.view') }}">Appointments</a>
              <a class="dropdown-item d-block d-xl-none" href="{{ route('patient.histories.view') }}">Case Histories</a>
              <a class="dropdown-item d-block d-xl-none" href="{{ route('patient.prescriptions.view') }}">Prescriptions</a>
              <a class="dropdown-item d-block d-xl-none" href="{{ route('patient.payments.view') }}">Payments</a>
            @else
              <a class="dropdown-item d-block d-xl-none" href="{{ route('dashboard.view') }}">Dashboard</a>
              <a class="dropdown-item d-block d-xl-none" href="{{ route('appointments.view') }}">Appointments</a>
              <a class="dropdown-item d-block d-xl-none" href="{{ route('histories.view') }}">Case Histories</a>
              <a class="dropdown-item d-block d-xl-none" href="{{ route('documents.view') }}">Documents</a>
              <a class="dropdown-item d-block d-xl-none" href="{{ route('payments.view') }}">Payments</a>
              <div class="dropdown-divider d-block d-xl-none"></div>
              <a class="dropdown-item d-block d-xl-none" href="{{ route('users.view') }}">All Users</a>
              <a class="dropdown-item d-block d-xl-none" href="{{ route('patients.view') }}">Patients</a>
              <a class="dropdown-item d-block d-xl-none" href="{{ route('receptionists.view') }}">Receptionists</a>
              <a class="dropdown-item d-block d-xl-none" href="{{ route('doctors.view') }}">Doctors</a>
              <div class="dropdown-divider d-block d-xl-none"></div>
              <a class="dropdown-item d-block d-xl-none" href="{{ route('stocks.view') }}">Stock</a>
              <a class="dropdown-item d-block d-xl-none" href="{{ route('treatments.view') }}">Treatments</a>
              <a class="dropdown-item d-block d-xl-none" href="{{ route('categories.view') }}">Categories</a>
            @endif
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