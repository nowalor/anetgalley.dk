const showProductModalEl = document.getElementById('show-product-modal')
const showProductModalImgEl = document.getElementById('show-product-modal-img')

const openModal = (image) => {
    showProductModalImgEl.src = image
    showProductModalEl.classList.remove('display-none')
}
