<?php
abstract class GvdItem{
protected $id;
protected $title;
protected $description;
protected $imgPath;
protected $mainImg;
protected $category;
protected $extra;
public function getId(){
return $this->id;}
public function setId($id){
$this->id = $id; }
public function getTitle(){
return $this->title;}
public function setTitle($title){
$this->title = $title; }
public function getDescription(){
return $this->description;}
public function setDescription($description){
$this->description = $description; }
public function getImgPath(){
return $this->imgPath;}
public function setImgPath($imgPath){
$this->imgPath = $imgPath; }
public function getMainImg(){
return $this->mainImg;}
public function setMainImg($mainImg){
$this->mainImg = $mainImg; }
public function getCategory(){
return $this->category;}
public function setCategory($category){
$this->category = $category; }
public function getExtra(){
return $this->extra;}
public function setExtra($extra){
$this->extra = $extra;}
//CRUD Methods
public static function loadById($id){
        $sql = new Database();
		$results = $sql->select("SELECT * FROM items WHERE id = :ID", array(
			":ID"=>$id
		));
		if (count($results) > 0) {
	        $row = $results[0];
            return $row;
    	}
    }
public static function list($category=''){
		if($category != '')
			$catQuery = "WHERE category='$category'";
		else
			$catQuery = ''; 		
		$sql = new Database();
		$query = "SELECT *FROM items $catQuery ORDER BY id DESC;";		
		return $sql->select($query);
}
public function create(){
    $sql = new Database();    
    $sql->query("INSERT INTO items (title,description,imgPath,mainImg,category,extra) VALUES (:TITLE,:DESCRIPTION,:IMGPATH,:MAINIMG,:CATEGORY,:EXTRA);", array(
			":TITLE"=>$this->getTitle(),
			":DESCRIPTION"=>$this->getDescription(),
			":IMGPATH"=>$this->getImgPath(),
			":MAINIMG"=>$this->getMainImg(),
			":CATEGORY"=>$this->getCategory(),
			":EXTRA"=>$this->getExtra(),
			));	
}
public function edit(){
	$previous = self::loadById($this->getId());

	if($this->getImgPath() == '')
		$imgPath = $previous['imgPath'];
	else
		$imgPath = $this->getImgPath();

	if($this->getMainImg() == '')
		$mainImg = $previous['mainImg'];
	else
		$mainImg = $this->getMainImg();

	$sql = new Database();    
    $sql->query("UPDATE items SET title = :TITLE,description =:DESCRIPTION,imgPath = :IMGPATH,mainImg = :MAINIMG,category = :CATEGORY, extra =:EXTRA 
    	WHERE id = :ID;", array(
    		":TITLE"=>$this->getTitle(),
			":DESCRIPTION"=>$this->getDescription(),
			":IMGPATH"=>$imgPath,
			":MAINIMG"=>$mainImg,
			":CATEGORY"=>$this->getCategory(),
			":EXTRA"=>$this->getExtra(),
			":ID"=>$this->getId()
		));	
}
public static function delete($id){
	$sql =  new Database();
	$sql->query("DELETE FROM items WHERE id = :ID" , array(":ID"=>$id));
}
//Image Loaders
//Get main image
public static function mainImage($id){
        $sql = new Database();
		$results = $sql->select("SELECT * FROM items WHERE id = :ID", array(":ID"=>$id));
		if (count($results) > 0) {
	        $row = $results[0];
            extract($row);
            return $mainImg;
    	}
}
//Get all images
public function allImages(){
	$img = $this->imgPath;	
	$images = explode('|',$img);
	return $images;
} 
public function __construct($title,$description,$imgPath,$mainImg,$category,$extra='', $id=''){
$this->id = $id;
$this->title = $title;
$this->description = $description;
$this->imgPath = $imgPath;
$this->mainImg = $mainImg;
$this->category = $category;
$this->extra = $extra;}
}
?>