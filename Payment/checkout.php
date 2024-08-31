<?php
include('includes/connect.php');
include('funtions/common.php');

addToCart();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leather Is good</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./Header.css">

</head>

<body style="background-color: #E5E4E2;">
    <div class="container-fluid">
        <section id="header">
            <a href=""><img src="./img/logo2.jpg" alt="" class="logo"></a>
            <a class="navbar-brand" href="#"></a>
            <div>
                <ul id="navbar">
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu">
                            <?php
                            $select_category = "select * from categories";
                            $result_category = mysqli_query($connection, $select_category);
                            while ($row_data = mysqli_fetch_assoc($result_category)) {
                                $category_title = $row_data['category_title'];
                                $category_id = $row_data['category_id'];

                                echo "<li class='dropend'>
                                        <a class='dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>$category_title</a>
                                        <ul class='dropdown-menu'>";

                                $select_batch = "select * from batch";
                                $result_batch = mysqli_query($connection, $select_batch);
                                while ($row_data = mysqli_fetch_assoc($result_batch)) {
                                    $batch_title = $row_data['batch_title'];
                                    $batch_id = $row_data['batch_id'];
                                    echo "  <li><a class='dropdown-item' href='{$category_title}_{$batch_title}.php'>$batch_title</a></li>
                                    <li>
                                        <hr class='dropdown-divider' />
                                    </li>";
                                }

                                echo "     </ul>
                                            </li>
                                                 <li>
                                            <hr class='dropdown-divider' />
                                        </li>";
                            }
                            ?>


                            <li class=''>
                                <a class=' ' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Other</a>

                            </li>
                        </ul>
                    </li>
                    <li><a href="/newarrivals">New Arrivals</a></li>
                    <li><a href="/bestsellers">Best Sellers</a></li>
                    <li class="p-0 ms-2"><a href="/create">Create</a></li>
                    <li class="p-0 me-3"><a href="/login">/LogIn</a></li>
                    <li><a href='cart.php'><i class='fa-solid fa-cart-shopping'></i><sup> <?php cartCount() ?></sup></a></li>



                    <form class="d-flex search-wrapper " role="search">
                        <input type="search" name="searchitem" id="searchitem" class="form-control" placeholder="Search" aria-label="Search">
                        <div id="searchlist"></div>
                    </form>
                </ul>
            </div>

        </section>


        <div class="row">
            <?php
         if (!isset($_SESSION['username'])) {
            include('./user_area/user_login.php');
         }
         else {
            include('payment.php');
         }
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