@extends('admin.template')

@section('title', 'Peta Desa ' . $desa->nama)

@section('libs')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.11.0/css/ol.css" type="text/css">
<style>
    .map {
        height: 400px;
        width: 100%;
    }
</style>
<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.11.0/build/ol.js"></script>
@endsection

@section('content')
<h1 class="text-center mb-4">Peta {{ $desa->nama }}</h1><hr>
<button type="button" class="btn btn-primary mb-4" data-toggle-display="#ubah-lokasi" onclick="ubah(this)"><i class="fas fa-edit fa-fw"></i> Edit lokasi</button>
<div id="ubah-lokasi" class="d-none position-relative">
    <div>
        <input type="checkbox" id="lokasi-otomatis" data-toggle-display="#lokasi-manual"> <label for="lokasi-otomatis">Gunakan Lokasi saat ini</label>
    </div>
    <form action="/admin/peta/ubah?desa={{ $desa->id }}" method="post" id="lokasi-manual" style="max-width: 20rem; background-color: #dddddd" class="p-3 mt-3 mb-4">
        @csrf
        <div>
            <label class="form-label" for="lokasi">Cari Lokasi</label>
            <div class="d-flex justify-content-evenly">
                <input class="form-control" type="text" id="lokasi" autocomplete="off">
                <button type="button" class="btn btn-primary ms-2" onclick="geocode('lokasi')">Cari</button>
            </div>
            <div class="hasil-lokasi p-2 bg-white d-none">
            </div>
            <div class="mt-4">
                <label class="form-label" for="lokasi-longitude">Masukan longitude Lokasi</label>
                <input class="form-control" type="number" id="lokasi-longitude" name="lokasi-longitude" step="any" value={{ $desa->lokasi ? explode(",", $desa->lokasi)[0] : 0  }}>
            </div>
            <div>
                <label class="form-label" for="lokasi-latitude">Masukan latitude Lokasi</label>
                <input class="form-control" type="number" id="lokasi-latitude" name="lokasi-latitude" step="any" value={{ $desa->lokasi ? explode(",", $desa->lokasi)[1] : 0 }}>
            </div>
        </div>
        <button class="btn btn-primary mt-4" type="submit">Simpan</button>
        <button class="btn btn-secondary mt-4" type="button" onclick="showLocation()">Lihat</button>
    </form>
</div>
<div id="map" class="map"></div>

<script type="text/javascript">
    const lokasiLongitude = document.getElementById('lokasi-longitude');
    const lokasiLatitude = document.getElementById('lokasi-latitude');


    const map = new ol.Map({
        target: 'map',
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
            })
        ],
        view: new ol.View({
            center: ol.proj.fromLonLat([<?= $desa->lokasi ?>]),
            zoom: 13
        })
    });

    const marker = new ol.Feature({
        geometry: new ol.geom.Point(
            ol.proj.fromLonLat([<?= $desa->lokasi ?>])
        ),
    });
    const vectorSource = new ol.source.Vector({
        features: [marker]
    });
    const markerVectorLayer = new ol.layer.Vector({
        source: vectorSource,
    });
    map.addLayer(markerVectorLayer);

    function ubah(element) {
        const target = document.querySelector(element.getAttribute('data-toggle-display'));
        target.classList.toggle("d-none");
        if (!target.classList.contains('d-none') && document.getElementById('lokasi-otomatis').checked) {
            showLocation();
        }
    }

    document.getElementById('lokasi-otomatis').onclick = function() {
        if (this.checked) {
            showLocation();
        }
    }

    function showLocation(auto = true) {
        if (auto) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const coords = position.coords;

                lokasiLongitude.value = coords.longitude;
                lokasiLatitude.value = coords.latitude;

                map.getView().setCenter(ol.proj.fromLonLat([coords.longitude, coords.latitude]));
                marker.setGeometry(new ol.geom.Point(
                    ol.proj.fromLonLat([coords.longitude, coords.latitude])
                ));
            });
        } else {
            map.getView().setCenter(ol.proj.fromLonLat([lokasiLongitude.value, lokasiLatitude.value]));
            marker.setGeometry(new ol.geom.Point(
                ol.proj.fromLonLat([lokasiLongitude.value, lokasiLatitude.value])
            ));
        }

        map.getView().setZoom(13);
    }

    function geocode(qID) {
        const input = document.getElementById(qID);
        fetch("https://api.geoapify.com/v1/geocode/search?text=" + input.value + "&lang=id&apiKey=7d3ff92ab18846549d78cf9fa670a049")
            .then(response => response.json())
            .then(result => showResults(result.features))
            .catch(err => console.log('err', err));
    }

    const results = document.querySelector('.hasil-lokasi');
    function showResults(features) {
        results.classList.remove('d-none');
        results.innerHTML = '';
        features.forEach(function(feature) {
            const resultElem = document.createElement('div');
            const addressDiv = document.createElement('div');
            const coordsDiv = document.createElement('div');

            resultElem.classList.add('hasil');
            addressDiv.classList.add('fw-bold');
            coordsDiv.classList.add('text-secondary');

            resultElem.onclick = function() {
                lokasiLongitude.value = feature.properties.lon;
                lokasiLatitude.value = feature.properties.lat;

                showLocation(false);
                results.classList.add('d-none');
            };

            addressDiv.textContent = feature.properties.formatted;
            coordsDiv.textContent = feature.properties.lon + ',' + feature.properties.lat;

            results.appendChild(resultElem);
            resultElem.appendChild(addressDiv);
            resultElem.appendChild(coordsDiv);
        });
    }
</script>
@endsection