<?php

function upload($file, $dir, $ext = array("gif","jpg","png","jpeg","JPG","PNG","GIF","JPEG","PDF","pdf")) {

if($file['name']!=""){
$ex2 = end(explode(".",$file['name']));
if(($file['name']!="") AND (is_file($file['tmp_name'])) AND (in_array($ex2,$ext)) ) {
$upName = md5(uniqid(time())).".".$ex2;
move_uploaded_file($file['tmp_name'],$dir.$upName);
return $upName;
}else{
return false;
}
}

}

function gerarThumbs ($imagem,$x,$Thumbs,$Servidor) {
	
if(isset($_GET["qualidade"])){
$qualidade = $_GET["qualidade"];
}else{
$qualidade = 75;
}

$extensao = explode(".",$imagem);
$extensao = strtoupper(end($extensao));

if(($extensao=="JPG") OR ($extensao=="JPEG") OR ($extensao=="jpg") OR ($extensao=="jpeg")){
$tipo = "JPEG";
}
elseif(($extensao=="GIF") OR ($extensao=="gif")){
$tipo = "GIF";
}
elseif(($extensao=="PNG") OR ($extensao=="png")){
$tipo = "PNG";
}
else{
$tipo = "NULL";
}

$CriarImagemDe= 'ImageCreateFrom'.$tipo;
if($imagem != "") {
	
$img = $CriarImagemDe($Servidor.$imagem);

/*
if($y==""){
$y = "200";
}
*/

if($x==""){
$x = "200";
}

if($qualidade==""){
$qualidade = "75";
}

$largura = ImageSX($img);
$altura = ImageSY($img);

/*
$img_altura = $y;
$img_largura = $largura * $y / $altura;
$x = "$img_largura";
*/

$img_largura = $x;
$img_altura = $altura * $x / $largura;
$y = "$img_altura";

$img_nova = imagecreatetruecolor ($x,$y); 
imagecopyresampled($img_nova, $img, 0, 0, 0, 0, $img_largura, $img_altura, $largura, $altura); 

ImageInterlace($img_nova,1); 
$Image = "Image".$tipo;
$Image($img_nova,$Thumbs.$imagem,"$qualidade"); 
ImageDestroy($img_nova); 
ImageDestroY($img); 


} // end if do $img

}

?>