const descriptionEl = document.getElementById('single-product-description')
const informationEl = document.getElementById('single-product-information')

const descriptionLinkEl = document.getElementById('description-link')
const additionalInformationLinkEl = document.getElementById('additional-information-link')

let currentLink = 'description-link'


const handleLinkClick = (link) => {
    if (link === currentLink) {
        return
    }

    if (link === 'description') {
        currentLink = 'description-link'
        descriptionLinkEl.classList.add('active')
        additionalInformationLinkEl.classList.remove('active')
    } else {
        currentLink = 'additional-information-link'
        descriptionLinkEl.classList.remove('active')
        additionalInformationLinkEl.classList.add('active')
    }
}

descriptionLinkEl.addEventListener('click', () => handleLinkClick('description'))
additionalInformationLinkEl.addEventListener('click', () => handleLinkClick('additional-information'))
