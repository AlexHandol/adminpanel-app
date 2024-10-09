<div class="col-sm-12 col-md-6 mb-2">
    <div class="d-flex justify-content-end ">
        <form action="{{ route('accounts.index') }}" method="GET" class="d-flex input-group-sm">
            {{-- <input type="search" name="search" class="form-control" placeholder="Search..."
                value="{{ request('search', '') }}"> --}}
            {{-- AJAX AUTO SEARCH AND LIMIT --}}
            <input type="search" id="search-input" name="search" class="form-control" placeholder="Search..."
                value="{{ request('search') }}">
            <button class="btn btn-secondary btn-sm ms-1 mb-1" type="submit" id="button-addon2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                </svg>
            </button>
        </form>
    </div>
</div>
{{-- <script>
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
</script> --}}




{{-- AJAX AUTO SEARCH AND LIMIT --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const limiter = document.getElementById('limiter');
        const searchInput = document.getElementById('search-input');
        const tableBody = document.querySelector('tbody');
        const paginationContainer = document.querySelector('.pagination-container');

        function fetchAccounts(page = 1) {
    const limit = limiter.value;
    const search = searchInput.value;

    fetch(`{{ route('accounts.search') }}?limit=${limit}&search=${search}&page=${page}`)
        .then(response => response.json())
        .then(data => {
            // Clear the table body
            tableBody.innerHTML = '';

            // Populate the table with the fetched data
            if (data.data.length > 0) {
                data.data.forEach(account => {
                    const row = `
                        <tr>
                            <td>${account.full_name}</td>
                            <td>${account.phone_number}</td>
                            <td>${account.gps_id}</td>
                            <td>${account.sim_number}</td>
                            <td>${new Date(account.created_at).toLocaleDateString()}</td>
                            <td>${account.tariffs.tariff_name}</td>
                            <td>${account.statuses.status_name}</td>
                            <td>
                                <a href="{{ route('accounts.view.show', '') }}/${account.id}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    `;
                    tableBody.insertAdjacentHTML('beforeend', row);
                });

                // Update the summary of how many entries are shown
                document.getElementById('start-entry').innerText = data.from || 0;
                document.getElementById('end-entry').innerText = data.to || 0;
                document.getElementById('total-entries').innerText = data.total || 0;
            } else {
                tableBody.innerHTML =
                    '<tr><td colspan="7" class="text-center">No matches found.</td></tr>';

                // Reset the entry summary to zero
                document.getElementById('start-entry').innerText = 0;
                document.getElementById('end-entry').innerText = 0;
                document.getElementById('total-entries').innerText = 0;
            }

            // Render pagination links
            renderPagination(data);
        });
}


        function renderPagination(data) {
            paginationContainer.innerHTML = '';

            const paginationNav = document.createElement('nav');
            const paginationUl = document.createElement('ul');
            paginationUl.className = 'pagination';

            // Previous Button
            const prevLi = document.createElement('li');
            prevLi.className = `page-item ${!data.prev_page_url ? 'disabled' : ''}`;
            const prevLink = document.createElement('a');
            prevLink.className = 'page-link';
            prevLink.innerHTML = 'Prev';
            prevLink.href = '#';
            prevLink.onclick = (e) => {
                e.preventDefault();
                if (data.prev_page_url) fetchAccounts(data.current_page - 1);
            };
            prevLi.appendChild(prevLink);
            paginationUl.appendChild(prevLi);

            // Page Number Links
            for (let i = 1; i <= data.last_page; i++) {
                const pageLi = document.createElement('li');
                pageLi.className = `page-item ${i === data.current_page ? 'active' : ''}`;
                const pageLink = document.createElement('a');
                pageLink.className = 'page-link';
                pageLink.innerText = i;
                pageLink.href = '#';
                pageLink.onclick = (e) => {
                    e.preventDefault();
                    fetchAccounts(i);
                };
                pageLi.appendChild(pageLink);
                paginationUl.appendChild(pageLi);
            }

            // Next Button
            const nextLi = document.createElement('li');
            nextLi.className = `page-item ${!data.next_page_url ? 'disabled' : ''}`;
            const nextLink = document.createElement('a');
            nextLink.className = 'page-link';
            nextLink.innerHTML = 'Next';
            nextLink.href = '#';
            nextLink.onclick = (e) => {
                e.preventDefault();
                if (data.next_page_url) fetchAccounts(data.current_page + 1);
            };
            nextLi.appendChild(nextLink);
            paginationUl.appendChild(nextLi);

            paginationNav.appendChild(paginationUl);
            paginationContainer.appendChild(paginationNav);
        }

        limiter.addEventListener('change', () => fetchAccounts());
        searchInput.addEventListener('input', () => fetchAccounts());

        // Initial fetch
        fetchAccounts();
    });
</script>
