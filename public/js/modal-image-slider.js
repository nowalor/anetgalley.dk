const showProductModalEl = document.getElementById('show-product-modal')
const showProductModalImgEl = document.getElementById('show-product-modal-img')
const selectedProductImageEl = document.getElementById('selected-product-image')

const openModal = (image) => {
    selectedProductImageEl.src = image
    // showProductModalEl.classList.remove('display-none')
}
