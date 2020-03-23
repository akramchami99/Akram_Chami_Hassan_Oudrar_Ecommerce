<?php


session_start();

require_once ("db/CreateDb.php");
require_once ("db/product.php");

$db = new CreateDb("id13013243_ecom", "products");

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    
    
    <link rel="stylesheet" href="main.css">

    <title>Document</title>
</head>
<body>



<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="main.css">
</head>
<body>
	<main class="page">
	 	<section class="shopping-cart dark">
	 		<div class="container">
		        <div class="block-heading">
		          <h2>Shopping Cart</h2>
		          <p>vos produits commandés</p>
		        </div>
		        <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-8">
	 						<div class="items">

                             <?php
                             $total = 0;
    if (isset($_SESSION['cart'])){
        $product_id = array_column($_SESSION['cart'], 'product_id');

        $result = $db->getData();
        while ($row = mysqli_fetch_assoc($result)){
            foreach ($product_id as $id){
                if ($row['id'] == $id){
                    cartElement($row['id'], $row['product_name'],$row['product_price'],$row['product_image']);
                    $total = $total + (int)$row['product_price'];
                }
            }
        }
    }else{
        echo "<h5>Cart is Empty</h5>";
    }

    ?>

								
									</div>
				 				
				 				</div>
				 			</div>
			 			</div>
			 			
		 			</div> 
		 		</div>
	 		</div>
		</section>
	</main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>





</body>
</html>
