<?php

$dbObject = boobanDb::initialise( 'localhost', 'root', '', 'booban' );




class boobanDb{


    private static $instance = false;


    private $connection;



    private function __construct($dbhost, $dbuser, $dbpass, $dbname){

        $this->connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    }



    public static function initialise($dbhost, $dbuser, $dbpass, $dbname){

        if( !self::$instance ) self::$instance = new boobanDb( $dbhost, $dbuser, $dbpass, $dbname );

        return self::$instance;

    }


    function addMember($fname, $lname, $uname, $email, $website, $university, $course, $skills, $image_name, $image_folder, $password){


		$addMemberErr = "";


		$insertMember = "INSERT INTO 

                    members_tbl(fname, lname, uname, email, website, campus, course, skills,photo_name, photo_folder, password)

                    VALUES
                            
                ('$fname', '$lname', '$uname', '$email', '$website', '$university', '$course', '$skills','$image_name', '$image_folder', '$password')";


        $run = $this ->connection ->query($insertMember);



        if(!$run) {

        	$addMemberErr = "Error Uploading cust data";

        }


        return $addMemberErr;


	}




    function memberLogin($email, $password){ 


        $err = "";


        $login="SELECT email,password FROM members_tbl WHERE email='$email' AND password='$password'";


        $run_login = $this ->connection ->query($login);



        $check_login = $run_login ->num_rows;



            if($check_login == 0){


                    $err = "Invalid credentials.Try again";


            }


            elseif($check_login == 1){


                $_SESSION["member_email"] = $email;

                print_r($_SESSION["member_email"]);

                    //check if  page is redirecting from orderSummary.php


                        header("location:member.php");

                        
            }

            elseif($check_login > 1 ){

                $err = "Sorry. There is a problem with your account. Please contact support.";

            }

        

             return $err;

        }






        function getMemberInfo()


        {


            if(isset($_SESSION["member_email"]))

            {

                $userMail = $_SESSION["member_email"];

                $query = "SELECT * FROM members_tbl WHERE email='$userMail'";

                $run_query = $this ->connection ->query($query);


                $row = $run_query -> fetch_array( MYSQLI_ASSOC );

                        $fname = $row["fname"];

                        $lname = $row["lname"];

                        $uname = $row["uname"];

                        $website = $row["website"];

                        $campus = $row["campus"];

                        $course = $row["course"];

                        $skill = $row["skills"];

                        $image_name = $row["photo_name"];

                        $image_folder = $row["photo_folder"];

                        $joined = $row["join_date"];


                            $member_info = array();

                            array_push($member_info,$fname, $lname, $uname, $website, $campus, $course, $skill, $image_name, $image_folder, $joined);



            }

            return $member_info;


        }


}

?>



