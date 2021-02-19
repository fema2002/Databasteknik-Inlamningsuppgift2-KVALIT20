<?php
require_once("database.php");

require_once("header.php");
require_once("navbar.php");

?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$movie = $_POST['movie'];

$succesMessage = "
<div class = 'row justify-content-center'>
    <div class='alert-success text-center col-10' role='alert'><p class = 'mt-3'style = 'color:white; font-size:20px;'><b>Purchase registered</b></p></div>
    </div> 
    
</div>
";

 $stmt = $conn->prepare("
     SELECT  product.product_Name, product.product_Description , product.product_Price 
     FROM product
     WHERE product.product_ID = $movie;
    "
);
$stmt->execute();
$resultMovie = $stmt->fetchAll();

$stmt = $conn->prepare(
    "SELECT category.category
    FROM category
    JOIN product_category
    ON category.category_ID = product_category.category_ID
    JOIN product
    ON  product.product_ID = product_category.product_ID
    WHERE product.product_ID = $movie;
    "
);
$stmt->execute();
$resultCategory = $stmt->fetchAll();

$stmt = $conn->prepare(
    "SELECT pictures.picture
    FROM pictures
    JOIN product_pictures
    ON pictures.picture_ID = product_pictures.picture_ID
    JOIN product
    ON  product.product_ID = product_pictures.product_ID
    WHERE product.product_ID = $movie;
    "
  );
  $stmt->execute();
  $resultPictures = $stmt->fetchAll();

  $pictures = array();
  
  foreach ($resultPictures as $key => $picture) {
    array_push($pictures,$picture['picture']);
  }

$categories = array();
foreach ($resultCategory as $key => $value) {
    array_push($categories,ucfirst($value['category']));
}

    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);

    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    $tel = filter_var($_POST['tel'], FILTER_SANITIZE_STRING);

    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);

    if (empty($email) == 1){
        echo $errMessage;
    }else{
        $stmt = $conn->prepare("INSERT INTO ordersdb (name,email,tel,address,productID)
        VALUES (:name, :email, :tel,:address,:productID)");
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':tel',$tel);
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':address',$address);
        $stmt->bindParam(':productID',$movie);
        $stmt->execute();
        
        $stmt = $conn->prepare("INSERT INTO customers (customer_Name,customer_Email,customer_Tel,customer_Address)
        VALUES (:customer_Name, :customer_Email, :customer_Tel,:customer_Address)");
        $stmt->bindParam(':customer_Email',$email);
        $stmt->bindParam(':customer_Tel',$tel);
        $stmt->bindParam(':customer_Name',$name);
        $stmt->bindParam(':customer_Address',$address);
        $stmt->execute();
        echo $succesMessage; 
    }
   
}else{
    header('Location:index.php');
}

$view = "<div class=' row justify-content-center mt-4'>";

foreach ($resultMovie as $key => $value) {
    $view .="
    <div class = 'col-2'>

         <div id='carouselExampleControls' class='carousel slide' data-ride='carousel'>
           <div class='carousel-inner'>
           <div class='carousel-item active '> <img src='images/$pictures[0]' class='d-block w-100' alt='...'></div>
           ";

            foreach ($pictures as $key => $pic) {
              if($key != 0){
                $view .= "<div class='carousel-item  '> <img src='images/$pic' class='d-block w-100' alt='...'></div>";
              }
              
            }

            $view .= "

             </div>

           <a class='carousel-control-prev' href='#carouselExampleControls' role='button' data-slide='prev'>
           <span class='carousel-control-prev-icon' aria-hidden='true'></span>
           <span class='sr-only'>Previous</span>
           </a>
           <a class='carousel-control-next' href='#carouselExampleControls' role='button' data-slide='next'>
           <span class='carousel-control-next-icon' aria-hidden='true'></span>
           <span class='sr-only'>Next</span>
           </a>
         </div>
            
        </div>
    <div class='col-2 text-center'>
        <h4> $value[product_Name] </h4>
        <div class ='text-center'>
        ";

        foreach ($categories as $key => $category)
        {
        $view .= "
        <button type='button' class='btn btn-warning disabled ml-2'>$category</button>";
        }
    $view .= "

    </div>
    
    <p class ='mt-2'>
    $value[product_Description]
    </p>

    <div class = 'text-center' >
    <button type='button' class='btn btn-danger disabled ml-2'> &dollar;$value[product_Price] </button>
    
    </div>

    </div>
    
    ";  
}
$view .= "</div>";
echo $view;
require_once("footer.php");

    

   

     
