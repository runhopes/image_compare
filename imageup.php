<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
$dosya_adi_obir = $_FILES["resim"]["name"];
$dosya_tmp_adi_obir = $_FILES["resim"]["tmp_name"];
$dosya_uzantisi_obir = pathinfo($dosya_adi_obir, PATHINFO_EXTENSION);
$tmp = explode('.',"$dosya_adi_obir");
$uzanti = end($tmp);
if($uzanti == "pdf" || $uzanti == "png" || $uzanti == "jpg")
{
    move_uploaded_file($dosya_tmp_adi_obir,"".$dosya_adi_obir);      

    $file = $dosya_adi_obir;
    $img = imagecreatefrompng($file);
    $foto1 = "";
    $foto2 = "";

    list($width, $height) = getimagesize($file);

    $pixels = array();

    for($x = 0; $x < $width; $x++){
        for($y = 0; $y < $height; $y++){

            $rgba     = imagecolorat($img, $x, $y);
            $r = ($rgba >> 16) & 0xFF;
            $g = ($rgba >> 8) & 0xFF;
            $b = $rgba & 0xFF;
            $a     = ($rgba & 0x7F000000) >> 24;

            $foto1.= $r.$g.$b.$a."";
        }
    }



    $file = 'image2.png';
    $img = imagecreatefrompng($file);
    list($width, $height) = getimagesize($file);

    $pixels = array();

    for($x = 0; $x < $width; $x++){
        for($y = 0; $y < $height; $y++){

            $rgba     = imagecolorat($img, $x, $y);
            $r = ($rgba >> 16) & 0xFF;
            $g = ($rgba >> 8) & 0xFF;
            $b = $rgba & 0xFF;
            $a     = ($rgba & 0x7F000000) >> 24;

            $foto2.= $r.$g.$b.$a."";
        }
    }

    $sim = similar_text(substr($foto1, 0, 20000),substr($foto2, 0, 20000), $perc);
    echo "Benzerlik: $sim ($perc %)\n";

}
else
    echo "-1";

?>