<?php

$datas = [
    'firstname' => 'Meledje',
    'lastname' => 'Gnagne Christian Armel',
    'HNGID' => 'HNG-05233',
    'language' => 'PHP & JavaScript',
];

$datas = (object) $datas;


function load (object $output , bool $tags = true)
{ 
    $js_code = 'console.log (' . json_encode ( $output , JSON_HEX_TAG ) . ');
                let datas = ' . json_encode ( $output , JSON_HEX_TAG ). ';
                let p = document.createElement("p");
                p.innerText = "Hello World, this is " + datas.firstname + " " + datas.lastname + " with HNGi7-ID " + datas.HNGID + " using " + datas.language + " for stage 2 task";
                window.addEventListener("DOMContentLoaded", (event) => {
                    document.querySelector("body").appendChild(p);
                });';

    if ( $tags ) 
    { 
        $js_code = '<script>' . $js_code . '</script>';
    }     
    echo $js_code ; 
}  

if (json_last_error() === JSON_ERROR_NONE) {
    
    load($datas);

} else {
    ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Team Strong</title>
        </head>
        <body>
            <p>Hello World, this is <?= $datas->firstname ?> <?= $datas->lastname ?> with HNGi7 ID <?= $datas->HNGID ?> using <?= $datas->language ?> for stage 2 task</p>
        </body>
        </html>

    <?php
}


?>  
