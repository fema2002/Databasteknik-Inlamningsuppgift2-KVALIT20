
<?php
require_once('../database.php');
require_once('../header.php');
require_once('../navbar.php');

$succesMessage = "
<div class = 'row'>
<div class='col-md-1'></div> 
<div class='alert-success text-center col-10' role='alert'><p class = 'mt-3'style = 'color:white; font-size:20px;'><b>Message erased</b></p></div>
<div class='col-md-1'></div>
</div> ";

$button = "<div class = text-center>
<a type='button' class='btn btn-warning col-2 mt-3' href='admin.php'>Back to Admin</a>
</div>";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_SANITIZE_STRING);
    $stmt = $conn->prepare("DELETE FROM messagesdb WHERE messageID = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    echo $succesMessage;
    echo $button;
 
}
if (isset($_GET['erase'])) {
    $stmt = $conn->prepare("DELETE FROM messagesdb");
    $stmt->execute();
    echo $succesMessage;
    echo $button;
}

require_once('../navbar.php');
?>

