const navbarIconEl = document.getElementById('navbar-icon')
// const mobileNavigationEl = document.getElementById('mobile-navigation')
const navbarContentEl = document.getElementById('navbar-content')
const navbarEl = document.getElementById('navbar')

const handleShowMobileNavigation = () => {
    navbarIconEl.classList.toggle('navbar__icon-open')
    // mobileNavigationEl.classList.toggle('navbar-open')
    navbarContentEl.classList.toggle('hidden-sm')
    navbarEl.classList.toggle('height-100vh')
}

navbarIconEl.addEventListener('click', handleShowMobileNavigation)
