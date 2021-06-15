<div class="px-3 px-sm-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Deposit</h1>
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
                    <span class="d-none d-md-inline-block">View List</span>
                </button>
            </a>
        </div>
    </div>
    <form method="post" wire:submit.prevent="create">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="payment_id">Payment ID</label>
                <input readonly type="number" class="form-control" id="payment_id" name="payment_id" wire:model="deposit.payment_id">
            </div>
            <div class="form-group col-md-6">
                <label for="date_deposit">Date</label>
                <input type="date" class="form-control @error('deposit.date_deposit') is-invalid @enderror" id="date_deposit" name="date_deposit" required autofocus wire:model.defer="deposit.date_deposit" wire:loading.attr="disabled">
                @error('deposit.date_deposit')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div> 
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="grand_total">Grand Total</label>
                <input readonly type="number" class="form-control" id="grand_total" name="grand_total" wire:model="grand_total">
            </div>
            <div class="form-group col-md-6">
                <label for="due">Due Amount</label>
                <input readonly type="number" class="form-control" id="due" name="due" wire:model="due">
            </div> 
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="isCash">Type of Deposit</label>
                <select class="form-control @error('deposit.isCash') is-invalid @enderror" id="isCash" name="isCash" required autofocus wire:model.defer="deposit.isCash" wire:loading.attr="disabled">
                    <option value="">-- choose type of deposit --</option>
                    <option value="0">Bank</option>
                    <option value="1">Cash</option>
                </select>
                @error('deposit.isCash')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="amount_deposit">Amount Deposit</label>
                <input type="number" class="form-control @error('deposit.amount_deposit') is-invalid @enderror" id="amount_deposit" name="amount_deposit" wire:model.defer="deposit.amount_deposit" wire:loading.attr="disabled">
                @error('deposit.amount_deposit')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div> 
        </div>
        <div class="form-group text-right">
            <button class="btn px-5 btn-primary" type="submit" wire:loading.attr="disabled">Save</button>
        </div>
    </form>
</div>