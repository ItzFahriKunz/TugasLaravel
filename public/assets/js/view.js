document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.book-checkbox');
    const selectedCount = document.getElementById('selectedCount');
    const searchBox = document.getElementById('searchBook');
    const bookItems = document.querySelectorAll('.book-item');
    const form = document.getElementById('formPinjam');
    const btnSubmit = document.getElementById('btnSubmit');

    // Update selected count
    function updateCount() {
        const count = document.querySelectorAll('.book-checkbox:checked').length;
        selectedCount.innerHTML = `Dipilih: <strong>${count}</strong> buku`;
    }

    // Handle checkbox change
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const parent = this.closest('.book-item');
            if (this.checked) {
                parent.classList.add('selected');
            } else {
                parent.classList.remove('selected');
            }
            updateCount();
        });
    });

    // Handle click on book item (toggle checkbox)
    bookItems.forEach(item => {
        item.addEventListener('click', function(e) {
            if (e.target.type !== 'checkbox' && e.target.tagName !== 'LABEL') {
                const checkbox = this.querySelector('.book-checkbox');
                checkbox.checked = !checkbox.checked;
                checkbox.dispatchEvent(new Event('change'));
            }
        });
    });

    // Search functionality
    searchBox.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        bookItems.forEach(item => {
            const bookTitle = item.getAttribute('data-book-title');
            if (bookTitle.includes(searchTerm)) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });
    });

    // Form validation
    form.addEventListener('submit', function(e) {
        const checkedBooks = document.querySelectorAll('.book-checkbox:checked');
        
        if (checkedBooks.length === 0) {
            e.preventDefault();
            alert('⚠️ Pilih minimal 1 buku untuk dipinjam!');
            return false;
        }
    });

    // Initial count
    updateCount();
});

document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.book-checkbox');
    const selectedCount = document.getElementById('selectedCount');
    const searchBox = document.getElementById('searchBook');
    const bookItems = document.querySelectorAll('.book-item');
    const form = document.getElementById('formPinjam');

    // Update selected count
    function updateCount() {
        const count = document.querySelectorAll('.book-checkbox:checked').length;
        selectedCount.innerHTML = `Dipilih: <strong>${count}</strong> buku`;
    }

    // Handle checkbox change
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const parent = this.closest('.book-item');
            if (this.checked) {
                parent.classList.add('selected');
            } else {
                parent.classList.remove('selected');
            }
            updateCount();
        });
    });

    // Handle click on book item (toggle checkbox)
    bookItems.forEach(item => {
        item.addEventListener('click', function(e) {
            if (e.target.type !== 'checkbox' && e.target.tagName !== 'LABEL') {
                const checkbox = this.querySelector('.book-checkbox');
                checkbox.checked = !checkbox.checked;
                checkbox.dispatchEvent(new Event('change'));
            }
        });
    });

    // Search functionality
    searchBox.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        bookItems.forEach(item => {
            const bookTitle = item.getAttribute('data-book-title');
            if (bookTitle.includes(searchTerm)) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });
    });

    // Form validation
    form.addEventListener('submit', function(e) {
        const checkedBooks = document.querySelectorAll('.book-checkbox:checked');
        
        if (checkedBooks.length === 0) {
            e.preventDefault();
            alert('⚠️ Pilih minimal 1 buku untuk dipinjam!');
            return false;
        }
    });

    // Initial count
    updateCount();
});