<div class="px-3 px-sm-4">
    <div class="container">
        <div class="row d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Payment</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('payments.view') }}">
                    <button type="button" class="btn btn-sm btn-light border-2 border-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list" width="22" height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="9" y1="6" x2="20" y2="6"></line>
                            <line x1="9" y1="12" x2="20" y2="12"></line>
                            <line x1="9" y1="18" x2="20" y2="18"></line>
                            <line x1="5" y1="6" x2="5" y2="6.01"></line>
                            <line x1="5" y1="12" x2="5" y2="12.01"></line>
                            <line x1="5" y1="18" x2="5" y2="18.01"></line>
                        </svg>
                        View Payment List
                    </button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <form method="post" wire:submit.prevent="create">
                    <div class="form-group">
                        <label for="patient_id">Patient ID</label>
                        <select class="form-control @error('payment.patient_id') is-invalid @enderror" name="patient_id" id="patient_id" autofocus required wire:model="payment.patient_id" wire:loading.attr="disabled">
                            <option value="">-- choose patient id --</option>
                            @forelse ($this->patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->id }}</option>
                            @empty
                                <option value="">No option</option>
                            @endforelse
                        </select>
                        @error('payment.patient_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="patient_name">Patient Name</label>
                        <select class="form-control" name="patient_name" id="patient_name" autofocus required wire:model="patient_name" wire:loading.attr="disabled">
                            <option value="">-- choose patient name --</option>
                            @forelse ($this->patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->user->name }}</option>
                            @empty
                                <option value="">No option</option>
                            @endforelse
                        </select>
                    </div>
                    @if ($this->items && $this->payment->patient_id)
                        <div class="form-group">
                            <label for="sub_total">Sub Total</label>
                            <input type="number" class="form-control @error('payment.sub_total') is-invalid @enderror" name="subtotal" required readonly wire:model="payment.sub_total" wire:loading.attr="disabled">
                            @error('payment.sub_total')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="isPercent">Type of Discount</label>
                            <select class="form-control @error('payment.isPercent') is-invalid @enderror" name="isPercent" id="isPercent" autofocus wire:model.debounce.3000="payment.isPercent" wire:loading.attr="disabled">
                                <option value="0">Amount</option>
                                <option value="1">Percent</option>
                            </select>
                            @error('payment.isPercent')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount Value</label>
                            <input type="number" class="form-control @error('payment.discount') is-invalid @enderror" name="discount" wire:model.debounce.3000="payment.discount">
                            @error('payment.discount')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="grand_total">Grand Total</label>
                            <input type="number" class="form-control @error('payment.grand_total') is-invalid @enderror" name="grand_total" required readonly wire:model="payment.grand_total">
                            @error('payment.grand_total')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="date_deposit">Date Deposit</label>
                            <input type="date" class="form-control @error('deposit.date_deposit') is-invalid @enderror" name="date_deposit" required autofocus wire:model="deposit.date_deposit">
                            @error('deposit.date_deposit')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="amount_deposit">Amount Deposit</label>
                            <input type="number" class="form-control @error('deposit.amount_deposit') is-invalid @enderror" name="amount_deposit" required autofocus wire:model="deposit.amount_deposit">
                            @error('deposit.amount_deposit')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="isCash">Type of Deposit</label>
                            <select class="form-control @error('deposit.isCash') is-invalid @enderror" name="isCash" id="isCash" autofocus wire:model.defer="deposit.isCash" wire:loading.attr="disabled">
                                <option value="0">Bank</option>
                                <option value="1">Cash</option>
                            </select>
                            @error('deposit.isCash')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    @endif
                </form>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="treatment_id">Treatment Name</label>
                            <select class="form-control @error('treatment_id') is-invalid @enderror" name="treatment_id" autofocus wire:model.defer="treatment_id" wire:loading.attr="disabled">
                                <option value="">-- choose treatment --</option>
                                @forelse ($this->collectionTreatments as $treatment)
                                    <option value="{{ $treatment->id }}">{{ $treatment->name }}</option>
                                @empty
                                    <option value="">No treatment</option>
                                @endforelse
                            </select>
                            @error('treatment_id')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" required autofocus wire:model.defer="quantity" wire:loading.attr="disabled">
                            @error('quantity')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-2 d-flex align-items-end">
                            <button class="btn btn-primary" wire:click.prevent="addItem">Add Item</button>
                        </div>
                    </div>
                </div>
                <table class="table table-hover table-bordered table-light">
                    <thead>
                        <tr>
                            <th class="text-left" scope="col">ID</th>
                            <th class="text-left" scope="col">Name</th>
                            <th class="text-left" scope="col">Quantity</th>
                            <th class="text-left" scope="col">Amount</th>
                            <th class="text-left" scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->items as $index => $item)
                            <tr>
                                <td class="text-left" scope="row">{{ $item['id'] }}</td>
                                <td class="text-left">{{ $item['name'] }}</td>
                                <td class="text-left">{{ $item['quantity'] }}</td>
                                <td class="text-left">{{ $item['amount'] }}</td>
                                <td class="text-left">
                                    <button wire:click.prevent="removeItem({{$index}})" class="btn text-danger rounded-circle p-1" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="4" y1="7" x2="20" y2="7"></line>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center" scope="row">No added treatments yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>