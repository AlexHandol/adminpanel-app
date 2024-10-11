<div class="col-sm-12 col-md-6">
    <div class="dataTables_length" id="datatables-reponsive_length" style="font-size: 12px;">
        აჩვენე <label>
            <select id="limiter" name="limit" aria-controls="datatables-reponsive" class="form-select form-select-sm"
                onchange="updateLimit()">
                <option value="10" {{ request('limit') == 10 ? 'selected' : '' }}>10</option>
                <option value="25" {{ request('limit') == 25 ? 'selected' : '' }}>25</option>
                <option value="50" {{ request('limit') == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ request('limit') == 100 ? 'selected' : '' }}>100</option>
            </select>
        </label> ჩანაწერი
    </div>
</div>
