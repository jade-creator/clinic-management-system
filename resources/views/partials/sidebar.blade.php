<nav class="col-md-2 d-none d-xl-block bg-light">
    <div class="sticky-top">
        <ul class="nav flex-column">
            <li class="nav-item py-2 d-flex align-items-center justify-content-center">
                <a class="nav-link h4 font-weight-bold d-flex align-items-center justify-center" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-medical-cross" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M13 3a1 1 0 0 1 1 1v4.535l3.928 -2.267a1 1 0 0 1 1.366 .366l1 1.732a1 1 0 0 1 -.366 1.366l-3.927 2.268l3.927 2.269a1 1 0 0 1 .366 1.366l-1 1.732a1 1 0 0 1 -1.366 .366l-3.928 -2.269v4.536a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-4.536l-3.928 2.268a1 1 0 0 1 -1.366 -.366l-1 -1.732a1 1 0 0 1 .366 -1.366l3.927 -2.268l-3.927 -2.268a1 1 0 0 1 -.366 -1.366l1 -1.732a1 1 0 0 1 1.366 -.366l3.928 2.267v-4.535a1 1 0 0 1 1 -1h2z"></path>
                     </svg>
                    <span>CLINIC</span>
                </a>
            </li>
            @if (auth()->user()->role->name == 'patient')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('patient.dashboard.view') }}">
                        <svg viewBox="0 0 24 24" width="19" height="19" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-2 mr-3"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('patient.appointments.view') }}">
                        <svg viewBox="0 0 24 24" width="19" height="19" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-2 mr-3"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        Appointments
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('patient.histories.view') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-2 mr-3" width="20" height="20" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="12 8 12 12 14 14"></polyline>
                            <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5"></path>
                        </svg>
                        Case Histories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('patient.prescriptions.view') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-2 mr-3" width="20" height="20" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                            <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                            <line x1="10" y1="14" x2="14" y2="14"></line>
                            <line x1="12" y1="12" x2="12" y2="16"></line>
                         </svg>
                        Prescriptions
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('patient.payments.view') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-2 mr-3" width="20" height="20" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <rect x="7" y="9" width="14" height="10" rx="2"></rect>
                            <circle cx="14" cy="14" r="2"></circle>
                            <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                         </svg>
                         Payments
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.view') }}">
                        <svg viewBox="0 0 24 24" width="19" height="19" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-2 mr-3"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('appointments.view') }}">
                        <svg viewBox="0 0 24 24" width="19" height="19" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-2 mr-3"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        Appointments
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('prescriptions.view') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-2 mr-3" width="20" height="20" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                            <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                            <line x1="10" y1="14" x2="14" y2="14"></line>
                            <line x1="12" y1="12" x2="12" y2="16"></line>
                        </svg>
                        Prescriptions
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('histories.view') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-2 mr-3" width="20" height="20" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="12 8 12 12 14 14"></polyline>
                            <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5"></path>
                        </svg>
                        Case Histories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('documents.view') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-2 mr-3" width="20" height="20" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                        </svg>
                        Documents
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('payments.view') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-2 mr-3" width="20" height="20" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <rect x="7" y="9" width="14" height="10" rx="2"></rect>
                            <circle cx="14" cy="14" r="2"></circle>
                            <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                        </svg>
                        Payments
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle w-full" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-2 mr-3"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <span class="mr-5">All Users&nbsp;</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('patients.view') }}">Patients</a>
                        <a class="dropdown-item" href="{{ route('receptionists.view') }}">Receptionists</a>
                        <a class="dropdown-item" href="{{ route('doctors.view') }}">Doctors</a>
                        <a class="dropdown-item" href="{{ route('users.view') }}">View</a>
                      </div>
                    </li>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle w-full" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-2 mr-3"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        <span class="mr-5">Inventory</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('stocks.view') }}">Stock</a>
                        <a class="dropdown-item" href="{{ route('treatments.view') }}">Treatments</a>
                        <a class="dropdown-item" href="{{ route('categories.view') }}">Categories</a>
                      </div>
                    </li>
                </li>
            @endif
        </ul>
    </div>
</nav>