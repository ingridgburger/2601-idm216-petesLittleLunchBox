document.addEventListener('DOMContentLoaded', () => {

  const rowsPerPage = 5;
  const tables = document.querySelectorAll('main table');

  function createPagination(table, pageCount, onPageChange, currentPage) {
    let pagination = table.nextElementSibling;
    if (!pagination || !pagination.classList.contains('pagination')) {
      pagination = document.createElement('div');
      pagination.className = 'pagination';
      table.parentNode.appendChild(pagination);
    }
    pagination.innerHTML = '';
    for (let i = 1; i <= pageCount; i++) {
      const pagelink = document.createElement('a');
      pagelink.href = '#';
      pagelink.textContent = i;

      if (i === currentPage) {
        pagelink.style.fontWeight = 'bold';
        pagelink.style.backgroundColor = 'var(--highlight-2)';
        pagelink.style.color = 'var(--white)';
      }

      pagelink.addEventListener('click', function(e) {
        e.preventDefault();
        onPageChange(i);
      });
      pagination.appendChild(pagelink);
      if (i < pageCount) pagination.appendChild(document.createTextNode(' '));
    }
  }

  tables.forEach(table => {
    const tbody = table.querySelector('tbody');
    if (!tbody) return;
    const dataRows = Array.from(tbody.rows);
    if (dataRows.length <= 1) return;
    let currentPage = 1;
    const pageCount = Math.ceil(dataRows.length / rowsPerPage);

    function showTablePage(page) {
      currentPage = page;
      dataRows.forEach(row => row.style.display = 'none');
      const start = (page - 1) * rowsPerPage;
      const end = start + rowsPerPage;
      dataRows.slice(start, end).forEach(row => row.style.display = '');
      createPagination(table, pageCount, showTablePage, currentPage);
    }

    showTablePage(1);
  });
});
