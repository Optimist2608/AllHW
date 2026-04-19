const allColums = document.querySelectorAll('td');

allColums.forEach((column, index) => {
    if (index % 2 === 0) {
        column.style.backgroundColor = 'tan';
    } else {
        column.style.backgroundColor = 'greenyellow';
    }
});
// Как вариант