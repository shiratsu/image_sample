<?php

//* オブジェクトを作成します */
$image = new Imagick();
$draw = new ImagickDraw();
$pixel = new ImagickPixel( 'white' );
$red = new ImagickPixel( 'red' );

/* 画像を作成します */
$image->newImage(800, 100, $pixel);

/* 黒いテキスト */
$draw->setFillColor('white');

$draw->setStrokeOpacity(1);
$draw->setStrokeColor($red);
$draw->setFillColor($pixel);

/* フォントのプロパティ */
$draw->setFont('Bookman-DemiItalic');
$draw->setFontSize( 20 );

$draw->circle(58, 58, 98, 98);

/* テキストの作成 */
$image->annotateImage($draw, 10, 45, 0, 'The quick brown fox jumps over the lazy dog');

/* 画像形式の設定 */
$image->setImageFormat('png');
$image->drawImage($draw);

/* ヘッダをつけて画像の出力 */
header('Content-type: image/png');
echo $image;
