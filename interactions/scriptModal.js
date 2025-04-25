const openAddSenha = document.querySelector('.add-button');

openAddSenha.addEventListener('click', ()=>{
    const modalId = openAddSenha.getAttribute('data-modal');
    const modal = document.getElementById(modalId);

    modal.showModal();

});

const closeModal = document.querySelectorAll('.close-modal');

closeModal.forEach(btn =>{
    btn.addEventListener('click', ()=>{
        const modalId = btn.getAttribute('data-modal');
        const modal = document.getElementById(modalId);
    
        modal.close();
    });
});


const opneItemSenha = document.querySelectorAll('.password-item');
opneItemSenha.forEach(item => {
    item.addEventListener('click', () => {
        const modalId = item.getAttribute('data-modal');
        const modal = document.getElementById(modalId);

        modal.showModal();
    });
});