<?php
session_start();
$product_ids = array();
//session_destroy();

//check if Add to Cart button has been submitted
if(filter_input(INPUT_POST, 'add_to_cart')){
    if(isset($_SESSION['shopping_cart'])){
        
        //keep track of how mnay products are in the shopping cart
        $count = count($_SESSION['shopping_cart']);
        
        //create sequantial array for matching array keys to products id's
        $product_ids = array_column($_SESSION['shopping_cart'], 'id');
        
        if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
        $_SESSION['shopping_cart'][$count] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            );   
        }
        else { //product already exists, increase quantity
            //match array key to id of the product being added to the cart
            for ($i = 0; $i < count($product_ids); $i++){
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                    //add item quantity to the existing product in the array
                    $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }
        
    }
    else { //if shopping cart doesn't exist, create first product with array key 0
        //create array using submitted form data, start from key 0 and fill it with values
        $_SESSION['shopping_cart'][0] = array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_POST, 'quantity')
        );
    }
}

if(filter_input(INPUT_GET, 'action') == 'delete'){
    //loop through all products in the shopping cart until it matches with GET id variable
    foreach($_SESSION['shopping_cart'] as $key => $product){
        if ($product['id'] == filter_input(INPUT_GET, 'id')){
            //remove product from the shopping cart when it matches with the GET id
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    //reset session array keys so they match with $product_ids numeric array
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
}

//pre_r($_SESSION);

function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>


<?php 
    include 'includes/header.html';
    include 'controller/db-connect.php';
?>

        <div class="container">
                    <!-- Blueprint header -->
        <header class="bp-header cf">
            <div class="dummy-logo">
                <div class="dummy-icon"><img src="./img/shopping-bag.svg" class="shoppingResponsive" alt="Shopping bag"></div>
                <p class="dummy-heading">Shopping cart</p>
            </div>
            <div class="bp-header__main">
                <h1 class="bp-header__title"><?= $_SESSION['login_user']; ?></h1>
            </div>
        </header>
    
        <button class="action action--open" aria-label="Open Menu"><span class="icon icon--menu"></span></button>
    <nav id="ml-menu" class="menu">
            <button class="action action--close" aria-label="Close Menu"><span class="icon icon--cross"></span></button>
            <div class="menu__wrap">
                <ul data-menu="main" class="menu__level" tabindex="-1" role="menu" aria-label="All">
                    <li><a class="menu__link cart" href="#">Cart</a></li>
                    <li><a class="menu__link stores" href="#">Stores</a></li>
                </ul>
            </div>
        </nav>

<div class="content" id="content">

        <?php

        $query = 'SELECT * FROM ProductCatalog ORDER by id ASC';
        $result = mysqli_query($mysqli, $query);

        if ($result):
            if(mysqli_num_rows($result)>0):
                while($product = mysqli_fetch_assoc($result)):
                //print_r($product);
                ?>
                <div class="col-sm-4 col-md-3" >
                    <form method="post" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                        <div class="products">
                            <img src="./img/<?php echo $product['image']; ?>" class="img-fluid" />
                            <h4 class="text-info"><?php echo $product['name']; ?></h4>
                            <h4>$ <?php echo $product['price']; ?></h4>
                            <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="name" value="<?php echo $product['name']; ?>" />
                            <input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
                            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-info"
                                   value="Add to Cart" />
                        </div>
                    </form>
                </div>
                <?php
                endwhile;
            endif;
        endif;   
        ?>
        <div style="clear:both"></div>  
        <br />  
        <div class="table-responsive">  
        <table class="table">  
            <tr><th colspan="5"><h3>Order Details</h3></th></tr>   
        <tr>  
             <th width="40%">Product Name</th>  
             <th width="10%">Quantity</th>  
             <th width="20%">Price</th>  
             <th width="15%">Total</th>  
             <th width="5%">Action</th>  
        </tr>  
        <?php   
        if(!empty($_SESSION['shopping_cart'])):  
            
             $total = 0;  
        
             foreach($_SESSION['shopping_cart'] as $key => $product): 
        ?>  
        <tr>  
           <td><?php echo $product['name']; ?></td>  
           <td><?php echo $product['quantity']; ?></td>  
           <td>$ <?php echo $product['price']; ?></td>  
           <td>$ <?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>  
           <td>
               <a href="cart.php?action=delete&id=<?php echo $product['id']; ?>">
                    <div class="btn-danger">Remove</div>
               </a>
           </td>  
        </tr>  
        <?php  
                  $total = $total + ($product['quantity'] * $product['price']);  
             endforeach;  
        ?>  
        <tr>  
             <td colspan="3" align="right">Total</td>  
             <td align="right">$ <?php echo number_format($total, 2); ?></td>  
             <td></td>  
        </tr>  
        <tr>
            <!-- Show checkout button only if the shopping cart is not empty -->
            <td colspan="5">
             <?php 
                if (isset($_SESSION['shopping_cart'])):
                if (count($_SESSION['shopping_cart']) > 0):
             ?>
                <a href="#" class="button">Checkout</a>
             <?php endif; endif; ?>
            </td>
        </tr>
        <?php  
        endif;
        ?>  
        </table>  
         </div>
        </div> 
        <!-- end of content -->
</div>
<?php 
    include 'includes/footer.html';
?>
