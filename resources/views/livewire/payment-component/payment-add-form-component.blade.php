<div class="container">
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
                        <input type="number" class="form-control @error('payment.subtotal') is-invalid @enderror" name="subtotal" required readonly wire:model="payment.sub_total" wire:loading.attr="disabled">
                        @error('payment.subtotal')
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
                        <button type="submit">Save</button>
                    </div>
                @endif
            </form>
        </div>
        <div class="col-8">
            <div class="form-group">
                <div class="row">
                    <div class="col">
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
                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" required autofocus wire:model.defer="quantity" wire:loading.attr="disabled">
                        @error('quantity')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary" wire:click.prevent="addItem">Add Item</button>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->items as $index => $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ $item['amount'] }}</td>
                            <td>
                                <button class="btn btn-danger" wire:click.prevent="removeItem({{$index}})">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No added treatments yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>