<div class="modal fade" id="filterAccountModalLabel" tabindex="-1" aria-labelledby="deleteCustomerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Filter Accounts</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="filterForm" action="{{ route('accounts.index', $account->id) }}" method="GET">
                @csrf
                <div class="modal-body">
                    <div class="form-group mt-1">
                        <label>Tariff</label>
                        <select name="tariff_id" id="tariffSelect" class="form-control mt-1">
                            <option value="{{ $account->tariff_id }}">-Select a tariff</option>
                            @foreach ($tariffs as $tariff)
                                <option value="{{ $tariff->id }}">{{ $tariff->tariff_name }}</option>
                            @endforeach
                        </select>
                        @error('tariff_id')
                            <span class="d-block fs-6 text-danger mt-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-1">
                        <label>Status</label>
                        <select name="status_id" id="statusSelect" class="form-control mt-1">
                            <option value="{{ $account->status_id }}">-Select a status</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->status_name }}</option>
                            @endforeach
                        </select>
                        @error('status_id')
                            <span class="d-block fs-6 text-danger mt-1">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-1">
                        <label>Create Date</label>
                        <input type="text" name="create-date" id="createDateInput" class="form-control mt-1"
                            placeholder="Create Date" onfocus="(this.type='date')"
                            onblur="if(this.value==''){this.type='text'}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="{{ route('accounts.index') }}" type="button" class="btn btn-warning">Clear</a>
                    <button type="submit" name="filterSubmit" id="filterSubmitButton" data-bs-dismiss="modal"
                        class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
