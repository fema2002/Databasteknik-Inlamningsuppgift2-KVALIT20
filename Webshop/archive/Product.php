<?php

class Product{

    private $id;
    private $name;
    private $price;
    private $description;
    private $category ;
    private $image;

    public function __construct($name,$id,$description,$price,$image,$category)
    {
        $this->name = self::getName($name); 
        $this->id = self::getId($id);
        $this->description = self::getDescription($description);
        $this->price = self::getPrice($price);
        $this->image = self::getImage($image);
        $this->category = self::getCategory($category);
    }

   public static function getName($name){
     return $name;
   } 
    public static function getPrice($price){
     return $price;
   } 
   public static function getDescription($description){
     return $description;
   } 
   public static function getId($id){
     return $id;
   } 
   public static function getImage($image){
     return $image;
   }  
   public static function getCategory($category){
     return $category;
   } 
    public function toArray(){
        
        $array = array( 
            "id"            => $this->id,
            "name"          => $this->name,
            "category"      => $this->category,
            "image"         => $this->image,
            "description"   => $this->description,
            "price"         => $this->price
        );
        return $array;
    }

}

?>