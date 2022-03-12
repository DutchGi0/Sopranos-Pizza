function initMap() {
  const uluru = { lat: 52.02757008885185, lng: 4.713787148391643 }

  const map = new google.maps.Map(document.getElementById('map'), {
    zoom: 16,
    center: uluru,
  })

  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  })
}
