<?php



session_start();

require_once 'db/CreateDb.php';

require_once 'db/product.php';



 




$database = new CreateDb();


if (isset($_POST['add'])){
  /// print_r($_POST['product_id']);
  if(isset($_SESSION['cart'])){

      $item_array_id = array_column($_SESSION['cart'], "product_id");

      if(in_array($_POST['product_id'], $item_array_id)){
          echo "<script>alert('produit déja dans la carte .!')</script>";
          echo "<script>window.location = 'index.php'</script>";
      }else{

          $count = count($_SESSION['cart']);
          $item_array = array(
              'product_id' => $_POST['product_id']
          );

          $_SESSION['cart'][$count] = $item_array;
      }

  }else{

      $item_array = array(
              'product_id' => $_POST['product_id']
      );

      // Create new session variable
      $_SESSION['cart'][0] = $item_array;
      print_r($_SESSION['cart']);
  }
}


?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Darshan | Décoration Maison</title>

    <link rel="icon" href="favicon.ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    
    
    <link rel="stylesheet" href="main.css">
    
   
  </head>
  <body>
    <section class="hero">

      <nav class="navbar bar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
          <a class="navbar-item" href="index.php">
            <span class="logo">DARSHAN</span>
          </a>
      
          
        </div>
      
            
      
            <a href="cart.php" class="go"><ion-icon class="cart" name="cart-outline" size="large"></ion-icon></a>
            
            
            <?php

          if (isset($_SESSION['cart'])){
            $count = count($_SESSION['cart']);

            
            
            
            
              echo " <span class=\"number\">$count</span>";
        }else{
          echo " <span class=\"number\">0</span>";

        }


        ?>        
        <a href="login.php" class="go"><ion-icon  class="login" name="person-add-outline"></ion-icon></a>

            
          </div>
      
          
        </div>
      </nav>

     

      
  <section class="section">
    <div class="container">
      <h1 class="title">
        DARSHAN
      </h1>
      <p class="subtitle">
        ATTENDRE PLUS  <strong>PAYER MOINS.</strong> 
      </p>
    </div>

      
      
      <div class="vase"><img src="images/vase.png" alt="vase"></div>
  </section>
  


 
</section>


<div class="nosProduits">Nos produits :</div>
<div class="productcon">




<?php
$result = $database->getData();
while ($row = mysqli_fetch_assoc($result)){
    produit( $row['id'],$row['product_name'], $row['product_price'], $row['product_image']);
}
?>









 


</div>

<div class="end">
<span class="footerend"> Copyright © 2020 Tous droits réservés |  réalisés par Akram chami et Oudrar Hassan</span>
</div>
 

    

     
     
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  </body>
</html>