const deleteButtons = document.querySelectorAll('.delete-button');

deleteButtons.forEach(button => {
    button.addEventListener('click', (e) => {
        alert('Senha deletada com sucesso!');
        e.stopPropagation();

    });
});
