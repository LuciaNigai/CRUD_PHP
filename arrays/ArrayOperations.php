<?php
class ArrayOperations{

    public static function insertinSort(array $array2) : array {
        for($i=0; $i<count($array2); $i++){
            $min = $i;
            for($j=$i+1; $j<count($array2);$j++){
                if($array2[$j]<$array2[$i]){
                    $min=$j;
                }
            }
            if($min!=$i){
                $temp=$array2[$i];
                $array2[$i]=$array2[$min];
                $array2[$min]=$temp;
            }
        }
        return $array2;
    }

    public static function quickSort(array $array1) : array {
        for($i=0; $i<count($array1); $i++){
            for($j=$i+1; $j<count($array1); $j++){
                if($array1[$i]>$array1[$j]){
                    $temp=$array1[$j];
                    $array1[$j]=$array1[$i];
                    $array1[$i]=$temp;
                }
            }
        }
        return $array1;
    }

    public static function printArray($array){
        echo "<br>";
        echo "[ ";
        $i=null;
        for($i=0; $i<count($array)-1; $i++){
            echo "$array[$i], ";
        }
        echo "$array[$i] ";
        echo "]";
    }

}
// ?>
