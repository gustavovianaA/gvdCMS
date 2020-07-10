<?php
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp'); // valid extensions
$path = '../img/uploads/' . $targetCat . '/'; // upload directory

//create dir if don't exists
if(!is_dir('../img/uploads/'))
mkdir('../img/uploads/', 0755);
if(!is_dir($path))
mkdir($path, 0755);
//main img upload
if($_FILES['mainImg']){
$img = $_FILES['mainImg']['name'];
$tmp = $_FILES['mainImg']['tmp_name'];
// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
// can upload same image using rand function
$final_image = '';
$final_image = rand(1000,1000000).$img;
// check's valid format
if(in_array($ext, $valid_extensions)) { 	
$mainImg = '../img/uploads/' . $category . '/' . strtolower($final_image); 
if(move_uploaded_file($tmp,$mainImg)){
//chown($path,'root');
chmod($mainImg, 0644);
$mainImg = str_replace('../' , '' , $mainImg);
}
}
}// end of main image upload process
if($_FILES['imgpath']){
$nFiles = count($_FILES['imgpath']['name']);
//string for img paths
$imgPath = '';
//upload all the files
for($i = 0 ; $i <= $nFiles -1; $i++){
$img = $_FILES['imgpath']['name'][$i];
$img = str_replace('|','',$img);
$tmp = $_FILES['imgpath']['tmp_name'][$i];
// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
// can upload same image using rand function
$final_image = '';
$final_image = rand(1000,1000000).$img;
// check's valid format
if(in_array($ext, $valid_extensions)) { 	
$path = '../img/uploads/' . $category . '/' . strtolower($final_image); 
if(move_uploaded_file($tmp,$path)){
//chown($path,'root');
chmod($path, 0644);
$imgPath .= str_replace('../' , '' , $path);

if($i  < $nFiles - 1)
$imgPath .= '|';	

} 
else{
echo 'invalid';
}
}// end ext verification 
}// end of img upload loop
}// end of file verification
?>