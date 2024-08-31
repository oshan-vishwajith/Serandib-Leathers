<?php
ob_start();
session_start();
include('includes/connect.php');
include('funtions/common.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./PayPages.css">
</head>

<body>
        <div class="wrapper">
            <div class="container">
                <form action="" method="post">
                    <h1>
                        <i class="fas fa-shipping-fast"></i>
                        Shipping Details
                    </h1>
                    <div class="name">
                        <div>
                            <label for="f-name">First Name</label>
                            <input type="text" name="f_name" placeholder="Jhon" required>
                        </div>
                        <div>
                            <label for="l-name" >Last Name</label>
                            <input type="text" name="l_name" placeholder="Dove" required>
                        </div>
                    </div>
                    <div class="street">
                        <label for="name">Street</label>
                        <input type="text" name="address" placeholder="131/B, Avenue Road" required>
                    </div>
                    <div class="address-info">
                        <div>
                            <label for="city">City</label>
                            <input type="text" name="city" placeholder="Homagama" required>
                        </div>
                        <div>
                            <label for="state">District</label>
                            <input type="text" name="state" placeholder="Colombo" required>
                        </div>
                        <div>
                            <label for="zip">Zip</label>
                            <input type="text" name="zip" placeholder="10500" required>
                        </div>
                    </div>
                    <h1>
                        <i class="far fa-credit-card"></i> Payment Information
                    </h1>
                    <div class="cc-num">
                        <label for="card-num">Credit Card No.</label>
                        <input type="text" name="card_num" placeholder="4568XXXX" required>
                    </div>

                    <div class="cc-num">
                        <label for="card-num">Card Holder Name</label>
                        <input type="text" name="card_name" placeholder="Jhon Dove" required>
                    </div>


                    <div class="cc-info">
                        <div>
                            <label for="card-num">Exp</label>
                            <input type="text" name="expire" placeholder="12/29" required>
                        </div>
                        <div>
                            <label for="card-num">CCV</label>
                            <input type="text" name="security" placeholder="123" required>
                        </div>
                    </div>
                    <label class="total" for="total">Total Payment= Rs.<?php echo $_SESSION['total_price'];?></label>

                    <div class="btns">
                    <button name="order" class=" btn btn-success my-2" type="submit" >Order</button>
                    <a href="cart.php" class="btn btn-primary">Back to cart</a>

                </div>
                </form>
            </div>
        </div>

</body>

</html>


<?php 

if (isset($_POST['order'])) {
   
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zip'];
$card_num=$_POST['card_num'];
$card_name=$_POST['card_name'];
$expire=$_POST['expire'];
$security=$_POST['security'];

$username = $_SESSION['username'];
$select_query = "SELECT * FROM user WHERE username='$username'";
$result_query = mysqli_query($connection, $select_query);
$row_data = mysqli_fetch_assoc($result_query);
$user_id = $row_data['user_id'];
$_SESSION['user_id'] = $user_id;


$color_selected = $_SESSION['colors'];
$qty = $_SESSION['qty'];
$item_price = $_SESSION['item_price'];
$total_price = $_SESSION['total_price'];
$item_id = $_SESSION['item_id'];
$item_title = $_SESSION['item_title'];
$size = $_SESSION['size'];
$invoice = mt_rand();
$invoice_number = '#' . $invoice;



$order_sql="insert into orders (item_id,user_id,invoice_number,color,size,item_price,total_price,qty,item_title,date)
values ('$item_id','$user_id','$invoice_number','$color_selected','$size','$item_price','$total_price',
'$qty','$item_title',NOW())";

$order_result=mysqli_query($connection,$order_sql);

$last_id = mysqli_insert_id($connection);
if($order_result){

    $payment_sql="insert into payment (order_id,user_id,f_name,l_name,address,city,state,zip,card_num,card_name,expire,security)
    values ('$last_id','$user_id','$f_name','$l_name','$address','$city','$state','$zip','$card_num','$card_name',
    '$expire','$security')";
    
    $payment_result=mysqli_query($connection,$payment_sql);

    if ($payment_result) {
        echo "<script>window.open('user_area/profile.php?orders','_self')</script>";
    }

    else{
        echo "<script>alert('error')</script>";

    }

}  else{
    echo "<script>alert('error')</script>";

}

}


?>
