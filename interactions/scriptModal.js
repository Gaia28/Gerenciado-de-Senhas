const openAddSenha = document.querySelector('.add-button');

openAddSenha.addEventListener('click', ()=>{
    const modalId = openAddSenha.getAttribute('data-modal');
    const modal = document.getElementById(modalId);

    modal.showModal();

});

const closeModal = document.querySelector('.close-modal');

closeModal.addEventListener('click', ()=>{
    const modalId = closeModal.getAttribute('data-modal');
    const modal = document.getElementById(modalId);

    modal.close();
});
