<div>
    {{-- <h1>Create Payroll Form From Livewire</h1> --}}
    <form wire:submit.prevent="savePayroll">
        @csrf
    <div class="container">
        <div class="row mt-2">
        
            <div class="col-md-4">
                
                <label for="" class="col-sm-12 col-form-label">Salesrep name</label> <br>
                <div class="col-sm-12">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        <select wire:model="salesrepname" class="form-control">
                            <option value="">Select Salesrep</option>
                            @foreach ($salesrep as $sr)
                                <option value="{{$sr->id}}">{{$sr->salesrep_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @error('salesrepname') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-5">

                <label for="" class="col-sm-12 text-center col-form-label">Date Period</label>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <select wire:model="month" class="form-control">
                                <option value="">Select Month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                            @error('month') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-sm-4">
                            <select wire:model="period" class="form-control">
                                <option value="">Select period</option>
                                <option value="1-15">1-15</option>
                                <option value="16-30">16-30</option>
                                <option value="16-31">16-31</option>
                            </select>
                            @error('period') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-sm-4">
                            <select wire:model="year" class="form-control">
                                <option value="">Select Year</option>
                                @for ($i = 2021; $i < 2099; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            @error('year') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                    
            </div>
            {{-- will appear only if number of clients isset --}}
            @if($number_of_clients != null)
                <div class="col-sm-3">
                    <label for="" class="col-sm-12 col-form-label">Opening Balance</label> <br>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-dollar-sign"></i></span>
                        <input type="number" wire:model="opening_balance" min="0" class="form-control" value="{{old('bonuses')}}">
                    </div>
                    @error('opening_balance') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            @endif
            

        </div>

        <div class="row">
            {{-- will appear only if number of clients isset --}}
            @if($number_of_clients != null)
                <div class="col-sm-2">
                    <label for="" class="col-sm-12 col-form-label">Leads Purchased:</label> <br>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                        <input type="number" wire:model="lead_purchased" min="0" class="form-control" value="{{old('bonuses')}}">
                    </div>
                    @error('lead_purchased') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-sm-2">
                    <label for="" class="col-sm-12 col-form-label">Issue Charge:</label> <br>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-dollar-sign"></i></span>
                        <input type="number" wire:model="issue_charge" min="0" class="form-control" value="{{old('bonuses')}}">
                    </div>
                    @error('issue_charge') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            @endif

            <div class="col-sm-2">
                <label for="" class="col-sm-12 col-form-label">Bonuses</label> <br>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-dollar-sign"></i></span>
                    <input type="number" wire:model="bonuses" min="0" class="form-control" value="{{old('bonuses')}}">
                </div>
                @error('bonuses') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            {{-- will appear only if number of clients isset --}}
            @if($number_of_clients != null)
                <div class="col-sm-2">
                    <label for="" class="col-sm-12 col-form-label">Agency Release:</label> <br>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-dollar-sign"></i></span>
                        <input type="number" wire:model="agency_release" min="0" class="form-control" value="{{old('bonuses')}}">
                    </div>
                    @error('agency_release') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            @endif
            <div class="col-sm-2">
                <label for="" class="col-sm-12 col-form-label">Number of Clients</label> <br>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                    <input type="number" wire:model="number_of_clients" min="0" class="form-control" value="{{old('clients_num')}}">
                </div>
                @error('number_of_clients') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
             
        </div>

        @if ($number_of_clients != null)
            <div class="row">
                <div class="col-sm-6 offset-3">
                    <label for="" class="col-sm-12 col-form-label">Client Name</label> <br>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        <input type="text" wire:model="client_name" class="form-control" value="{{old('clients_num')}}">
                    </div>
                    @error('client_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2 offset-5">
                    <label for="" class="col-sm-12">Eliteinsure Commissions:</label> <br>
                    <div class="input-group ">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-dollar-sign"></i></span>
                        <input type="text" class="form-control" value="{{$eliteinsure_commissions}}" readonly wire:model="eliteinsure_commissions"/>
                        
                    </div>
                    @error('eliteinsure_commissions') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        @endif
        <div class="row mt-2">
            <div class="col-sm-4 offset-4">
                <button type="submit" class="btn btn-block btn-danger form-control" wire:loading.attr="disabled">Create Payroll </button>
                {{-- <button type="submit" class="btn btn-block btn-danger form-control" {{$disabled}}>Create Payroll </button> --}}
            </div>
        </div>

    </form>
    </div>
</div>
