const toggleMenu = document.querySelector('.toggle');
const navMenu = document.querySelector('.navigation');

toggleMenu.onclick = function() {
    toggleMenu.classList.toggle('active');
    navMenu.classList.toggle('active');
}