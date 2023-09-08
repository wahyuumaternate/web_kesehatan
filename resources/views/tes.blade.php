<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/qgis2web.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/leaflet-control-geocoder.Geocoder.css') }}" /> --}}
    <style>
        #map {
            width: 1703px;
            height: 916px;
        }
    </style>
    <title>Des</title>
</head>

<body>
    <div>
        <ul>
            <li>
                <span style="width:20px;height:20px;background-color: yellow;"></span>
                <h1>Cluster 1 Kuning</h1>
            </li>
            <li>
                <h1>Cluster 2 Hijau</h1>
            </li>
            <li>
                <h1>Cluster 3 Biru</h1>
            </li>
            <li>
                <h1>Cluster 4 Merah</h1>
            </li>
        </ul>
        @foreach ($clusters as $i => $cluster)
            @foreach ($cluster as $item)
                @foreach ($data2 as $j => $kecamatan)
                    @if ($item == $kecamatan->id_cluster)
                        @if ($i == 0 && $kecamatan->nama_kecamatan)
                            <h1 data-cluster="{{ $i }}" class="data">
                                Cluster {{ $i + 1 }} Kecamatan {{ $kecamatan->nama_kecamatan }}
                            </h1>
                        @endif
                        @if ($i == 1 && $kecamatan->nama_kecamatan)
                            <h1>
                                Cluster {{ $i + 1 }} Kecamatan {{ $kecamatan->nama_kecamatan }}
                            </h1>
                        @endif
                        @if ($i == 2 && $kecamatan->nama_kecamatan)
                            <h1>
                                Cluster {{ $i + 1 }} Kecamatan {{ $kecamatan->nama_kecamatan }}
                            </h1>
                        @endif
                        @if ($i == 3 && $kecamatan->nama_kecamatan)
                            <h1>
                                Cluster {{ $i + 1 }} Kecamatan {{ $kecamatan->nama_kecamatan }}
                            </h1>
                        @endif
                    @endif
                @endforeach
            @endforeach
        @endforeach
    </div>
    <div id="map">
    </div>
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
                        'OBJECT_ID'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['OBJECT_ID'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'KODE_DESA'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['KODE_DESA'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <th scope="row">DESA</th>\
                                                                                                                                                        <td>' +
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
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'KODE'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'KODE'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
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
                (
                    feature
                    .properties[
                        'JUMLAH_PEN'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['JUMLAH_PEN'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'JUMLAH_KK'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['JUMLAH_KK'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'LUAS_WILAY'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['LUAS_WILAY'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'KEPADATAN'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['KEPADATAN'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PERPINDAHA'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PERPINDAHA'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'JUMLAH_MEN'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['JUMLAH_MEN'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PERUBAHAN'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PERUBAHAN'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'WAJIB_KTP'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['WAJIB_KTP'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'SILAM'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'SILAM'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'KRISTEN'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['KRISTEN'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'KHATOLIK'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['KHATOLIK'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'HINDU'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'HINDU'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'BUDHA'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'BUDHA'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'KONGHUCU'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['KONGHUCU'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'KEPERCAYAA'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['KEPERCAYAA'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PRIA'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'PRIA'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'WANITA'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['WANITA'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'BELUM_KAWI'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['BELUM_KAWI'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'KAWIN'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'KAWIN'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'CERAI_HIDU'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['CERAI_HIDU'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'CERAI_MATI'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['CERAI_MATI'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'U0'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'U0'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'U5'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'U5'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'U10'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'U10'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'U15'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'U15'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'U20'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'U20'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'U25'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'U25'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'U30'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'U30'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'U35'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'U35'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'U40'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'U40'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'U45'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'U45'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'U50'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'U50'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'U55'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'U55'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'U60'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'U60'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'U65'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'U65'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'U70'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'U70'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'U75'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'U75'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'TIDAK_BELU'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['TIDAK_BELU'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'BELUM_TAMA'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['BELUM_TAMA'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'TAMAT_SD'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['TAMAT_SD'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'SLTP'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'SLTP'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'SLTA'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'SLTA'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'DIPLOMA_I'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['DIPLOMA_I'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'DIPLOMA_II'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['DIPLOMA_II'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'DIPLOMA_IV'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['DIPLOMA_IV'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'STRATA_II'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['STRATA_II'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'STRATA_III'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['STRATA_III'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'BELUM_TIDA'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['BELUM_TIDA'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'APARATUR_P'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['APARATUR_P'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'TENAGA_PEN'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['TENAGA_PEN'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'WIRASWASTA'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['WIRASWASTA'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PERTANIAN'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PERTANIAN'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'NELAYAN'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['NELAYAN'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'AGAMA_DAN'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['AGAMA_DAN'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PELAJAR_MA'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PELAJAR_MA'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'TENAGA_KES'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['TENAGA_KES'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PENSIUNAN'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PENSIUNAN'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'LAINNYA'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['LAINNYA'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'GENERATED'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['GENERATED'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'KODE_DES_1'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['KODE_DES_1'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'BELUM_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['BELUM_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'MENGUR_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['MENGUR_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PELAJAR_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PELAJAR_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PENSIUNA_1'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PENSIUNA_1'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PEGAWAI_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PEGAWAI_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'TENTARA'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['TENTARA'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'KEPOLISIAN'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['KEPOLISIAN'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PERDAG_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PERDAG_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PETANI'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PETANI'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PETERN_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PETERN_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'NELAYAN_1'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['NELAYAN_1'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'INDUSTR_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['INDUSTR_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'KONSTR_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['KONSTR_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'TRANSP_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['TRANSP_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'KARYAW_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['KARYAW_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'KARYAW1'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['KARYAW1'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'KARYAW1_1'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['KARYAW1_1'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'KARYAW1_12'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['KARYAW1_12'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'BURUH'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'BURUH'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'BURUH_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['BURUH_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'BURUH1'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['BURUH1'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'BURUH1_1'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['BURUH1_1'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PEMBANT_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PEMBANT_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'TUKANG'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['TUKANG'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'TUKANG_1'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['TUKANG_1'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'TUKANG_12'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['TUKANG_12'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'TUKANG__13'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['TUKANG__13'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'TUKANG__14'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['TUKANG__14'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'TUKANG__15'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['TUKANG__15'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'TUKANG__16'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['TUKANG__16'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'TUKANG__17'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['TUKANG__17'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PENATA'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PENATA'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PENATA_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PENATA_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PENATA1_1'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PENATA1_1'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'MEKANIK'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['MEKANIK'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'SENIMAN_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['SENIMAN_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'TABIB'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'TABIB'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PARAJI_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PARAJI_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PERANCA_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PERANCA_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PENTER_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PENTER_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'IMAM_M'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['IMAM_M'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PENDETA'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PENDETA'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PASTOR'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PASTOR'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'WARTAWAN'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['WARTAWAN'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'USTADZ'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['USTADZ'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'JURU_M'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['JURU_M'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PROMOT'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PROMOT'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'ANGGOTA_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['ANGGOTA_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'ANGGOTA1'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['ANGGOTA1'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'ANGGOTA1_1'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['ANGGOTA1_1'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PRESIDEN'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PRESIDEN'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'WAKIL_PRES'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['WAKIL_PRES'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'ANGGOTA1_2'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['ANGGOTA1_2'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'ANGGOTA1_3'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['ANGGOTA1_3'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'DUTA_B'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['DUTA_B'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'GUBERNUR'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['GUBERNUR'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'WAKIL_GUBE'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['WAKIL_GUBE'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'BUPATI'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['BUPATI'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'WAKIL_BUPA'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['WAKIL_BUPA'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'WALIKOTA'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['WALIKOTA'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'WAKIL_WALI'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['WAKIL_WALI'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'ANGGOTA1_4'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['ANGGOTA1_4'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'ANGGOTA1_5'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['ANGGOTA1_5'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'DOSEN'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'DOSEN'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'GURU'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'GURU'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PILOT'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'PILOT'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PENGACARA_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PENGACARA_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'NOTARIS'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['NOTARIS'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'ARSITEK'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['ARSITEK'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'AKUNTA_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['AKUNTA_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'KONSUL_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['KONSUL_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'DOKTER'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['DOKTER'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'BIDAN'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'BIDAN'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PERAWAT'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PERAWAT'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'APOTEK_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['APOTEK_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PSIKIATER'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PSIKIATER'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PENYIA_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PENYIA_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PENYIA1'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PENYIA1'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PELAUT'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PELAUT'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PENELITI'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PENELITI'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'SOPIR'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties[
                            'SOPIR'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PIALAN'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PIALAN'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PARANORMAL'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PARANORMAL'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PEDAGA_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PEDAGA_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'PERANG_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['PERANG_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'KEPALA_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['KEPALA_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'BIARAW_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['BIARAW_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'WIRASWAST_'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['WIRASWAST_'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'LAINNYA_12'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['LAINNYA_12'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'LUAS_DESA'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['LUAS_DESA'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'KODE_DES_3'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['KODE_DES_3'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'DESA_KEL_1'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['DESA_KEL_1'].toLocaleString()) : '') +
                '</td>\
                                                                                                                                                    </tr>\
                                                                                                                                                    <tr>\
                                                                                                                                                        <td colspan="2">' +
                (
                    feature
                    .properties[
                        'KODE_12'] !==
                    null ?
                    autolinker
                    .link(
                        feature
                        .properties['KODE_12'].toLocaleString()) : '') +
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
</body>

</html>
