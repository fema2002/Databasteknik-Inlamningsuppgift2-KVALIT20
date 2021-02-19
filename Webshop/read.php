<p ><h1 class="text-center">MOVIE DEALS</h1></p></div>
<?php
require_once("database.php");
$stmt = $conn->prepare(
  "SELECT  product.product_Name, product.product_Description , product.product_Price ,product.product_ID
  FROM product
 
  
  "
);
$stmt->execute();
$result = $stmt->fetchAll();



$card = "<div class ='row d-flex justify-content-center '>
<div class ='col-md-10 row row-cols-2 row-cols-md-2 row-cols-lg-4 row-cols-sm-1 g-4 d-flex justify-content-center'>
 ";

foreach ($result as $key => $value) {

  $stmt = $conn->prepare(
    "SELECT category.category
    FROM category
    JOIN product_category
    ON category.category_ID = product_category.category_ID
    JOIN product
    ON  product.product_ID = product_category.product_ID
    WHERE product.product_ID = $value[product_ID];
    "
  );
  $stmt->execute();
  $resultCategory = $stmt->fetchAll();
  
  $categories = array();
  
  foreach ($resultCategory as $key => $category) {
    array_push($categories,ucfirst($category['category']));
  }
  

  $stmt = $conn->prepare(
    "SELECT pictures.picture
    FROM pictures
    JOIN product_pictures
    ON pictures.picture_ID = product_pictures.picture_ID
    JOIN product
    ON  product.product_ID = product_pictures.product_ID
    WHERE product.product_ID = $value[product_ID];
    "
  );
  $stmt->execute();
  $resultPictures = $stmt->fetchAll();

  $pictures = array();
  
  foreach ($resultPictures as $key => $picture) {
    array_push($pictures,$picture['picture']);
  }

  $card .= "
    
    <div class ='col'>
        <div class='card' style='width: 20rem;height 18rem;'>
          <img src=images/$pictures[0] class='card-img-top img-thumbnail'  alt=$pictures[0]>
          <div class='card-body'>
           <p class = 'text-center'><button type='button' class='btn btn-danger disabled ml-2'>&dollar;$value[product_Price] </button></p>
           <div class ='text-center'>
           ";
    
            foreach ($categories as $key => $category)
            {
            $card .= "
            <button type='button' class='btn btn-warning disabled ml-2'>$category</button>";
            }
        $card .= "
          </div>
           <h5 class='card-title text-center mt-2'>$value[product_Name]</h5>
           <p class='card-text text-center'>$value[product_Description]</p>
             <div class = 'text-center'>
              <a class='btn btn-warning' href='register.php?movie=$value[product_ID]'>Buy</a>
             </div>
          </div>
        </div>
    </div>
       ";
}

$card .= "
</div> </div>";

echo $card;
