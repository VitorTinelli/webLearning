let time = 4000,
    currentImageIndex = 0,
    images = document.querySelectorAll("#slide img")
    max = images.length,
    currentImageIndexMatri = 0,
    imagesMatri = document.querySelectorAll("#sliderMatri img")
    maxMatri = imagesMatri.length;

function nextImage() {
    images[currentImageIndex]
        .classList.remove("selected")
    currentImageIndex++
    if(currentImageIndex >= max)
        currentImageIndex = 0
    images[currentImageIndex]
        .classList.add("selected")
}

function start() {
    setInterval(() => {
        nextImage()
    }, time)
    
}

window.addEventListener("load", start)