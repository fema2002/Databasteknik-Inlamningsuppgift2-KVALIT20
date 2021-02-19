<?php
require_once("database.php");

require_once("header.php");
require_once("navbar.php");


if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['movie'] != null) {

    $movie = $_GET['movie'];

    $stmt = $conn->prepare(
        "SELECT  product.product_Name, product.product_Description , product.product_Price 
        FROM product
        WHERE product.product_ID = $movie;
        "
      );
      $stmt->execute();
      $resultMovie = $stmt->fetchAll();

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
    
    $categories = array();
    
    foreach ($resultCategory as $key => $value) {
        array_push($categories,ucfirst($value['category']));
    }
    
    /* echo "<pre>";
    print_r($categories);
    echo "</pre>"; */
    
    ?>
    
    <h1 class="text-center">Register Order</a> </h1>
    
    
    <?php
    
    $view = "<div class='row justify-content-center '> <div class = col-1></div> ";
    
    foreach ($resultMovie as $key => $value) {
       
        $view .= 
        " 
        <form action='confirmation.php' method='post' class='col-4 '>
    
            <div class='col'>
                <label for='name' class='form-label'>Submit name</label>
                <input required type='text' name='name' class='form-control' placeholder='Name' >
            </div>
    
            <div class='col'>
                <label for='email' class='form-label mt-1'>Submit E-mail</label>
                <input required type='email' name='email' class='form-control mt-1' placeholder='E-mail'>
            </div>
    
            <div class='col'>
                <label for='tel' class='form-label mt-1'>Submit phone number</label>
                <input required type='text' name='tel' class='form-control mt-1' placeholder='Phone'>
            </div>
    
            <div class='col'>
                <label for='address' class='form-label mt-1'>Submit address</label>
                <input required type='text' name='address' class='form-control mt-1' placeholder='Address'>
            </div>
            
            <div class= 'row mt-5'>
                <div class ='col-4'></div>
                    <div class='col-4 text-center'>
                    <input type='submit' class='form-control btn btn-warning' value='Register'>
                    </div>
                <div class ='col-4'></div>
            </div>
            
            <div class='col'>
              
            <input required type='hidden' name='movie' class='form-control mt-1' value = '$movie'>

            </div>
    
        </form>
    
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
        
        <div class = 'col-2 text-center'>
            <h4>$value[product_Name] </h4> 
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
        <button type='button' class='btn btn-danger disabled ml-2'>&dollar;$value[product_Price] </button>
        
        </div>
    
        </div>
        
        ";
    
    
    }
    
    $view .= "</div></div>";
    echo $view;
    
   

}else{
    header('Location:index.php');
}

?>



<?php

$errMessage = "<div class = 'row'>
<div class='col-md-1'></div>
 <div class='alert-danger text-center col-10 ' role='alert'><p class = 'mt-3'style = 'color:white; font-size:20px;'><b>Felaktig inmatning!</b></p></div>
 <div class='col-md-1'></div>
 </div> ";

$succesMessage = "
<div class = 'row'>
<div class='col-md-1'></div> 
<div class='alert-success text-center col-10' role='alert'><p class = 'mt-3'style = 'color:white; font-size:20px;'><b>Din beställning har registrerats!</b></p></div>
<div class='col-md-1'></div>
</div> ";


require_once("footer.php");
?>
