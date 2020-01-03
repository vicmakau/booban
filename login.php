<?php


		require("tmp/header.php");

		require_once("server.php");



		function clean_data($data){

	        $data=htmlspecialchars($data);

	        $data=trim($data);

	        $data=stripslashes($data);

	        return $data;

   	 	}


    //define validation error as empty 

	
        $error = $loginErr = "";

        $email = $password = "";




        if(isset($_POST[ "login" ])){

        	$email = $_POST['email'];

            $password = md5($_POST['password']);



        	if(empty($email)){

                $error="Please enter your email address.";

            }

            elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){

                $error="Email address you entered is invalid";

            }

            
            elseif (empty($password)) {

                $error="Sorry.Please enter your password";

            }


            else{



	            //call memberLogin method in server.php


	            $error = $dbObject ->memberLogin($email, $password);


	        }


        }




	
?>
	
	<div class="container" id="loginPage">

	<div class="row">

		<div class="col-lg-2">
		</div>

		<div class="col-lg-8">

			<?php

                        //check for redirect from orderSummary.php

                        if(isset($_SESSION['signup_to_login']))

                        {


                ?>
                            <div class="alert alert-success">

                                <?php

                                    //display alert here

                                    echo "<strong>".$_SESSION['signup_to_login']."</strong>";

                                ?>

                            </div>


                <?php

                		unset($_SESSION['signup_to_login']);

                        }

                ?>


                <?php

                            //check for validation errors

                            if(isset($_SESSION['memberPageToLoginmsg']) && !isset($_SESSION['member_email'])){


                    ?>
                                <div class="alert alert-danger">

                                    <?php

                                        //display validation errors here

                                        echo "<strong>".$_SESSION['memberPageToLoginmsg']."<strong>";

                                    ?>

                                </div>


                    <?php

                    		unset($_SESSION['memberPageToLoginmsg']);

                            }

                    ?>





                <h4 class="text-center">Log in here</h4>

                    <?php

                            //check for validation errors

                            if($error !==''){


                    ?>
                                <div class="alert alert-danger">

                                    <?php

                                        //display validation errors here

                                        echo "<strong>".$error."<strong>";

                                    ?>

                                </div>


                    <?php

                            }

                    ?>




			<form class='' action="login.php" method="POST" id="loginForm" >


                <div class="form-group col-lg-12">

                	<label for="mail">Email Address:</label>

                    <input type="text" class="form-control" id="mail" name="email" value="<?php echo $email;?>">

                </div>



                <div class="form-group col-lg-12">

                	<label for="pw">Password:</label>

                    <input type="text" class="form-control" id="pw" name="password">

                </div>



                <div class="form-group col-lg-12">

                	<p class="text-center"><button type="submit" class="btn btn-default" name="login" style="">Login</button></p>

            	</div> 

            </form>

        </div>

    </div>
    
</div>


<?php

	require_once("tmp/footer.php");

?>