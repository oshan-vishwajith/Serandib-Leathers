<?php
ob_start();
session_start();
include('../includes/connect.php');
include('../funtions/common.php');



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- <script>
    window.history.forward();
</script> -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" type="text/css" href="pro.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="./scripts.js"></script>

</head>

<body style="background-color: rgb(247, 233, 233);">
  <div class="sidebar">
    <div class="profile">
      <img src="./pp.png" alt="Profile Picture">
      <span class="name"><b></b></span>
    </div>
    <hr>
    <a href="../index.php">Home</a>
    <a href="?edit_profile">Edit Profile</a>
    <a href="?orders">Orders</a>
    <a href="../cart.php">Cart</a>
    <a href="logout.php">Logout</a>
  </div>

  <div class="main-content">


    <?php
    if (isset($_GET['edit_profile'])) {


      $username = $_SESSION['username'];
     
  
      $select_query = "select * from user where username='$username'";
      $result_select = mysqli_query($connection, $select_query);
      $row_data = mysqli_fetch_assoc($result_select);
      $num_row = mysqli_num_rows($result_select);
      $user_id=$row_data['user_id'];
      $name=$row_data['name'];
      $user_email=$row_data['user_email'];
      $user_mobille=$row_data['user_mobille'];
     

      echo "<div class='wrapper'>
    <form action='' method='post'>
      <h1>User Profile</h1>
      <div class='container'>
        
      <div class='input-box'>
        <div class='input-field'>
          <input type='text'  placeholder='Full Name' name='name' value=$name required />
          <i class='bx bxs-user'></i>
        </div>
        <div class='input-field'>
          <input type='text' placeholder='User Name' name='username' value=$username required />
          <i class='bx bxs-user'></i>
        </div>
      </div>
      <div class='input-box'>
        <div class='input-field'>
          <input type='email' placeholder='Email' name='email' value=$user_email required />
          <i class='bx bxs-envelope'></i>
        </div>
        <div class='input-field'>
          <input type='text' inputmode='numeric' pattern='\d*' placeholder='Phone number' name='contact' value=$user_mobille required />
          <i class='bx bx-phone'></i>
        </div>
      </div>
      <div class='input-box'>
        <div class='input-field'>
          <input type='password' placeholder='New Password' name='password'  />
          <i class='bx bxs-lock-alt'></i>
        </div>
        <div class='input-field'>
          <input type='password' placeholder='Comfirm Password' name='confirm_password'  />
          <i class='bx bxs-lock-alt'></i>
        </div>
      </div>

      <button type='submit' name='update_user' class='btn'>Submit</button>
    </form>
  </div>";

  if(isset($_POST['update_user'])){


    $ip = getIPAddress();
    $username = $_POST['username'];
    $name=$_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'];
    $contact = $_POST['contact'];

    if ($password =="" || $confirm_password =="") {
      
      $insert_query = "update user set username='$username',name='$name',user_email='$email',
        user_mobille='$contact' where user_id=$user_id";

        $result_query = mysqli_query($connection, $insert_query);  
        if ($result_query) {
        
            echo "<script>window.open('profile.php?edit_profile','_self')</script>";
            $_SESSION['username']=$username;
        } else {
            die(mysqli_error($connection));
        }

    }

 elseif ($password != $confirm_password) {
        echo "<script>alert('Passwords do not match')</script>";
    } 
    else {

        $insert_query = "update user set username='$username',name='$name',user_email='$email',user_password='$hash_password',
        user_mobille='$contact' where user_id=$user_id";

        $result_query = mysqli_query($connection, $insert_query);  
        if ($result_query) {
        
            echo "<script>window.open('profile.php?edit_profile','_self')</script>";
            $_SESSION['username']=$username;
        } else {
            die(mysqli_error($connection));
        }
    }




  }

    }




    if (isset($_GET['orders'])) {

      echo "<h2 class='d-flex justify-content-center align-items-center mt-2'>Order Details</h2>
          <div class='d-flex justify-content-center align-items-center min-vh-100'>
          <div class='container border rounded p-3' style='width: 2000px; background-color: #f8f9fa;'>";


      echo "
                
          <div class='row align-items-center' style='height: 100px;'>
       
              <div class='col-3'>
                  <h5>Invoice Number</h5>
              </div>

                     <div class='col-2'>
                  <h5>Item title</h5>
              </div>

                 <div class='col-1'>
                  <h5>Color</h5>
              </div>

                 <div class='col-1'>
                  <h5>Size</h5>
              </div>

                  <div class='col-1 p-2 m-2' >
                  <h5>Item Price</h5>
              </div>

                       <div class='col-1 p-2 m-1'>
                  <h5>Total Price</h5>
              </div>

          

                 <div class='col-2'>
                  <h5>Date</h5>
              </div>

              
             
              
          </div>
          ";



      $user_id = $_SESSION['user_id'];
      $select_query = "SELECT * FROM orders WHERE user_id=$user_id";
      $result_query = mysqli_query($connection, $select_query);
      $num_row = mysqli_num_rows($result_query);

      while ($row = mysqli_fetch_assoc($result_query)) {

        $order_id = $row['order_id'];
        $item_id = $row['item_id'];
        $invoice_number = $row['invoice_number'];
        $color_selected = $row['color'];
        $size = $row['size'];
        $item_price = $row['item_price'];
        $total_price = $row['total_price'];
        $qty = $row['qty'];
        $item_title = $row['item_title'];
        $date = $row['date'];


        echo "
                
                <div class='row align-items-center' style='height: 50px;'>
             
                    <div class='col-3'>
                        <h5>$invoice_number</h5>
                    </div>

                           <div class='col-2'>
                        <h5>$item_title</h5>
                    </div>

                       <div class='col-1'>
                        <h5>$color_selected</h5>
                    </div>

                       <div class='col-1 mx-2'>
                        <h5>$size</h5>
                    </div>

                        <div class='col-1'>
                        <h5>Rs.$item_price</h5>
                    </div>

                             <div class='col-1'>
                        <h5>Rs.$total_price</h5>
                    </div>

                

                       <div class='col-2'>
                        <h5>$date</h5>
                    </div>


                   
                    
                </div>
                <hr>";
      }
    }



    ?>
  </div>

  </div>


  </div>




</body>

</html>