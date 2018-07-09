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
	<div role="form">
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
	                <div class="form-group">
	                    <label class="control-label">Store</label>	
						<input disabled maxlength="200" type="text" id="storeAddress" required="required" class="form-control" placeholder="choose the store from the map bellow" />						
						<input hidden type="text" id="storeAddressID" required="required" class="form-control"/>						
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
	                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
	            </div>
	        </div>
	    </div>
	    <div class="row setup-content" id="step-3">
	        <div class="col-xs-12">	        	
	            <div class="col-md-12">
	                <h3> Step 3</h3>
	                <div class="checkout">
					  <div class="credit-card-box">
					    <div class="flip">
					      <div class="front">
					        <div class="chip"></div>
					        <div class="logo">
					          <svg version="1.1" id="visa" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					               width="47.834px" height="47.834px" viewBox="0 0 47.834 47.834" style="enable-background:new 0 0 47.834 47.834;">
					            <g>
					              <g>
					                <path d="M44.688,16.814h-3.004c-0.933,0-1.627,0.254-2.037,1.184l-5.773,13.074h4.083c0,0,0.666-1.758,0.817-2.143
					                         c0.447,0,4.414,0.006,4.979,0.006c0.116,0.498,0.474,2.137,0.474,2.137h3.607L44.688,16.814z M39.893,26.01
					                         c0.32-0.819,1.549-3.987,1.549-3.987c-0.021,0.039,0.317-0.825,0.518-1.362l0.262,1.23c0,0,0.745,3.406,0.901,4.119H39.893z
					                         M34.146,26.404c-0.028,2.963-2.684,4.875-6.771,4.875c-1.743-0.018-3.422-0.361-4.332-0.76l0.547-3.193l0.501,0.228
					                         c1.277,0.532,2.104,0.747,3.661,0.747c1.117,0,2.313-0.438,2.325-1.393c0.007-0.625-0.501-1.07-2.016-1.77
					                         c-1.476-0.683-3.43-1.827-3.405-3.876c0.021-2.773,2.729-4.708,6.571-4.708c1.506,0,2.713,0.31,3.483,0.599l-0.526,3.092
					                         l-0.351-0.165c-0.716-0.288-1.638-0.566-2.91-0.546c-1.522,0-2.228,0.634-2.228,1.227c-0.008,0.668,0.824,1.108,2.184,1.77
					                         C33.126,23.546,34.163,24.783,34.146,26.404z M0,16.962l0.05-0.286h6.028c0.813,0.031,1.468,0.29,1.694,1.159l1.311,6.304
					                         C7.795,20.842,4.691,18.099,0,16.962z M17.581,16.812l-6.123,14.239l-4.114,0.007L3.862,19.161
					                         c2.503,1.602,4.635,4.144,5.386,5.914l0.406,1.469l3.808-9.729L17.581,16.812L17.581,16.812z M19.153,16.8h3.89L20.61,31.066
					                         h-3.888L19.153,16.8z"/>
					              </g>
					            </g>
					          </svg>
					        </div>
					        <div class="number"></div>
					        <div class="card-holder">
					          <label>Card holder</label>
					          <div></div>
					        </div>
					        <div class="card-expiration-date">
					          <label>Expires</label>
					          <div></div>
					        </div>
					      </div>
					      <div class="back">
					        <div class="strip"></div>
					        <div class="logo">
					          <svg version="1.1" id="visa" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					               width="47.834px" height="47.834px" viewBox="0 0 47.834 47.834" style="enable-background:new 0 0 47.834 47.834;">
					            <g>
					              <g>
					                <path d="M44.688,16.814h-3.004c-0.933,0-1.627,0.254-2.037,1.184l-5.773,13.074h4.083c0,0,0.666-1.758,0.817-2.143
					                         c0.447,0,4.414,0.006,4.979,0.006c0.116,0.498,0.474,2.137,0.474,2.137h3.607L44.688,16.814z M39.893,26.01
					                         c0.32-0.819,1.549-3.987,1.549-3.987c-0.021,0.039,0.317-0.825,0.518-1.362l0.262,1.23c0,0,0.745,3.406,0.901,4.119H39.893z
					                         M34.146,26.404c-0.028,2.963-2.684,4.875-6.771,4.875c-1.743-0.018-3.422-0.361-4.332-0.76l0.547-3.193l0.501,0.228
					                         c1.277,0.532,2.104,0.747,3.661,0.747c1.117,0,2.313-0.438,2.325-1.393c0.007-0.625-0.501-1.07-2.016-1.77
					                         c-1.476-0.683-3.43-1.827-3.405-3.876c0.021-2.773,2.729-4.708,6.571-4.708c1.506,0,2.713,0.31,3.483,0.599l-0.526,3.092
					                         l-0.351-0.165c-0.716-0.288-1.638-0.566-2.91-0.546c-1.522,0-2.228,0.634-2.228,1.227c-0.008,0.668,0.824,1.108,2.184,1.77
					                         C33.126,23.546,34.163,24.783,34.146,26.404z M0,16.962l0.05-0.286h6.028c0.813,0.031,1.468,0.29,1.694,1.159l1.311,6.304
					                         C7.795,20.842,4.691,18.099,0,16.962z M17.581,16.812l-6.123,14.239l-4.114,0.007L3.862,19.161
					                         c2.503,1.602,4.635,4.144,5.386,5.914l0.406,1.469l3.808-9.729L17.581,16.812L17.581,16.812z M19.153,16.8h3.89L20.61,31.066
					                         h-3.888L19.153,16.8z"/>
					              </g>
					            </g>
					          </svg>

					        </div>
					        <div class="ccv">
					          <label>CCV</label>
					          <div></div>
					        </div>
					      </div>
					    </div>
					  </div>
					  <form class="form" autocomplete="off" novalidate>
					    <fieldset>
					      <label for="card-number">Card Number</label>
					      <input type="num" id="card-number" class="input-cart-number" maxlength="4" />
					      <input type="num" id="card-number-1" class="input-cart-number" maxlength="4" />
					      <input type="num" id="card-number-2" class="input-cart-number" maxlength="4" />
					      <input type="num" id="card-number-3" class="input-cart-number" maxlength="4" />
					    </fieldset>
					    <fieldset>
					      <label for="card-holder">Card holder</label>
					      <input type="text" id="card-holder" />
					    </fieldset>
					    <fieldset class="fieldset-expiration">
					      <label for="card-expiration-month">Expiration date</label>
					      <div class="select">
					        <select id="card-expiration-month">
					          <option></option>
					          <option>01</option>
					          <option>02</option>
					          <option>03</option>
					          <option>04</option>
					          <option>05</option>
					          <option>06</option>
					          <option>07</option>
					          <option>08</option>
					          <option>09</option>
					          <option>10</option>
					          <option>11</option>
					          <option>12</option>
					        </select>
					      </div>
					      <div class="select">
					        <select id="card-expiration-year">
					          <option></option>
					          <option>2016</option>
					          <option>2017</option>
					          <option>2018</option>
					          <option>2019</option>
					          <option>2020</option>
					          <option>2021</option>
					          <option>2022</option>
					          <option>2023</option>
					          <option>2024</option>
					          <option>2025</option>
					        </select>
					      </div>
					    </fieldset>
					    <fieldset class="fieldset-ccv">
					      <label for="card-ccv">CCV</label>
					      <input type="text" id="card-ccv" maxlength="3" />
					    </fieldset>
					  </div>
					</div>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAo-8FbnM44gyFDVka3mW8apy2A1d52PRw&callback=initMap"
    async defer></script>

<script src="js/card.js" async defer></script>

<?php 
    include 'includes/footer.html';
?>


