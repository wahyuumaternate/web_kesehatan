<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use HierarchicalClustering\Clustering;
use HierarchicalClustering\Distances\EuclideanDistance;
use HierarchicalClustering\Distances\ManhattanDistance;
use Illuminate\Support\Facades\DB;
use HierarchicalClustering\Links\SingleLink;

class DataController extends Controller
{
    public function tes()  {
        // $input = [
        //     [1876, 1967,1755,231,108,52,1773], //k
        //     [853,944,835,97,56,32,872], //s
        //     [465,574,473,52,37,15,542] //p
        // ];
        $data = DB::table('data_uji')->select('k', 's','p')->get();

        $dataArray = [];
        foreach ($data as $item) {
            $dataArray[] = [$item->k, $item->s,$item->p];
        }
        // dd($dataArray);
        $object = new Clustering(
            $dataArray,
            new EuclideanDistance(),
            // new ManhattanDistance(),
            new SingleLink(),
            4
        );

        $clusters = $object->getCluster();
        // dd($clusters);
     
        // Looping untuk mengakses dan mencetak isi array
    // foreach ($clusters as $index => $innerArray) {
    //     echo "Array $index: ";
        
    //     foreach ($innerArray as $value) {
    //         echo "$value ";

    //     }
        
    //     // echo "<br>";
    // }
        return view('tes',compact('clusters'));
        
    }

    public function index() {
        $data = DB::table('data_uji')->select('k', 's','p')->get();
        $data_all = DB::table('data_uji')->get();

        $dataArray = [];
        foreach ($data as $item) {
            $dataArray[] = [$item->k, $item->s,$item->p];
        }
        // dd($dataArray);
        $object = new Clustering(
            $dataArray,
            new EuclideanDistance(),
            // new ManhattanDistance(),
            new SingleLink(),
            4
        );

        $clusters = $object->getCluster();
        // dd($clusters);
     
        // Looping untuk mengakses dan mencetak isi array
    // foreach ($clusters as $index => $innerArray) {
    //     echo "Array $index: ";
        
    //     foreach ($innerArray as $value) {
    //         echo "$value ";

    //     }
        
    //     // echo "<br>";
    // }
        return view('index',compact('clusters','data_all'));
    }
}
