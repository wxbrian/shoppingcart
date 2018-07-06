<?php 
	include 'includes/header.html';
	include 'controller/db-connect.php';
?>

	<!-- Main container -->
	<div class="container">
		<!-- Blueprint header -->
		<header class="bp-header cf">
			<div class="dummy-logo">
				<div class="dummy-icon foodicon foodicon--coconut"></div>
				<h2 class="dummy-heading">Fooganic</h2>
			</div>
			<div class="bp-header__main">
				<span class="bp-header__present">Blueprint <span class="bp-tooltip bp-icon bp-icon--about" data-content="The Blueprints are a collection of basic and minimal website concepts, components, plugins and layouts with minimal style for easy adaption and usage, or simply for inspiration."></span></span>
				<h1 class="bp-header__title">Multi-Level Menu</h1>
				<nav class="bp-nav">
					<a class="bp-nav__item bp-icon bp-icon--prev" href="http://tympanus.net/Blueprints/PageStackNavigation/" data-info="previous Blueprint"><span>Previous Blueprint</span></a>
					<!--a class="bp-nav__item bp-icon bp-icon--next" href="" data-info="next Blueprint"><span>Next Blueprint</span></a-->
					<a class="bp-nav__item bp-icon bp-icon--drop" href="http://tympanus.net/codrops/?p=25521" data-info="back to the Codrops article"><span>back to the Codrops article</span></a>
					<a class="bp-nav__item bp-icon bp-icon--archive" href="http://tympanus.net/codrops/category/blueprints/" data-info="Blueprints archive"><span>Go to the archive</span></a>
				</nav>
			</div>
		</header>
		<button class="action action--open" aria-label="Open Menu"><span class="icon icon--menu"></span></button>
		<nav id="ml-menu" class="menu">
			<button class="action action--close" aria-label="Close Menu"><span class="icon icon--cross"></span></button>
			<div class="menu__wrap">
				<ul data-menu="main" class="menu__level" tabindex="-1" role="menu" aria-label="All">
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-1" aria-owns="submenu-1" href="#">Vegetables</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-2" aria-owns="submenu-2" href="#">Fruits</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-3" aria-owns="submenu-3" href="#">Grains</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-4" aria-owns="submenu-4" href="#">Mylk &amp; Drinks</a></li>
				</ul>
				<!-- Submenu 1 -->
				<ul data-menu="submenu-1" id="submenu-1" class="menu__level" tabindex="-1" role="menu" aria-label="Vegetables">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Stalk Vegetables</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Roots &amp; Seeds</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Cabbages</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Salad Greens</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Mushrooms</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-1-1" aria-owns="submenu-1-1" href="#">Sale %</a></li>
				</ul>
				<!-- Submenu 1-1 -->
				<ul data-menu="submenu-1-1" id="submenu-1-1" class="menu__level" tabindex="-1" role="menu" aria-label="Sale %">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Fair Trade Roots</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Dried Veggies</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Our Brand</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Homemade</a></li>
				</ul>
				<!-- Submenu 2 -->
				<ul data-menu="submenu-2" id="submenu-2" class="menu__level" tabindex="-1" role="menu" aria-label="Fruits">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Citrus Fruits</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Berries</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-2-1" aria-owns="submenu-2-1" href="#">Special Selection</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Tropical Fruits</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Melons</a></li>
				</ul>
				<!-- Submenu 2-1 -->
				<ul data-menu="submenu-2-1" id="submenu-2-1" class="menu__level" tabindex="-1" role="menu" aria-label="Special Selection">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Exotic Mixes</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Wild Pick</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Vitamin Boosters</a></li>
				</ul>
				<!-- Submenu 3 -->
				<ul data-menu="submenu-3" id="submenu-3" class="menu__level" tabindex="-1" role="menu" aria-label="Grains">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Buckwheat</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Millet</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Quinoa</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Wild Rice</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Durum Wheat</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-3-1" aria-owns="submenu-3-1" href="#">Promo Packs</a></li>
				</ul>
				<!-- Submenu 3-1 -->
				<ul data-menu="submenu-3-1" id="submenu-3-1" class="menu__level" tabindex="-1" role="menu" aria-label="Promo Packs">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Starter Kit</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">The Essential 8</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Bolivian Secrets</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Flour Packs</a></li>
				</ul>
				<!-- Submenu 4 -->
				<ul data-menu="submenu-4" id="submenu-4" class="menu__level" tabindex="-1" role="menu" aria-label="Mylk &amp; Drinks">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Grain Mylks</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Seed Mylks</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Nut Mylks</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Nutri Drinks</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-4-1" aria-owns="submenu-4-1" href="#">Selection</a></li>
				</ul>
				<!-- Submenu 4-1 -->
				<ul data-menu="submenu-4-1" id="submenu-4-1" class="menu__level" tabindex="-1" role="menu" aria-label="Selection">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Nut Mylk Packs</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Amino Acid Heaven</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Allergy Free</a></li>
				</ul>
			</div>
		</nav>
		<div class="content">
			<?php
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

        <div class="container">
        <?php

        $connect = mysqli_connect('127.0.0.1', 'root', '', 'cart');
        $query = 'SELECT * FROM products ORDER by id ASC';
        $result = mysqli_query($connect, $query);

        if ($result):
            if(mysqli_num_rows($result)>0):
                while($product = mysqli_fetch_assoc($result)):
                //print_r($product);
                ?>
                <div class="col-sm-4 col-md-3" >
                    <form method="post" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                        <div class="products">
                            <img src="<?php echo $product['image']; ?>" class="img-responsive" />
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
			<!-- Ajax loaded content here -->
		</div>
	</div>
	<!-- /view -->

<?php 
	include 'includes/footer.html';
?>