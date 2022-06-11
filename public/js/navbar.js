const navbarIconEl = document.getElementById('navbar-icon')
const mobileNavigationEl = document.getElementById('mobile-navigation')

const handleShowMobileNavigation = () => {
    navbarIconEl.classList.toggle('navbar__icon-open')
    mobileNavigationEl.classList.toggle('display-none')
}

navbarIconEl.addEventListener('click', handleShowMobileNavigation)
