const deleteButtons = document.querySelectorAll('.delete-button');

deleteButtons.forEach(button => {
    button.addEventListener('click', (e) => {
        e.stopPropagation();

    });
});
