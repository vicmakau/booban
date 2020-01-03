<?php




            require_once("tmp/header.php");

            require_once("server.php");





            
           

            $memberInfo = $dbObject->getMemberInfo();

            ?>



        <div class="container">

            <div class="row">


                <div class="col-lg-12">

                    <h4 class="text-center"> Your BoobanTeam Profile</h4>

                    <div class="col-lg-4">

                    </div>


                    <div class='col-lg-4' id = "profile">

                            <div class='thumbnail'>

                                
                                <img src='<?php echo $memberInfo[8]."/".$memberInfo[7]; ?>' class = 'img-circle' height = "200px" width ="200px">


                                <div class='caption' >
                                    <h3><?php echo $memberInfo[0]." ".$memberInfo[1]. "(". $memberInfo[2].")"; ?></h3>

                                    <h4 style="font-family: Courgette "><?php echo $memberInfo[5].", ".$memberInfo[4]; ?> </h4>
                                    
                                </div>



                            </div>

                    </div>

                </div>


                <div class="col-lg-12" id="memberDetails">

                    <div class="col-lg-4">


                      <div class="card bg-primary">

                        <div class="card-header">
                            <h3 class ="text-center" style="font-family: Courgette ">Contacts</h3>
                        </div>

                        <div class="card-body">

                          <h5 class="card-text">Email Address: <?php echo $_SESSION['member_email']; ?> </h5>

                          <h5 class="card-text">Website: <?php echo $memberInfo[3]; ?></h5>

                        </div>

                      </div>

                    </div>



                    <div class="col-lg-4">

                      <div class="card bg-primary">

                         <div class="card-header">
                            <h3 class ="text-center" style="font-family: Courgette ">Skills</h3>
                        </div>

                        <div class="card-body">

                          <h5 class="card-text"> <?php echo $memberInfo[6]; ?></h5>

                        </div>

                      </div>

                    </div>    



                    <div class="col-lg-4">

                      <div class="card bg-primary">

                         <div class="card-header">
                            <h3 class ="text-center" style="font-family: Courgette ">Activity</h3>
                        </div>

                        <div class="card-body ">

                          <h5 class="card-text">Joined On: <?php echo $memberInfo[9]; ?></h5>

                        </div>

                      </div>

                    </div>


                      
                </div>





            <?php

                require_once("tmp/footer.php");

                ?>
                        
                                