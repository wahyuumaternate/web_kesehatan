<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SISTEM INFORMASI GOEGRAFIS PENGELOMPOKAN TINGKAT KESEHATAN LINGKUNGAN</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

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

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body>


    @yield('body')



    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <p>SISTEM INFORMASI GOEGRAFIS PENGELOMPOKAN TINGKAT KESEHATAN LINGKUNGAN</p>
            {{-- <div class="social-links">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div> --}}
            <div class="copyright">
                &copy; Copyright <strong><span>Universitas Khairun</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/typed.js/typed.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

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

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
