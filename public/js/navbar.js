const navbarIconEl = document.getElementById('navbar-icon')

const handleShowMobileNavigation = () => {
    navbarIconEl.classList.toggle('navbar__icon-open')
}

navbarIconEl.addEventListener('click', handleShowMobileNavigation)
