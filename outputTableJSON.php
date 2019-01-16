<?php
/**
 * Created by PhpStorm.
 * User: goran
 * Date: 15.01.2019
 * Time: 18:19
 * @param $table
 */


function output($table=[]){
    $iter=0;
    foreach ($table as $el) {
        $iter++;

    }

    echo '{
            "data": [';
    foreach ($table as $el) {

        echo json_encode($el);
        if($iter>1)echo ',';
        $iter--;

    }
    echo ']
        }';
}