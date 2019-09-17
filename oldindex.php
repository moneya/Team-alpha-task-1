<?php

// start the session
session_start();
require('action/auth.php');


?>

    <div class="container">
        <!-- Throw an error for an unauthorize access to a secure page -->
        <?php if(!empty($_SESSION['msg'] ) ){
            echo  "You must log in first";
            unset($_SESSION['msg']);
        }
           
            ?>
    <?php include('errors.php'); ?>
        <form method="post" action="">
            <div id="div_login">
                <h1>Login</h1>
                
                <div>
                    <input type="text" name="username" placeholder="Username" />
                </div>
                <div>
                    <input type="password" class="textbox" name="password" placeholder="Password"/>
                </div>
                <div>
                    <button type="submit" class="btn" name="login">Login</button>
                </div>
            </div>
        </form>




        <!-- //Register -->

        <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="">
 
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
      </div>
      
      <div class="input-group">
  	  <label>Firstname</label>
  	  <input type="text" name="firstname" value="<?php echo $firstname; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Lastname</label>
  	  <input type="text" name="lastname" value="<?php echo $lastname; ?>">
      </div>
      
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="c_password">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg">Register</button>
  	</div>
 
  </form>
    </div>




    