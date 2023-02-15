@extends('layouts.app')

@section('content')
    <div id="googleMap" style="width:100%;height:750px;"></div>



    <script>
        function myMap() {
            navigator.geolocation.getCurrentPosition((position) => {
                var locations = {!! json_encode($map) !!};

                let lat = position.coords.latitude;
                let lng = position.coords.longitude;

                var myPosition = new google.maps.LatLng(lat, lng);

                var mapProp = {
                    center: myPosition,
                    zoom: 7,
                    mapTypeId: "terrain"
                };

                var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

                var marker = new google.maps.Marker({
                    position: myPosition,
                    animation: google.maps.Animation.BOUNCE,
                    map: map
                });

                var infowindow = new google.maps.InfoWindow({
                    content: "Posisimu saat ini"
                });

                infowindow.open(map, marker);

                var marker, i;
                var polylinesPath = [];

                for (i = 0; i < locations.length; i++) {
                    let position = new google.maps.LatLng(locations[i].lat, locations[i].lng);
                    marker = new google.maps.Marker({
                        position: position,
                        map: map
                    });

                    var gambars = "";
                    console.log(locations[i].gambars)
                    for (let gambarKey in locations[i].gambars) {
                        gambars += `<a href="{{ url('${locations[i].gambars[gambarKey]}') }}">
                                <img src="{{ url('${locations[i].gambars[gambarKey]}') }}" width="50" height="50">
                            </a>`;
                    }

                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            infowindow.setContent(`
                                ${gambars}
                                <div style='margin-top: 10px'></div>
                                <b>${locations[i].nama}</b><br>
                                Jenis: ${locations[i].no_hp}<br>
                                No Hp: ${locations[i].no_hp}<br>
                                Alamat: ${locations[i].alamat}<br>
                                Jam Buka: ${locations[i].jam_buka}<br>
                                Jam Tutup: ${locations[i].jam_tutup}<br>
                                Lihat di google map: <a style="color: blue;" target='_blank' href='https://www.google.com/maps/dir/?api=1&destination=${locations[i].lat},${locations[i].lng}'>Lihat</a><br>
                                <div style='margin-top: 20px'></div>
                                ${locations[i].deskripsi}<br>
                                <div style='margin-top: 20px'></div>
                                Range Harga: <strong>${locations[i].range_harga}</strong><br>
                            `);

                            infowindow.open(map, marker);
                        }
                    })(marker, i));

                    polylinesPath.push(myPosition);
                    polylinesPath.push(position)
                }

                const flightPath = new google.maps.Polyline({
                    path: polylinesPath,
                    geodesic: true,
                    strokeColor: "#FF0000",
                    strokeOpacity: 1.0,
                    strokeWeight: 2,
                });

                flightPath.setMap(map)
            });
        }
    </script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBAeG8pA4WEOfA6M2fppQUxgHdsHyMBVRQ&callback=myMap"></script>

@endsection