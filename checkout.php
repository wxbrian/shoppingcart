<?php 
    include 'includes/header.html';
    include 'controller/db-connect.php';
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {



    }














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
                <button id="logout" class="button"> Logout </button>
            </div>
        </header>
    
        <button class="action action--open" aria-label="Open Menu"><span class="icon icon--menu"></span></button>
	    <nav id="ml-menu" class="menu">
            <button class="action action--close" aria-label="Close Menu"><span class="icon icon--cross"></span></button>
            <div class="menu__wrap">
                <ul data-menu="main" class="menu__level" tabindex="-1" role="menu" aria-label="All">
                    <li><a class="menu__link cart" href="#" id="cartLink">Cart</a></li>
                    <li><a class="menu__link stores" href="#" id="storesLink">Stores</a></li>
                </ul>
            </div>
        </nav>

	<div class="content" id="content">      
	    <div class="stepwizard">
	    <div class="stepwizard-row setup-panel">
	        <div class="stepwizard-step">
	            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
	            <p>Review Address</p>
	        </div>
	        <div class="stepwizard-step">
	            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
	            <p>Choose nearest store</p>
	        </div>
	        <div class="stepwizard-step">
	            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
	            <p>Payment Data</p>
	        </div>
	       <div class="stepwizard-step">
	            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
	            <p>Review Order</p>
	        </div>
	    </div>
	</div>
	<?php
        $discount = 0;
        if(!empty($_SESSION['id_user'])) {
        	$currentUser = $_SESSION['id_user'];
        	$query = "SELECT * FROM Users WHERE UserID = '$currentUser'";

        	$user = mysqli_query($mysqli, $query);
        	if ($user) {
        		$row = mysqli_fetch_array($user, MYSQLI_ASSOC);
				$count = mysqli_num_rows($user);
				$address = $row['UserStreet'] . ' ,' . $row['UserNumber'] . ' ' . $row['UserCity'];

        	}

        	$query = "SELECT SUM(totalValue) AS totalValueOrdered FROM Sales WHERE customer = '$currentUser'";

        	$totalOrdered = mysqli_query($mysqli, $query);
        	if ($totalOrdered) {
        		$row = mysqli_fetch_array($totalOrdered, MYSQLI_ASSOC);
				$count = mysqli_num_rows($totalOrdered);
				
				if($row['totalValueOrdered']) {
					$discount = $row['totalValueOrdered'] * 0.01;
				}
        	}
        }
    ?>    
	<form role="form">
	    <div class="row setup-content" id="step-1">
	        <div class="col-xs-12">
	            <div class="col-md-12">
	                <h3> Step 1</h3>
	                <div class="form-group">
	                    <label class="control-label">Address Name</label>	                    
		                <?php if ($address): ?>
						<input maxlength="200" type="text" id="address" required="required" class="form-control" value="<?= $address ?>" />
						<?php else: ?>
	                    <input maxlength="200" type="text" id="address" required="required" class="form-control" placeholder="Enter Your Address" />
						<?php endif ?>
	                </div>

	                <div id="map"></div>
	                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
	            </div>
	        </div>
	    </div>
	    <div class="row setup-content" id="step-2">
	        <div class="col-xs-12">
	            <div class="col-md-12">
	                <h3> Step 2</h3>
	                <div class="form-group">
	                    <label class="control-label">Address Name</label>	                    
		                <?php if ($address): ?>
						<input maxlength="200" type="text" id="address" required="required" class="form-control" value="<?= $address ?>" />
						<?php else: ?>
	                    <input maxlength="200" type="text" id="address" required="required" class="form-control" placeholder="Enter Your Address" />
						<?php endif ?>
	                </div>

	                <div id="map"></div>
	                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
	            </div>
	        </div>
	    </div>
	    <div class="row setup-content" id="step-3">
	        <div class="col-xs-12">
	            <div class="col-md-12">
	                <h3> Step 3</h3>
	                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>	                
	            </div>
	        </div>
	    </div>
	    <div class="row setup-content" id="step-4">
	        <div class="col-xs-12">
	            <div class="col-md-12">
	                <h3> Review your order</h3>
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

				                if ($discount && $discount > $total * 0.15) {
			                    	$totalWithDiscount = $total - $total * 0.15;
			                    } else {
			                    	$totalWithDiscount = $total - $discount;
			                    }  
					        ?>  
					        <tr>  
					             <td colspan="3" align="right">Total</td>  
					             <td align="right">$ <?php echo number_format($total, 2); ?></td>  
					             <td></td>  
					        </tr>  

					        <?php if ($totalWithDiscount): ?>
					       	<tr>  
					             <td colspan="3" align="right">With your discount</td>  
					             <td align="right">$ <?php echo number_format($totalWithDiscount, 2); ?></td>  
					             <td></td>  
					        </tr>
							<?php endif ?>

					        <tr>
					            <!-- Show checkout button only if the shopping cart is not empty -->
					            <td colspan="5">
					             <?php 
					                if (isset($_SESSION['shopping_cart'])):
					                if (count($_SESSION['shopping_cart']) > 0):
					             ?>
					             <?php endif; endif; ?>
					            </td>
					        </tr>
					        <?php  
					        endif;
					        ?>  
					        </table>  
				        </div>
	                <button class="btn btn-success btn-lg pull-right" type="submit">Confirm Order!</button>
	            </div>
	        </div>
	    </div>	    
	</form>

    </div> 
<!-- end of content -->
</div>
<script src="js/map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCV8OYMPiAXbPAvE9HEkve3-GxZFdmzD84&callback=initMap"
    async defer></script>

<?php 
    include 'includes/footer.html';
?>
