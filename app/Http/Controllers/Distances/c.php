<?php
namespace HierarchicalClustering\Distances;

/**
 * Class EuclideanDistance
 * @package HierarchicalClustering\Distances
 * Getting distance between points by Euclid algorithm
 *
 * @author Gasanenko Denis <fondifonds@gmail.com>
 * @version 0.1
 */
class c implements Distance{

    /**
     * @inheritdoc
     */
    public function calculate(array $a, array $b){
        $d = 0;
        $count = count($a);
        for($i = 0; $i < $count; $i++){
            $d += pow($a[$i] - $b[$i], 0);
        }
        return sqrt($d);
    }

}
// @foreach ($clusters as $index => $innerArray)

// // echo "Array $index: ";

// @foreach ($innerArray as $value)
//     // echo "$value ";
//     case @if ($value == 0)
//         "TERNATE UTARA"
//     @endif
//     @if ($value == 1)
//         "TERNATE SELATAN"
//     @endif
//     @if ($value == 2)
//         "PULAU TERNATE"
//     @endif
//     @if ($value == 3)
//         "MOTI"
//     @endif
//     @if ($value == 4)
//         "HIRI"
//     @endif
//     @if ($value == 5)
//         "BATANG DUA"
//     @endif
//     @if ($value == 6)
//         "TERNATE TENGAH"
//     @endif:
//     return {
//         pane: "pane_ADMINISTRASIKECAMATAN_AR_50K_0",
//         opacity: 1,
//         color: "rgba(35,35,35,1.0)",
//         dashArray: "",
//         lineCap: "butt",
//         lineJoin: "miter",
//         weight: 1.0,
//         fill: true,
//         fillOpacity: 1,
//         fillColor: @if ($index == 0)
//             "purple"
//         @endif @if ($index == 1)
//             "red"
//         @endif
//         @if ($index == 2)
//             "green"
//         @endif
//         @if ($index == 3)
//             "yellow"
//         @endif ,
//         interactive: true,
//     };
//     break;
// @endforeach
// @endforeach



// hh
// @foreach ($clusters as $i => $cluster)
// @foreach ($cluster as $item)
//     {{-- {{ $item }} --}}
//     {{-- <h1>
//         Cluster {{ $i + 1 }} D{{ $item + 1 }}
//     </h1> --}}
//     @foreach ($data2 as $j => $kecamatan)
//         @if ($item == $kecamatan->id_cluster)
//             <h1>
//                 Cluster {{ $i + 1 }} Kecamatan {{ $kecamatan->nama_kecamatan }}
//             </h1>
//         @endif
//     @endforeach
// @endforeach
// @endforeach