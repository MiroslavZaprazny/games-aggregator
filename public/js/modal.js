const openButton = document.getElementById('open');
const modal = document.getElementById('modal');
const closeButton = document.getElementById('close');

openButton.addEventListener('click', () => {
    modal.classList.remove("hidden")
});

closeButton.addEventListener('click', () => {
    modal.classList.add('hidden');
});
