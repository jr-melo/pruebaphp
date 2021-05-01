<?php
 include "dbFunction.php";
 queryInsert();
 
 $records = selectAll("main_anime");
 

function draw($dataset, $roots, $depth = 0){
    foreach($roots as $root){
        echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $depth) . " - " . $root['element_name'] . "<br>";
        $newroots = array_filter($dataset, function($d) use ($root){
            return $d['parent_id'] == $root['id'];
        });
        if(count($newroots)){
            draw($dataset, $newroots, $depth + 1);
        }
    }

}

$roots = array_filter($records, function($d){
    return $d['parent_id'] == 0;
});

draw($records, $roots);

?>