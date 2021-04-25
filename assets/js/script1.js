const menuToggle = document.querySelector('.menu-toggle input');
const nav = document.querySelector('.menu ul');


// @ts-ignore
menuToggle.addEventListener('click', function ()
{
    // @ts-ignore
    nav.classList.toggle('slide');
});
