@extends('admin.layouts.main')
@section('head')
    {{-- gis --}}
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/qgis2web.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    <style>
        #map {
            width: 1203px;
            height: 616px;
        }
    </style>
@endsection
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Hasil Pembagian Clusters</h1>
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Dalam Bentuk Text</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample" style="">
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($clusters as $i => $cluster)
                        @foreach ($cluster as $item)
                            @foreach ($data2 as $j => $kecamatan)
                                @if ($item == $kecamatan->index)
                                    <li class="list-group-item"> Cluster {{ $i + 1 }} Kecamatan
                                        {{ $kecamatan->nama_kecamatan }}</li>
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#dalambentukmap" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="true" aria-controls="dalambentukmap">
            <h6 class="m-0 font-weight-bold text-primary">Dalam Bentuk Map</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="dalambentukmap" style="">
            <div class="card-body">
                <div id="map">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{-- gis --}}
    <script src="{{ asset('js/qgis2web_expressions.js') }}"></script>
    <script src="{{ asset('js/leaflet.js') }}"></script>
    <script src="{{ asset('js/leaflet.rotatedMarker.js') }}"></script>
    <script src="{{ asset('js/leaflet.pattern.js') }}"></script>
    <script src="{{ asset('js/leaflet-hash.js') }}"></script>
    <script src="{{ asset('js/Autolinker.min.js') }}"></script>
    <script src="{{ asset('js/rbush.min.js') }}"></script>
    <script src="{{ asset('js/labelgun.min.js') }}"></script>
    <script src="{{ asset('js/labels.js') }}"></script>
    <script src="{{ asset('data/BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0.js') }}"></script>
    {{--  --}}
    <script>
        var map = L.map('map', {
            zoomControl: true,
            maxZoom: 28,
            minZoom: 1
        }).fitBounds([
            [0.6896734044283702, 126.98152968333964],
            [1.0755811569674876, 127.69972343286814]
        ]);
        var hash = new L.Hash(map);
        map.attributionControl.setPrefix(
            '<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>'
        );
        var autolinker = new Autolinker({
            truncate: {
                length: 30,
                location: 'smart'
            }
        });
        var bounds_group = new L.featureGroup([]);

        function setBounds() {}

        function pop_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0(feature, layer) {
            var popupContent =
                '<table>\
                                                                                                                                                                        <tr>\
                                                                                                                                                                            <td colspan="2">' +
                (
                    feature
                    .properties[
                        'DESA'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'DESA']
                        .toLocaleString()) : '') +
                '</td>\                                                                                                                                    <tr>\
                                                                                                                                                                            <th scope="row">PROVINSI</th>\
                                                                                                                                                                            <td>' +
                (
                    feature
                    .properties[
                        'PROVINSI'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'PROVINSI'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                                        </tr>\
                                                                                                                                                                        <tr>\
                                                                                                                                                                            <th scope="row">KAB_KOTA</th>\
                                                                                                                                                                            <td>' +
                (
                    feature
                    .properties[
                        'KAB_KOTA'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'KAB_KOTA'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                                        </tr>\
                                                                                                                                                                        <tr>\
                                                                                                                                                                            <th scope="row">KECAMATAN</th>\
                                                                                                                                                                            <td>' +
                (
                    feature
                    .properties[
                        'KECAMATAN'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'KECAMATAN'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                                        </tr>\
                                                                                                                                                                        <tr>\
                                                                                                                                                                            <td colspan="2">' +
                (
                    feature
                    .properties[
                        'DESA_KELUR'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['DESA_KELUR'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                                        </tr>\
                                                                                                                                                                        <tr>\
                                                                                                                                                                            <td colspan="2">' +

                '</td>\
                                                                                                                                                                        </tr>\
                                                                                                                                                                    </table>';
            layer.bindPopup(popupContent, {
                maxHeight: 400
            });
        }

        function style_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0_0(feature) {
            switch (String(feature.properties['KECAMATAN'])) {

                @foreach ($clusters as $index => $innerArray)

                    // echo "Array $index: ";

                    @foreach ($innerArray as $value)
                        // echo "$value ";
                        case @if ($value == 0)
                            "KOTA TERNATE UTARA"
                        @endif
                        @if ($value == 1)
                            "KOTA TERNATE SELATAN"
                        @endif
                        @if ($value == 2)
                            "PULAU TERNATE"
                        @endif
                        @if ($value == 3)
                            "MOTI"
                        @endif
                        @if ($value == 4)
                            "PULAU HIRI"
                        @endif
                        @if ($value == 5)
                            "PULAU BATANG DUA"
                        @endif
                        @if ($value == 6)
                            "KOTA TERNATE TENGAH"
                        @endif:
                        return {
                            pane: "pane_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0",
                            opacity: 1,
                            color: "rgba(35,35,35,1.0)",
                            dashArray: "",
                            lineCap: "butt",
                            lineJoin: "miter",
                            weight: 1.0,
                            fill: true,
                            fillOpacity: 1,
                            fillColor: @if ($index == 0)
                                "yellow"
                            @endif @if ($index == 1)
                                "green"
                            @endif
                            @if ($index == 2)
                                "blue"
                            @endif
                            @if ($index == 3)
                                "red"
                            @endif ,
                            interactive: true,
                        };
                        break;
                    @endforeach
                @endforeach
            }
        }
        map.createPane('pane_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0');
        map.getPane('pane_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0').style.zIndex = 400;
        map.getPane('pane_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0').style['mix-blend-mode'] = 'normal';
        var layer_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0 = new L.geoJson(
            json_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0, {
                attribution: '',
                interactive: false,
                dataVar: 'json_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0',
                layerName: 'layer_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0',
                pane: 'pane_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0',
                onEachFeature: pop_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0,
                style: style_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0_0,
            });
        bounds_group.addLayer(layer_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0);
        map.addLayer(layer_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0);
        setBounds();
        var i = 0;
        layer_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0.eachLayer(function(layer) {
            var context = {
                feature: layer.feature,
                variables: {}
            };
            layer.bindTooltip((layer.feature.properties['KECAMATAN'] !== null ? String(
                '<div style="color: #323232; font-size: 10pt; font-family: \'Open Sans\', sans-serif;">' +
                layer.feature.properties['KECAMATAN']) + '</div>' : ''), {
                permanent: true,
                offset: [-0, -16],
                className: 'css_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0'
            });
            labels.push(layer);
            totalMarkers += 1;
            layer.added = true;
            addLabel(layer, i);
            i++;
        });
        resetLabels([layer_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0]);
        map.on("zoomend", function() {
            resetLabels([layer_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0]);
        });
        map.on("layeradd", function() {
            resetLabels([layer_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0]);
        });
        map.on("layerremove", function() {
            resetLabels([layer_BATAS_DESA_DESEMBER_2019_DUKCAPIL_MALUKU_UTARA_0]);
        });
    </script>
@endsection
