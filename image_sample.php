<?php

$draw = new \ImagickDraw();

    $draw->setStrokeColor("red");
    $draw->setFillColor("white");
    $draw->setFillOpacity(1);
    $draw->setStrokeWidth(2);
    $draw->setFontSize(72);
    $draw->setStrokeOpacity(1);
    $draw->setStrokeColor("red");
    $draw->setStrokeWidth(2);
    // $draw->setFont("../fonts/CANDY.TTF");
    $draw->setFontSize(140);
    $draw->rectangle(0, 0, 1000, 300);
    $draw->setFillColor('red');
    $draw->setfillopacity(1);
    $draw->annotation(50, 180, "Lorem\nIpsum!");

    //Create an image object which the draw commands can be rendered into
    $imagick = new \Imagick();
    $imagick->newImage(1000, 302, "white");
    $imagick->setImageFormat("png");

    //Render the draw commands in the ImagickDraw object
    //into the image.
    $imagick->drawImage($draw);

    //Send the image to the browser
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
