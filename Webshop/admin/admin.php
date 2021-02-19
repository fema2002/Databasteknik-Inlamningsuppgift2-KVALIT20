<?php

require_once("../header.php");
require_once("../navbar.php");
require_once("../database.php");

?>
<h2 class ="text-center">Admin</h2>




<nav class ="d-flex justify-content-center" >
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Contact</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Customers</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Orders</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
  <?php
        $stmt = $conn->prepare("SELECT * FROM messagesdb");
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        $table = "
        <div class = 'row justify-content-center '>
          <div class = 'col-4'>
            <table class='table'>";
            $table .= '<tr><th>Name</th><th>E-mail</th><th>Message</th></tr>';
            foreach ($result as $key => $value) {
            $table .= "<tr>
            <td>$value[name]</td>
            <td>$value[email]</td>
            <td>$value[message]</td>
            <td>
            <a type='button' class='btn btn-warning' href='delete.php?id=$value[messageID]'>Erase</a>
            </td>
            </tr>";
        }
        $table .= 
        '</table></div></div>';
        echo $table;
        echo "<div class = 'd-flex justify-content-center'> <a type='button' class='btn btn-warning ' href='delete.php?erase'>Erase all</a> </div>"
        ?>
        
        </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <?php
        $stmt = $conn->prepare("SELECT * FROM customers");
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        
        $table = "
        <div class = 'row justify-content-center '>
          <div class = 'col-4'>
            <table class='table'>";
            $table .= '<tr><th>ID</th><th>Name</th><th>Phone</th><th>E-mail</th><th>Address</th></tr>';
            foreach ($result as $key => $value) {
            $table .= "<tr>
            <td>$value[customer_ID]</td>
            <td>$value[customer_Name]</td>
            <td>$value[customer_Tel]</td>
            <td>$value[customer_Email]</td>
            <td>$value[customer_Address]</td>

            </tr>";
        }
        $table .= 
        '</table></div></div>';
        echo $table;
        
        ?>
        </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
  <?php
        $stmt = $conn->prepare("SELECT * FROM ordersdb");
        $stmt->execute();
        $result = $stmt->fetchAll(); 
   
        $table = "
        <div class = 'row justify-content-center '>
          <div class = 'col-4'>
            <table class='table'>";
            $table .= '<tr><th>Order ID</th><th>Product</th><th>Name</th><th>Phone</th><th>E-mail</th><th>Address</th></tr>';
            foreach ($result as $key => $value) {
              $stmt = $conn->prepare("SELECT product_Name FROM product WHERE product_ID = $value[productID]");
              $stmt->execute();
              $resultNames = $stmt->fetchAll();
              $names = array();
            $table .= "<tr>
            <td>$value[orderID]</td>
            ";

           
            foreach ($resultNames as $key => $name){
            array_push($names,$name);
            $name = $names[0]['product_Name'];
            }
  
            $table .="
            <td> $name</td>
            <td>$value[name]</td>
            <td>$value[tel]</td>
            <td>$value[email]</td>
            <td>$value[address]</td>
            </tr>";
        }
        $table .= 
        "</table></div></div>";
        
        echo $table;
        
        ?>
 
        </div>
</div>



<?php
require_once("../footer.php");
