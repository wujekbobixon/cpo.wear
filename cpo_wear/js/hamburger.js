const menu = document.querySelector('header .header-div nav ul');
const ol = document.querySelector('header .header-div nav ul ol');
const closeMenu = document.querySelector('.closeMenu');
const openMenu = document.querySelector('.fa-align-justify');




openMenu.addEventListener('click',show);
closeMenu.addEventListener('click',close);


function show(){
    menu.style.display = 'flex';
    ol.style.top = '0';
}
function close(){
    ol.style.top = '-120%';
    menu.style.display = 'none';
}