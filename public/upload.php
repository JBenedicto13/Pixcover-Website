<?php
function compress_image($source_url, $destination_url, $quality) {
    $info = getimagesize($source_url);
     
    if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
    elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
    elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
    elseif ($info['mime'] == 'image/jpg') $image = imagecreatefromjpeg($source_url);
     
    //save it
    imagejpeg($image, $destination_url, $quality);
         
    //return destination file url
    return $destination_url;    
}

$imname =$_FILES["image"]["tmp_name"];         
$source_photo =$imname;
$namecreate= "codeconia_".time();
$namecreatenumber= rand(1000 , 10000);
$picname= $namecreate.$namecreatenumber;
$finalname= $picname.".jpeg";
$dest_photo = 'uploads/'.$finalname;
$dest_photo2 = 'folderUp/'.$finalname;

if( !copy($source_photo, $dest_photo) ) { 
    echo '<script>alert("File can.'."'".'t be copied!")</script>';
} 
else {
    $compressimage = compress_image($source_photo, $dest_photo2, 60);
    echo '<script>alert("File has been copied!")</script>';
}



?>