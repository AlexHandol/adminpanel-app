<div class="col-sm-12 col-md-6 mb-2">
    <div class="d-flex justify-content-end ">
        <form action="{{ route('accounts.index') }}" method="GET" class="d-flex input-group-sm">
            <input type="search" id="search-input" name="search" class="form-control" placeholder="Search..."
                value="{{ request('search') }}">
        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const limiter = document.getElementById('limiter');
        const searchInput = document.getElementById('search-input');
        const tableBody = document.getElementById('tbody');
        const paginationContainer = document.querySelector('.pagination-container');
        const filterForm = document.getElementById('filterForm');
        const tariffSelect = filterForm.querySelector('select[name="tariff_id"]');
        const statusSelect = filterForm.querySelector('select[name="status_id"]');
        const createDateInput = filterForm.querySelector('input[name="create-date"]');

        function formatDate(dateString) {
            const date = new Date(dateString);
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
            const day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }

        function fetchAccounts(page = 1) {
            const limit = limiter.value;
            const search = searchInput.value;
            const tariffId = tariffSelect.value;
            const statusId = statusSelect.value;
            const createDate = createDateInput.value;

            fetch(`{{ route('accounts.search') }}?limit=${limit}&search=${search}&page=${page}&tariff_id=${tariffId}&status_id=${statusId}&create-date=${createDate}`)
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
                                    <td>${formatDate(account.created_at)}</td>
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
                        tableBody.innerHTML = '<tr><td colspan="7" class="text-center">No matches found.</td></tr>';
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

            // Page Number Links with ellipsis logic
            if (data.last_page > 5) {
                for (let i = 1; i <= data.last_page; i++) {
                    if (i <= 2 || i >= data.last_page - 1 || (i >= data.current_page - 1 && i <= data.current_page + 1)) {
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
                    } else if (i === 3 || i === data.last_page - 2) {
                        const ellipsisLi = document.createElement('li');
                        ellipsisLi.className = 'page-item disabled';
                        ellipsisLi.innerHTML = '<span class="page-link">...</span>';
                        paginationUl.appendChild(ellipsisLi);
                    }
                }
            } else {
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

        // Event listeners for limiter, search input, and filter form
        limiter.addEventListener('change', () => fetchAccounts());
        searchInput.addEventListener('input', () => fetchAccounts());

        filterForm.addEventListener('submit', (e) => {
            e.preventDefault(); // Prevent default form submission
            fetchAccounts(); // Fetch accounts with filters applied
        });

        // Initial fetch
        fetchAccounts();
    });
</script>
