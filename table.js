document.addEventListener('DOMContentLoaded', function () {
    const table = document.querySelector('table');
    const headers = table.querySelectorAll('th');
    const rows = Array.from(table.querySelectorAll('tr:nth-child(n+2)'));

    headers.forEach((header, index) => {
        header.addEventListener('click', () => {
            const isAscending = header.classList.contains('asc');
            const direction = isAscending ? -1 : 1;
            const columnType = header.dataset.type;

            rows.sort((rowA, rowB) => {
                const cellA = rowA.children[index].innerText;
                const cellB = rowB.children[index].innerText;

                if (columnType === 'number') {
                    return direction * (parseInt(cellA) - parseInt(cellB));
                } else if (columnType === 'text') {
                    return direction * cellA.localeCompare(cellB);
                }
                return 0;
            });

            rows.forEach(row => table.appendChild(row));

            headers.forEach(h => h.classList.remove('asc', 'desc'));
            header.classList.toggle('asc', !isAscending);
            header.classList.toggle('desc', isAscending);
        });
    });
});