const eventImageInputEl = document.querySelector('.image-input')
const eventImagePreivew = document.querySelector('.preview-img')

const handleChangeImage = (event) => {
    const file = eventImageInputEl.files[0]

    if(file) {
        eventImagePreivew.src = URL.createObjectURL(file)
    }
}

eventImageInputEl.addEventListener('change', (event) => handleChangeImage(event))

