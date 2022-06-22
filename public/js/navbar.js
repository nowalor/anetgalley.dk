const navbarIconEl = document.getElementById('navbar-icon')
const mobileNavigationEl = document.getElementById('mobile-navigation')

const handleShowMobileNavigation = () => {
    navbarIconEl.classList.toggle('navbar__icon-open')
    mobileNavigationEl.classList.toggle('navbar-open')
}

navbarIconEl.addEventListener('click', handleShowMobileNavigation)
