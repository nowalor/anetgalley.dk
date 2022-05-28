const descriptionLinkEl = document.getElementById('description-link')
const additionalInformationLinkEl = document.getElementById('additional-information-link')

const handleLinkClick = (link) => {
    console.log('link', link)
}

descriptionLinkEl.addEventListener('click', () => handleLinkClick('description'))
additionalInformationLinkEl.addEventListener('click', () => handleLinkClick('additional-information'))
