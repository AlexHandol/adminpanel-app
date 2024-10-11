<div class="col-sm-12 col-md-6 mb-2">
    <div class="d-flex justify-content-end ">
        <form action="{{ route('accounts.index') }}" method="GET" class="d-flex input-group-sm">
            <input type="search" name="search" class="form-control" placeholder="Search..."
                value="{{ request('search', '') }}">
            <button class="btn btn-secondary btn-sm" type="submit" id="button-addon2">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
</div>
<script>
    function updateLimit() {
        const limit = document.getElementById('limiter').value;
        const search = document.getElementById('search-input').value; // Update with your search input ID
        const url = new URL(window.location.href);
        url.searchParams.set('limit', limit);
        if (search) {
            url.searchParams.set('search', search);
        } else {
            url.searchParams.delete('search');
        }
        window.location.href = url.toString();
    }

    document.getElementById('search-input').addEventListener('input', function() {
        const search = this.value;
        const limit = document.getElementById('limiter').value;
        const url = new URL(window.location.href);
        url.searchParams.set('search', search);
        url.searchParams.set('limit', limit);
        window.location.href = url.toString();
    });
</script>