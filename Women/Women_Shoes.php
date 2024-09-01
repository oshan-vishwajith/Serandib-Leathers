<?php
ob_start();
session_start();
include('includes/connect.php');
include('funtions/common.php');



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Women's Shoe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./Header.css">

</head>

<body style="background-color: #E5E4E2;">
    <div class="container-fluid">

        <?php navbar(); ?>
        <h2 class="topic text-center mt-4">Women's Shoes</h2>
        <hr class='border-bottom border-5 border-dark'>

        <div class="row">
            <?php 
    $select_item = "select * from item where category_id=2 && batch_id=1";
    $result_query = mysqli_query($connection, $select_item);
    while ($row = mysqli_fetch_assoc($result_query)) {
        $item_id = $row['item_id'];
        $item_title = $row['item_title'];
        $item_description = $row['item_description'];
        $category_id = $row['category_id'];
        $batch_id = $row['batch_id'];
        $item_price = $row['item_price'];
        $item_image1 = $row['item_image1'];


        echo " <div class='col-xxl-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12 my-3 pro'>
                <a href='item_detail.php?item_id=$item_id' class='card-link'>
                    <div class='card'>
                        <img src='admin/item_images/$item_image1' class='card-img-top' alt='$item_image1'>
                        <div class='card-body'>
                            <h5 class='card-title'> $item_title</h5>
                            <p>Rs.$item_price</p>
                            <a href='index.php?add_to_cart= $item_id' class='btn btn-warning'>Add To Cart</a>
                        </div>
                    </div>
                </a>
            </div>";
    
            }


            addToCart();
            ?>
        </div>

     

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#searchitem').keyup(function() {
                var query = $(this).val();
                if (query != '') {
                    $.ajax({
                        url: "search.php",
                        method: "POST",
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#searchlist').fadeIn();
                            $('#searchlist').html(data);
                        }
                    });
                } else {
                    $('#searchlist').fadeOut();
                    $('#searchlist').html("");
                }
            });
            $(document).on('click', '#searchlist ul li', function() {
                $('#searchitem').val($(this).text());
                $('#searchlist').fadeOut();
            });
        });
    </script>
    <?php include('./footer.php'); ?>
</body>

</html>