<?php
include('../includes/connect.php');

if (isset($_GET['all_users'])) {

    echo "<h2 class='d-flex justify-content-center align-items-center m-5'>All Payment</h2>
          <div class='d-flex justify-content-center align-items-center min-vh-50'>
          <div class='container border rounded p-3' style='width: 2500px; background-color: #f8f9fa;'>";


          echo "
                
          <div class='row align-items-center' style='height: 100px;'>
       
              <div class='col-2'>
                  <h5>User ID</h5>
              </div>

                     <div class='col-2'>
                  <h5>Username</h5>
              </div>

                 <div class='col-2'>
                  <h5>Name</h5>
              </div>

                 <div class='col-2'>
                  <h5>Email</h5>
              </div>

                  <div class='col-2 ' >
                  <h5>Address</h5>
              </div>

                       <div class='col-2'>
                  <h5>Contact</h5>
              </div>


              
             
              
          </div>
          ";
          



      $select_query = "SELECT * FROM user";
      $result_query = mysqli_query($connection, $select_query);
      $num_row = mysqli_num_rows($result_query);

      while ($row = mysqli_fetch_assoc($result_query)) {

        $user_id=$row['user_id'];
        $username =$row['username'];
        $name =$row['name'];
        $user_email=$row['user_email'];
        $user_address =$row['user_address'];
        $user_mobille=$row['user_mobille'];
    


        echo "
                
                <div class='row align-items-center' style='height: 50px;'>
             
                    <div class='col-2'>
                        <h5>$user_id</h5>
                    </div>

                           <div class='col-2'>
                        <h5>$username</h5>
                    </div>

                       <div class='col-2'>
                        <h5>$name</h5>
                    </div>

                       <div class='col-2'>
                        <h5>$user_email</h5>
                    </div>

                        <div class='col-2'>
                        <h5>$user_address</h5>
                    </div>

                             <div class='col-2'>
                        <h5>$user_mobille</h5>
                    </div>

     
                </div>
                <hr>";
      }



}
