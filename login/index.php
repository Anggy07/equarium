<?php

session_start();
include '../koneksi.php';

if ($_SESSION['admin']) {
	header("Location: ../dashboard");
}else {
	if (isset($_POST['submit'])) {

		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
	
		$login = mysqli_query($conn, "SELECT * FROM user WHERE username = '{$username}' AND password = '{$password}'");
		$row = mysqli_fetch_array($login);

	
		if (mysqli_num_rows($login) == 0) {
			$gagal = True;
		} else {
			$_SESSION['admin'] = $row['nama'];
			$_SESSION['level'] = $row['level'];
			header("Location: ../dashboard");
		}
	}
}
?>	
<!DOCTYPE html>
<html lang="en">
<head>
   	<meta charset="utf-8">
	<title>eQuarium Log In</title>
	<meta name="description" content="">  
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../css/base.css">  
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/vendor.css">    
	<script src="../js/modernizr.js"></script>
	<link rel="icon" type="image/png" href="../favicon.png">

</head>

<body id="top">

	<!-- header 
   ================================================== -->
   <header>

   	<div class="row">

   		<div class="logo">
	         <a href="index.html">eQuarium</a>
	      </div>

	   	<nav id="main-nav-wrap">
				<ul class="main-navigation">
					<li class=""><a href="../" title=""> &crarr; Back</a></li>					
					<li class="current highlight with-sep"><a href="#" title="">Log In</a></li>					
				</ul>
			</nav>

			<a class="menu-toggle" href="#"><span>Menu</span></a>
   		
   	</div>   	
   	
   </header> <!-- /header -->

   <!-- footer
   ================================================== -->
   <footer>


   	<div class="footer-main">

   		<div class="row">  

	      	<div class="col-four tab-1-3 mob-full footer-subscribe">

	      		<h4><br><br><br>Log In</h4>
				<?php if ($gagal){
					echo '<h6>*username atau password salah!</h6>';
				}
				?>
	      		<div class="subscribe-form" align="right">

	      			<form action="" method="POST">

							<input type="text" name="username" class="email" placeholder="username" > 

							<input type="password" name="password" class="password" placeholder="password & tekan enter untuk Log In" > 
	   		
			   			<input type="submit" name="submit" value="Login">
			
						</form>

	      		</div>	
					
				<br><br><br><br><br><br>    		
	      	           	
	      	</div> <!-- /subscribe -->         

		</div>

   	</div> <!-- /footer-main -->


      <div class="footer-bottom">

      	<div class="row">

      		<div class="col-twelve">
	      		<div class="copyright">
		         	<span>© Copyright</span> 
		         	<span><a href="https://www.equarium.id/">eQuarium</a> 2017</span>		         	
		         </div>
         
	      	</div>

      	</div> <!-- /footer-bottom -->     	

      </div>

   </footer>  

   <div id="preloader"> 
    	<div id="loader"></div>
   </div> 

   <!-- Java Script
   ================================================== --> 
   <script src="../js/jquery-1.11.3.min.js"></script>
   <script src="../js/jquery-migrate-1.2.1.min.js"></script>
   <script src="../js/plugins.js"></script>
   <script src="../js/main.js"></script>

</body>

</html>

