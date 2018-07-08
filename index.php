<?php 
	session_start();

	$error = '';

	include 'controller/db-connect.php';

 	if($_SERVER["REQUEST_METHOD"] == "POST") {

 		if ($_POST['formSubmit'] == "Sign In") {
		 	$loginUser =	$_POST['loginUser'];
			$userpassword =	$_POST['loginPass'];

			$query = "SELECT * FROM Users WHERE UserEmail = '$loginUser' OR UserName = '$loginUser'";

			$login = mysqli_query($mysqli, $query);

			if($login){
				$row = mysqli_fetch_array($login, MYSQLI_ASSOC);
				$count = mysqli_num_rows($login);

				if (password_verify($userpassword, $row['UserPassword'])) {
				     $_SESSION['login_user'] = $loginUser;
		         	header("location: cart.php");
				} else {
				    $msg = mysqli_error($mysqli);
		         	// echo "<script>document.getElementById('invalidLogin').innerHTML = 'User';</script>";
		         	$error = 'Check credentials' . $query;
				}
			}
		} else if ($_POST['formSubmit'] == "Sign Up") {
			$UserName    =	$_POST['signUpUser'];
			$UserPassword =	password_hash($_POST['signUpPass'], PASSWORD_DEFAULT);
			$UserEmail   =	$_POST['signUpEmail'];
			$UserPhone   =	$_POST['signUpPhone'];
			$UserGender  =	$_POST['signUpGender'];
			$UserDOB	 =	$_POST['signUpDOB'];
			$UserStreet  =	$_POST['route'];
			$UserNumber  =	$_POST['street_number'];
			$UserZIP     =	$_POST['postal_code'];
			$UserCity    =	$_POST['locality'];
			$UserState   =	$_POST['administrative_area_level_1'];
			$UserCountry =	$_POST['country'];

			$query = "INSERT INTO shoppingCart.Users 
			(UserName, UserPassword, UserEmail, UserPhone, UserGender, UserDOB, UserStreet, UserNumber, UserZIP, UserCity, UserState, UserCountry) 
			VALUES 
			('$UserName', '$UserPassword', '$UserEmail', '$UserPhone', '$UserGender', '$UserDOB', '$UserStreet', '$UserNumber', '$UserZIP', '$UserCity', '$UserState', '$UserCountry');";

			$register = mysqli_query($mysqli, $query);

			if($register){
				$error = 'Registered succesfully';
			} else { $msg = mysqli_error($mysqli);

				$error = 'Error: ' . $msg;
				echo "<script>document.getElementById('loginUser').value = 'User';</script>";
			}

		} else if ($_POST['formSubmit'] == "Proceed") {

		   		$emailNoUser = $_POST['emailNoUser'];

			$_SESSION['login_user'] = $emailNoUser;
	     	header("location: ./cart.php");

		} 
	} else if($_SERVER["REQUEST_METHOD"] == "GET") {
		if (isset($_GET['argument']) && $_GET["argument"]=='logOut'){		   
		    session_unset();
		    session_destroy();
		    $host  = $_SERVER['HTTP_HOST'];
		    $link = "http://$host/index.php";
		    echo $link;
		    exit;
		}
	}
?>



<!-- Loading login Modal -->
<?php
	include 'includes/header.html';
	include "./views/modalLogin.html";
?>



 <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>

		<div class="login-form">
			<form action="" method="post" id="signInForm">
			<div class="sign-in-htm">
				<div class="group">
					<label for="loginUser" class="label">Username</label>
					<input id="loginUser" name="loginUser" type="text" class="input">
				</div>
				<div class="group">
					<label for="loginPass" class="label">Password</label>
					<input id="loginPass" name="loginPass" type="password" class="input" data-type="password">
				</div>
				<small class="form-text text-mute" id="invalidLogin"><?= $error; ?></small>
				<div class="group">
					<input id="loginCheck" type="checkbox" class="check" checked>
					<label for="loginCheck"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" name="formSubmit" value="Sign In" id="signInButton">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a id="emailModalOpen" href="#" data-toggle="modal" data-target="emailModal">Access store without loging in</a>
				</div>
			</div>
			</form>

			<form action="" method="post" id="signUpForm">
			<div class="sign-up-htm">
				<div class="group">
					<label for="signUpUser" class="label">Name</label>
					<input id="signUpUser" name="signUpUser" type="text" class="input">
				</div>
				<div class="row">
					<div class="group col-md-4">
						<label for="signUpPass" class="label">Password</label>
						<input id="signUpPass" name="signUpPass" type="password" class="input" data-type="password">
					</div>
					<div class="group col-md-8">
						<label for="signUpEmail" class="label">Email</label>
						<input id="signUpEmail" name="signUpEmail" type="text" class="input">
					</div>
				</div>
				<div class="row">
					<div class="group col-md-4">
						<label for="signUpPhone" class="label">Phone Number</label>
						<input id="signUpPhone" name="signUpPhone" type="phone" class="input">
					</div>
					<div class="group col-md-3">
						<label for="signUpGender" class="label">Gender</label>
						<select id="signUpGender" class="input" name="signUpGender">
						  <option value="M">Male</option>
						  <option value="F">Female</option>
						  <option value="O">Other</option>
						</select>
					</div>
					<div class="group col-md-5">
						<label for="signUpDOB" class="label">Date of birth</label>
						<input id="signUpDOB" type="date" class="input" name="signUpDOB">
					</div>
				</div>
				<div class="group">
					<label for="signUpAddress" class="label">Search Address</label>
					<input id="signUpAddress" type="text" class="input" onFocus="geolocate()">
				</div>
				<div class="row">
					<div class="group col-md-8">
						<label for="route" class="label">Street</label>
						<input id="route" type="text" name="route" class="input">
					</div>
					<div class="group col-md-4">
						<label for="street_number" class="label">Number</label>
						<input id="street_number" name="street_number" type="text" class="input">
				 	</div>
			    </div>
				<div class="row">
					<div class="group col-md-3">
						<label for="postal_code" class="label">ZIP Code</label>
						<input id="postal_code" name="postal_code" type="text" class="input">
					</div>
					<div class="group col-md-3">
						<label for="locality" class="label">City</label>
						<input id="locality" name="locality" type="text" class="input">
					</div>
					<div class="group col-md-3">
						<label for="administrative_area_level_1" class="label">State</label>
						<input id="administrative_area_level_1" type="text" class="input" name="administrative_area_level_1">
					</div>
					<div class="group col-md-3">
						<label for="country" class="label">Country</label>
						<input id="country" type="text" class="input" name="country">
					</div>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up" id="signUpButton" name="formSubmit">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</label>
				</div>
			</div>
 		  </form>
		</div>
	</div>
 </div>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCV8OYMPiAXbPAvE9HEkve3-GxZFdmzD84&libraries=places&callback=initAutocomplete" async defer></script>
<?php 
	include 'includes/footer.html';
?>
