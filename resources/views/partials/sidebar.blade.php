<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <img class="c-sidebar-brand-full" src="https://drive.google.com/uc?id=1bJ3E3d9wY4CXuU4R1vNHVlwRQBQQyqP-" alt="CoreUI Logo" style="width: 100px;">
    </div>
    <ul class="c-sidebar-nav">
        @if (auth()->user()->role->name == 'patient')
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('patient.dashboard.view') }}">
                    <svg viewBox="0 0 24 24" width="19" height="19" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-2 mr-3"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    Dashboard
                </a>
            </li>
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" role="button" tabindex="0">
                    <svg viewBox="0 0 24 24" width="19" height="19" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-2 mr-3"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    Appointments
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('patient.appointments.add') }}">
                            Add
                        </a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('patient.appointments.view') }}">
                            View all
                        </a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('patient.appointments.view', ['byDate' => 'today']) }}">
                            Today
                        </a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('patient.appointments.view', ['byDate' => 'upcoming']) }}">
                            Upcoming
                        </a>
                    </li>
                </ul>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('patient.histories.view') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2 mr-3" width="20" height="20" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <polyline points="12 8 12 12 14 14"></polyline>
                        <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5"></path>
                    </svg>
                    Case Histories
                </a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('patient.prescriptions.view') }}">
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
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('patient.payments.view') }}">
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
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="#">
                    <svg viewBox="0 0 24 24" width="19" height="19" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-2 mr-3"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    Dashboard
                </a>
            </li>

            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" role="button" tabindex="0">
                    <svg viewBox="0 0 24 24" width="19" height="19" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-2 mr-3"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    Appointments
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        @if (auth()->user()->role->name == 'doctor')
                            <a class="c-sidebar-nav-link" href="{{ route('doctor.appointments.add') }}">
                                Add
                            </a>
                        @else
                            <a class="c-sidebar-nav-link" href="{{ route('appointments.add') }}">
                                Add
                            </a>
                        @endif
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('appointments.view') }}">
                            View all
                        </a>
                    </li>
                </ul>
            </li>
            
            @if (auth()->user()->role->name == 'receptionist')
                <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                    <a class="c-sidebar-nav-link" href="{{ route('prescriptions.view') }}">
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
            @else
                <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" role="button" tabindex="1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-2 mr-3" width="20" height="20" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                            <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                            <line x1="10" y1="14" x2="14" y2="14"></line>
                            <line x1="12" y1="12" x2="12" y2="16"></line>
                        </svg>
                        Prescriptions
                    </a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-item">
                            @if (auth()->user()->role->name == 'admin')
                                <a class="c-sidebar-nav-link" href="{{ route('prescriptions.add') }}">
                                    Add
                                </a>
                            @endif

                            @if (auth()->user()->role->name == 'doctor')
                                <a class="c-sidebar-nav-link" href="{{ route('doctor.prescriptions.add') }}">
                                    Add
                                </a>
                            @endif
                        </li>
                        <li class="c-sidebar-nav-item">
                            <a class="c-sidebar-nav-link" href="{{ route('prescriptions.view') }}">
                                View all
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" role="button" tabindex="2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2 mr-3" width="20" height="20" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <polyline points="12 8 12 12 14 14"></polyline>
                        <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5"></path>
                    </svg>
                    Case Histories
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('histories.add') }}">
                            Add
                        </a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('histories.view') }}">
                            View all
                        </a>
                    </li>
                </ul>
            </li>

            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" role="button" tabindex="3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2 mr-3" width="20" height="20" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                     </svg>
                    Documents
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('documents.add') }}">
                            Add
                        </a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('documents.view') }}">
                            View all
                        </a>
                    </li>
                </ul>
            </li>

            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" role="button" tabindex="4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2 mr-3" width="20" height="20" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <rect x="7" y="9" width="14" height="10" rx="2"></rect>
                        <circle cx="14" cy="14" r="2"></circle>
                        <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                     </svg>
                    Payments
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('payments.add') }}">
                            Add
                        </a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('payments.view') }}">
                            View all
                        </a>
                    </li>
                </ul>
            </li>

            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" role="button" tabindex="4">
                    <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-2 mr-3"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    Users
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="#">
                            Admin
                        </a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="#">
                            Doctor
                        </a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="#">
                            Receptionist
                        </a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="#">
                            Patient
                        </a>
                    </li>
                </ul>
            </li>

            <li class="c-sidebar-nav-title">Inventory</li>

            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" role="button" tabindex="5">
                    <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-2 mr-3"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                    Stocks
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('stocks.add') }}">
                            Add
                        </a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('stocks.view') }}">
                            View all
                        </a>
                    </li>
                </ul>
            </li>

            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" role="button" tabindex="6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2 mr-3" width="20" height="20" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4.5 12.5l8 -8a4.94 4.94 0 0 1 7 7l-8 8a4.94 4.94 0 0 1 -7 -7"></path>
                        <line x1="8.5" y1="8.5" x2="15.5" y2="15.5"></line>
                    </svg>
                    Treatments
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('treatments.add') }}">
                            Add
                        </a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('treatments.view') }}">
                            View all
                        </a>
                    </li>
                </ul>
            </li>

            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" role="button" tabindex="6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2 mr-3" width="20" height="20" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M11 3l9 9a1.5 1.5 0 0 1 0 2l-6 6a1.5 1.5 0 0 1 -2 0l-9 -9v-4a4 4 0 0 1 4 -4h4"></path>
                        <circle cx="9" cy="9" r="2"></circle>
                     </svg>
                    Categories
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('categories.add') }}">
                            Add
                        </a>
                    </li>
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('categories.view') }}">
                            View all
                        </a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</div>