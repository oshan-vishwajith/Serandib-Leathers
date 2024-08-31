<?php
session_start();
include('includes/connect.php');
include('funtions/common.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script>
  
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./payment.css">
</head>
<body style="background-color: #E5E4E2;">


    <div class="container">

        <div class="title">
            <h4>Select a <span style="color: #6064b6">Payment</span> method:</h4>
        </div>

        <form id="paymentForm" action="" method="post">
            <input type="radio" name="payment" id="visa" value="1">
            <input type="radio" name="payment" id="mastercard" value="2">
            <input type="radio" name="payment" id="paypal" value="3">
            <input type="radio" name="payment" id="COD" value="4">

            <div class="category">
                <label for="visa" class="visaMethod">
                    <div class="imgName">
                        <div class="imgContainer visa">
                            <img src="Payments/Visa-Card.png" alt="">
                        </div>
                        <span class="name">VISA</span>
                    </div>
                    <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                </label>

                <label for="mastercard" class="mastercardMethod">
                    <div class="imgName">
                        <div class="imgContainer mastercard">
                            <img src="Payments/mastercard.jpg" alt="">
                        </div>
                        <span class="name">Mastercard</span>
                    </div>
                    <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                </label>

                <label for="paypal" class="paypalMethod">
                    <div class="imgName">
                        <div class="imgContainer paypal">
                            <img src="Payments/paypal.png" alt="">
                        </div>
                        <span class="name">Paypal</span>
                    </div>
                    <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                </label>

                <label for="COD" class="CODMethod">
                    <div class="imgName">
                        <div class="imgContainer COD">
                            <img src="Payments/cod.jpg" alt="">
                        </div>
                        <span class="name">Cash On Delivery</span>
                    </div>
                    <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                </label>
                <br>
            </div>

            <div>
                <button id="nextButton" class="btn btn-primary" name="next" type="button">Next</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('nextButton').addEventListener('click', function() {
            var selectedPayment = document.querySelector('input[name="payment"]:checked').value;
            switch (selectedPayment) {
                case '1':
                    window.location.href = 'debitcard.php';
                    break;
                case '2':
                    window.location.href = 'creditcard.php';
                    break;
                case '3':
                    window.open('https://www.paypal.com/signin', '_blank');
                    break;
                case '4':
                    window.location.href = 'cod.php';
                    break;
                default:
                    alert('Please select a payment method.');
                    break;
            }
        });
    </script>

</body>
</html>
