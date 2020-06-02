const showMenu = document.getElementById('show-menu')
const mobileMenu = document.getElementById('mobile-menu')
const closeMenu = document.getElementById('close-menu')

showMenu.addEventListener('click', () => {
    if(!mobileMenu.classList.contains('show-mobile-menu')) {
        mobileMenu.classList.add('show-mobile-menu')
    }
})

closeMenu.addEventListener('click', () => {
    if(mobileMenu.classList.contains('show-mobile-menu')) {
        mobileMenu.classList.remove('show-mobile-menu')
    }
})
