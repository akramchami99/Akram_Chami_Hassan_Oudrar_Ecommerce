<?php 



function produit($productid,$productname, $productprice, $productimg){
    $element = "
    
    <form action=\"index.php\" method=\"POST\">
    <div class=\"quote\">
       <img src=\"$productimg\" alt=\"img\" class=\"productImage\">
         <p>$productname</p>
         <span class=\"price\">$$productprice</span>' 

        
         <button class=\"button is-primary is-fullwidth btn\"  type=\"submit\" name=\"add\">Acheter</button>
         <input type='hidden' name='product_id' value='$productid'>
     </div>

             </form>
    
    ";
    echo $element;
}


function cartElement($productid, $productname, $productprice,$productimg){
    $element = "
    
   
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" >
    <div class=\"product\">
    <div class=\"row\">
        <div class=\"col-md-3 first\">
            <img class=\"img-fluid mx-auto d-block image ig\" src=\"$productimg\">
        </div>
        <div class=\"col-md-8\">
            <div class=\"info\">
                <div class=\"row\">
                    <div class=\"col-md-5 product-name\">
                        <div class=\"product-name\">
                            <a href=\"#\">$productname</a>
                           
                        </div>
                    </div>
                    <div class=\"col-md-4 quantity\">
                        <label for=\"quantity\">Quantity:</label>
                        <input id=\"quantity\" type=\"number\" value =\"1\" class=\"form-control quantity-input\">
                    </div>
                    <div class=\"col-md-3 price\">
                        <span>$productprice</span>
                    </div>

                    <button type=\"button\" class=\"btn btn-danger\">retirer</button>
                </div>
            </div>

            </div>

    </form>
    
    ";
    echo  $element;

   



}


?>