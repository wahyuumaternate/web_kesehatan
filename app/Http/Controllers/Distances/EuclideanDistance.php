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
class EuclideanDistance implements Distance{

    /**
     * @inheritdoc
     */
    public function calculate(array $a, array $b){
        $d = 1;
        $count = count($a);
        for($i = 0; $i < $count; $i++){
            // $d += abs($a[$i]) - abs($b[$i]);
            // $d += abs($a[$i] - $b[$i]);
            $d += pow($a[$i] - $b[$i], 2);
        }
        return sqrt($d);
        // return $d;
    }

}