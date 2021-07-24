<div class="container-fluid">
    <div class="pt-4">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-white shadow">
                    <div class="card-body card-body pb-3 d-flex align-items-start">
                        <div class="text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3" width="30" height="30" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="7" y="9" width="14" height="10" rx="2"></rect>
                                <circle cx="14" cy="14" r="2"></circle>
                                <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                             </svg>
                        </div>
                        <div class="text-dark">
                            <div class="text-value-lg h5">{{ $this->totalBillAmount }}</div>
                            <div>Total Bill Amount</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-white shadow">
                    <div class="card-body card-body pb-3 d-flex align-items-start">
                        <div class="text-info">
                            <svg viewBox="0 0 24 24" class="mr-3" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        </div>
                        <div class="text-dark">
                            <div class="text-value-xs h5">{{ $this->upcomingAppointment->count() }}</div>
                            <div class="text-value-xs">Upcoming Appointment</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-white shadow">
                    <div class="card-body card-body pb-3 d-flex align-items-start">
                        <div class="text-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3" width="25" height="25" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                                <line x1="10" y1="14" x2="14" y2="14"></line>
                                <line x1="12" y1="12" x2="12" y2="16"></line>
                             </svg>
                        </div>
                        <div class="text-dark">
                            <div class="text-value-lg h5">{{ $this->prescriptions->count() }}</div>
                            <div>Prescriptions</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-white shadow">
                    <div class="card-body card-body pb-3 d-flex align-items-start">
                        <div class="text-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3" width="25" height="25" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="12 8 12 12 14 14"></polyline>
                                <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5"></path>
                            </svg>
                        </div>
                        <div class="text-dark">
                            <div class="text-value-lg h5">{{ $this->caseHistories->count() }}</div>
                            <div>Case Histories</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
