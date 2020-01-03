<?php


include('tmp/header.php');

include('server.php');


 function clean_data($data){

        $data=htmlspecialchars($data);

        $data=trim($data);

        $data=stripslashes($data);

        return $data;

    }


    //define validation error as empty 

    $error= $addMemberErr = "";


    //define vars

    $fname = $lname =$uname = $email = $website = $university = $course = $skills = $password="";



    if($_SERVER["REQUEST_METHOD"] == "POST") {


            $fname = $_POST['fname'];

            $lname = $_POST['lname'];

            $uname = $_POST['uname'];

            $email = $_POST['email'];

            $website = $_POST['website'];

            $university = $_POST['campus'];

            $course = $_POST['course'];

            $skills = $_POST['skills'];

            $password = $_POST['pw'];

            $passconf = $_POST['confirm_password'];

            $image_folder='images/profile/';

            




                //validate data
               
            		if(empty($fname)){

                        $error="Please enter your first name.";

                    }


                   elseif(empty($lname)){

                        $error="Please enter your last name.";

                    }

                    elseif(empty($uname)){

                        $error="Please choose a username.";

                    }

                     elseif(strlen($uname) < 5){

                        $error="Sorry. The username must be at least five characters";

                    }

                    elseif(empty($email)){

                        $error="Please enter your email address.";

                    }

                    elseif(empty($skills)){

                        $error="Please enter three top skills.";

                    }
                    
                    elseif (empty($image_name)) {

                        $error="Please a choose a profile picture to use in your account.";

                    }


                    elseif (empty($password)) {

                        $error="Sorry.Please choose a password";

                    }

                    elseif(strlen($password) < 5){

                        $error="Password must be at least five characters";

                    }

                    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){

                        $error="Sorry. The email address you entered is invalid";

                    }

                    elseif (empty($passconf)) {

                        $error="Please confirm your password";

                    }

                    elseif($passconf != $password){

                        $error="Passwords do not match";

                    }
                  





                        if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) 


                        { 


                             $allowed_ext = array(

                                                "jpg" => "image/jpg",  
                                                "jpeg" => "image/jpeg",  
                                                "gif" => "image/gif", 
                                                "png" => "image/png"
                                            ); 


                                $file_name = $_FILES["image"]["name"]; 
                                $file_type = $_FILES["image"]["type"]; 
                                $file_size = $_FILES["image"]["size"]; 


                  
                                // Verify file extension 
                                $ext = pathinfo($file_name, PATHINFO_EXTENSION); 
              

                                if (!array_key_exists($ext, $allowed_ext))  

                                {

                                    $error = "The file you chose is not an image. Try again";

                                }

                      
                                // Verify file size - 2MB max

                                $maxsize = 2 * 1024 * 1024; 


                          
                                if ($file_size > $maxsize)  

                                {        
                                    $error = "Oops! That image seems to be too large. Please try another one."; 

                                }     


                  
                                // Verify MYME type of the file 
                                if (in_array($file_type, $allowed_ext)) 


                                { 
                                    // Check whether file exists before uploading it 
                                    if (file_exists($image_folder.$_FILES["image"]["name"]))    

                                    {         
                                        $error = "The file ". $_FILES["image"]["name"]." already exists. Try another one."; 

                                    }
                                      


                                    else

                                    { 


                                        move_uploaded_file($_FILES['image']['tmp_name'], $image_folder.$_FILES['image']['name']);


                                    }  


                                }  


                            }  


                            else

                            { 

                                 

                            } 









                        //upload data if no errors found

                        if($error == ''){


                            $password=md5($password);
                            



                            $addMemberErr = $dbObject ->addMember($fname, $lname, $uname, $email, $website, $university, $course, $skills, $image_name, $image_folder, $password);

                            //redirect to login page ,pass a var telling user to login on login page



                            $_SESSION["signup_to_login"] = "You have been signed up. Please Login to access your Booban Team account";



                            header("location:login.php");

                          


                        }
                       
    
    }


?>

<div class="container-fluid" id="signupPage">


	<div class="row">


		<div class="col-lg-2">
		</div>



		<div class="col-lg-8" id="signup">



			<?php

                            //check for validation errors

                            if($error!=='' || $addMemberErr != ''){


                    ?>
                                <div class="alert alert-danger">

                                    <?php


                                    //display validation errors here

                                    echo "<strong>".$error."<strong>";

                                    echo "<strong>".$addMemberErr."<strong>";


                                    ?>

                                </div>
                    <?php

                            }

                    ?>



            <h4 class="text-center">Become a member of Booban Team</h4>
            <h5 class="text-center">Required fields are marked <span style="color: red; font-weight: bold;">*</span></h5>

		    <form action="signup.php" method="post" enctype="multipart/form-data" id="signupForm">

		
				<div class="form-group form-group-sm col-lg-6">

				    <label for="fname">First Name:</label><span style="color: red; font-weight: bold;">*</span>

				    <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $fname;?>"> 

				 </div>


				<div class="form-group form-group-sm col-lg-6">

				    <label for="lname">Last Name:</label><span style="color: red; font-weight: bold;">*</span>

				    <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $lname;?>">

				</div>


				<div class="form-group form-group-sm col-lg-4">

				    <label for="uname">Choose a Username</label><span style="color: red; font-weight: bold;">*</span>

				    <input type="text" name="uname" id="uname" class="form-control" value="<?php echo $uname;?>">

				</div>

				 
				<div class="form-group form-group-sm col-lg-8">

				    <label for="mail">Email Address:</label><span style="color: red; font-weight: bold;">*</span>

				    <input type="text" name="email" id="mail" class="form-control" value="<?php echo $email;?>">

				</div>


				<div class="form-group form-group-sm col-lg-6">

				    <label for="website">Website:</label>

				    <input type="text" name="website" id="website" class="form-control" value="<?php echo $website;?>">

				</div>


				<div class="form-group form-group-sm col-lg-6">

					<label for="campus">University/College or Current Work</label> <span style="color: red; font-weight: bold;">*</span>

					<input type="text" name="campus" id="campus" class="form-control" value="<?php echo $university;?>">

				</div>


				<div class="form-group form-group-sm col-lg-6">

					<label for="campus">Course</label>

					<input type="text" name="course" id="course" class="form-control" value="<?php echo $course;?>">

				</div>



				<div class="form-group form-group-sm col-lg-6">

					<label for="skill">Skills</label><span style="color: red; font-weight: bold;">*</span>

					<input type="text" name="skills" id="skill" class="form-control" placeholder="Enter your three top skills separated by a comma" value="<?php echo $skills;?>">

				</div>


				<div class="form-group col-lg-6">

					<label for="image">Choose a profile picture:</label> <span style="color: red; font-weight: bold;">*</span>

					<input type="file" name="image" id="image" class="form-control">

				</div>


				<div class="form-group col-lg-12">

					<label for="pw">Password</label><span style="color: red; font-weight: bold;">*</span>

			        <input type="password" id="pw" class="form-control" name="pw" >

			    </div>


				<div class="form-group col-lg-12">

					<label for="pconf">Confirm Password</label><span style="color: red; font-weight: bold;">*</span>

			        <input type = "password" id = "pconf" class = "form-control" name = "confirm_password" >

			    </div>  


			    <div class="form-group col-lg-12">

			        <p class="text-center"><button type="submit" class="btn btn-default signup-btn">Sign Up</button></p>

			    </div>


			</form>


		    <div class="text-center col-lg-12"><h4>Already have an account? <a href="login.php">Login here</a></h4></div>

		</div>

	</div>
</div>
