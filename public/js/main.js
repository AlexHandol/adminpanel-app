document.addEventListener('DOMContentLoaded', function () {
    const statusBtn = document.getElementById('statusBtn');

    if (statusBtn) {
        const status = statusBtn.innerHTML.trim(); // Get the inner HTML and remove extra spaces

        if (status === 'Active') {
            statusBtn.classList.remove('btn-info');
            statusBtn.classList.add('btn-success');
        } else if (status === 'Passive') {
            statusBtn.classList.remove('btn-info');
            statusBtn.classList.add('btn-info'); // btn-info is already there, so this can be omitted
        }
    }
});