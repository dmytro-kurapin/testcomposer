<?php

$row = 0;
$temp_array=array();
$array_of_all_data=array();
if (($handle = fopen("assets/test_comp.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $num = count($data);
        for ($c=0; $c < $num; $c++) {
            $temp_array[$row][]=$data[$c];
        }
        $row++;
    }
    fclose($handle);
}
$temp=0;
$d=0;
foreach ($temp_array as $val){
    if($temp==0){
        $temp++;
    } else {
        $array_of_all_data[$d] = array_combine($temp_array[0], $val);
        $d++;
    }
}
echo json_encode($array_of_all_data,JSON_UNESCAPED_UNICODE );