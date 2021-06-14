<div class="container-fluid">
    <div>
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-primary">
                    <div class="card-body card-body pb-3 d-flex align-items-start">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="7" y="9" width="14" height="10" rx="2"></rect>
                                <circle cx="14" cy="14" r="2"></circle>
                                <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                             </svg>
                        </div>
                        <div>
                            <div class="text-value-lg">{{ $this->totalAppointments }}</div>
                            <div>Upcoming Appointments</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-info">
                    <div class="card-body card-body pb-3 d-flex align-items-start">
                        <div>
                            <svg viewBox="0 0 24 24" class="mr-3" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        </div>
                        <div>
                            <div class="text-value-lg">{{ $this->totalPrescriptions }}</div>
                            <div>Total Prescriptions</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-warning">
                    <div class="card-body card-body pb-3 d-flex align-items-start">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3" width="25" height="25" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                                <line x1="10" y1="14" x2="14" y2="14"></line>
                                <line x1="12" y1="12" x2="12" y2="16"></line>
                             </svg>
                        </div>
                        <div>
                            <div class="text-value-lg">{{ $this->totalHistories }}</div>
                            <div>Total Case Histories</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-danger">
                    <div class="card-body card-body pb-3 d-flex align-items-start">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3" width="25" height="25" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-value-lg">{{ $this->totalDocuments }}</div>
                            <div>Total Documents</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-success">
                    <div class="card-body card-body pb-3 d-flex align-items-start">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3" width="25" height="25" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <rect x="7" y="9" width="14" height="10" rx="2"></rect>
                                <circle cx="14" cy="14" r="2"></circle>
                                <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-value-lg">{{ $this->totalPayments }}</div>
                            <div>Total Payments</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-dark">
                    <div class="card-body card-body pb-3 d-flex align-items-start">
                        <div>
                            <svg viewBox="0 0 24 24" width="25" height="25" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-3"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        </div>
                        <div>
                            <div class="text-value-lg">{{ $this->totalUsers }}</div>
                            <div>Total Users</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-dark bg-secondary">
                    <div class="card-body card-body pb-3 d-flex align-items-start">
                        <div>
                            <svg viewBox="0 0 24 24" width="25" height="25" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-3"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        </div>
                        <div>
                            <div class="text-value-lg">{{ $this->totalStocks }}</div>
                            <div>Total Stocks</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-primary">
                    <div class="card-body card-body pb-3 d-flex align-items-start">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3" width="25" height="25" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4.5 12.5l8 -8a4.94 4.94 0 0 1 7 7l-8 8a4.94 4.94 0 0 1 -7 -7"></path>
                                <line x1="8.5" y1="8.5" x2="15.5" y2="15.5"></line>
                            </svg>
                        </div>
                        <div>
                            <div class="text-value-lg">{{ $this->totalTreatments }}</div>
                            <div>Total Treatments</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="w-full py-5 px-3 px-sm-4">
            <h1>{{ $barChart->options['chart_title'] }}</h1>
            {!! $barChart->renderHtml() !!}
        </div>
    </div>
    <div>
        {!! $barChart->renderChartJsLibrary() !!}
        {!! $barChart->renderJs() !!}
    </div>
</div>