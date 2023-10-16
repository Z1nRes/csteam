document.getElementById('map').addEventListener('mousedown', (e) => {
    if (e.which == 3) {
        let perent = document.getElementById('map')

        let elem = document.createElement("img")
        elem.src = "https://www.iconpacks.net/icons/1/free-pin-icon-48-thumb.png"
        elem.alt = "●︎"
        elem.id = 'pin'
        elem.style = `position: absolute; top: ${e.layerY - 25}px; left: ${e.layerX - 10}px; width: 25px; height: 25px)`
        perent.appendChild(elem)
        
    }
})


document.getElementById('map').addEventListener('click', (event) => {
    if (event.target.matches('#pin')) {
        let pin = document.getElementById('pin')
        pin.classList.add('active')
        
        // window.location.href = 'https://youtube.com';
    }            
})

