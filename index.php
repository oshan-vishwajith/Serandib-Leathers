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
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./Header.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />

  <style>
    /* Card Styles */

    .card-link {
      text-decoration: none;
      color: inherit;
      display: block;
    }

    .pro {
      width: 22%;
      min-width: 300px;
      left: 10px;
      padding: 5px 5px;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.02);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      position: relative;
    }

    .pro:hover {
      transform: scale(1.05);
      box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.1);
    }

    .card {
      width: 100%;
      margin: 0 auto;
    }

    .card-img-top {
      height: 200px;
      object-fit: cover;
    }


    .pro:hover .card-popup {
      display: block;
    }



    .slick-prev,
    .slick-next {
      width: 40px;
      height: 40px;
      line-height: 40px;
      font-size: 30px;
      color: black !important;
      background-color: floralwhite !important;
      border: none !important;
      border-radius: 50% !important;
      z-index: 2 !important;
      position: absolute !important;
      top: 50% !important;
      transform: translateY(-50%) !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
    }

    .slick-prev {
      left: 10px !important;
    }

    .slick-next {
      right: 10px !important;
    }

    .slick-prev::before,
    .slick-next::before {
      display: none !important;
    }

    .slick-prev i,
    .slick-next i {
      font-size: 20px !important;
      line-height: 20px !important;
    }

    
@media (max-width:1225px) {

  
  
  .pro {
      width: 22%;
      min-width: 150px;
      left: 10px;
      padding: 5px 5px;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.02);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      position: relative;
    }

}

    



  </style>

</head>

<body style="background-color: #E5E4E2;">

  <div class="container-fluid">
    <?php navbar();
    addToCart(); ?>

    <div class="hero">
      <div class="content">
        <h1 class="delay">Leather That Lasts,<span class="line-break"></span> Style That Stays</h1>
        <p class="delay para">Invest in quality. Our handcrafted leather items are <span class="line-break"></span> 
        designed to withstand the test of time, <span class="line-break"></span> becoming more beautiful with age.</p>
      </div>
      <img src="girl.png" class="hero_img delay">
    </div>

    <div class="row">
    <a href="Best_seller.php" style="text-decoration: none; color: inherit;"><h2 class="topic">Best Sellers</h2></a>
      <hr class='border-bottom border-5 border-dark'>
      <div class="slider-container">
        <div class="slider">
          <?php
          $select_order = "SELECT item_id FROM orders";
          $result_order = mysqli_query($connection, $select_order);
          while ($row_order = mysqli_fetch_assoc($result_order)) {
            $item_id = $row_order['item_id'];

            $select_item = "SELECT * FROM item WHERE item_id = $item_id";
            $result_query = mysqli_query($connection, $select_item);
            while ($row = mysqli_fetch_assoc($result_query)) {

              $item_title = $row['item_title'];
              $item_description = $row['item_description'];
              $category_id = $row['category_id'];
              $batch_id = $row['batch_id'];
              $item_price = $row['item_price'];
              $item_image1 = $row['item_image1'];

              echo "<div class='pro'>
                <a href='item_detail.php?item_id=$item_id' class='card-link'>
                    <div class='card'>
                        <img src='admin/item_images/$item_image1' class='card-img-top' alt='$item_image1'>
                        <div class='card-body'>
                            <h5 class='card-title'>$item_title</h5>
                            <p>Rs. $item_price</p>
                            <a href='index.php?add_to_cart=$item_id' class='btn btn-warning'>Add To Cart</a>
                        </div>
                    </div>
                </a>
              </div>";
            }
          }
          ?>
        </div>
      </div>
      <a href="New_arrival.php" style="text-decoration: none; color: inherit;"><h2 class="topic">New Arrivals</h2></a>

      
      <hr class='border-bottom border-5 border-dark'>
      <div class="slider-container">
        <div class="slider">
          <?php 
          
          $select_item = "SELECT * FROM item WHERE category_id = 1 ORDER BY item_id DESC LIMIT 6";
          $result_query = mysqli_query($connection, $select_item);
          while ($row = mysqli_fetch_assoc($result_query)) {
              $item_id = $row['item_id'];
              $item_title = $row['item_title'];
              $item_description = $row['item_description'];
              $category_id = $row['category_id'];
              $batch_id = $row['batch_id'];
              $item_price = $row['item_price'];
              $item_image1 = $row['item_image1'];



              echo "<div class='pro'>
              <a href='item_detail.php?item_id=$item_id' class='card-link'>
                  <div class='card'>
                      <img src='admin/item_images/$item_image1' class='card-img-top' alt='$item_image1'>
                      <div class='card-body'>
                          <h5 class='card-title'>$item_title</h5>
                          <p>Rs. $item_price</p>
                          <a href='index.php?add_to_cart=$item_id' class='btn btn-warning'>Add To Cart</a>
                      </div>
                  </div>
              </a>
            </div>";
          }


          $select_item = "SELECT * FROM item WHERE category_id = 2 ORDER BY item_id DESC LIMIT 6";
          $result_query = mysqli_query($connection, $select_item);
          while ($row = mysqli_fetch_assoc($result_query)) {
              $item_id = $row['item_id'];
              $item_title = $row['item_title'];
              $item_description = $row['item_description'];
              $category_id = $row['category_id'];
              $batch_id = $row['batch_id'];
              $item_price = $row['item_price'];
              $item_image1 = $row['item_image1'];



              echo "<div class='pro'>
                <a href='item_detail.php?item_id=$item_id' class='card-link'>
                    <div class='card'>
                        <img src='admin/item_images/$item_image1' class='card-img-top' alt='$item_image1'>
                        <div class='card-body'>
                            <h5 class='card-title'>$item_title</h5>
                            <p>Rs. $item_price</p>
                            <a href='index.php?add_to_cart=$item_id' class='btn btn-warning'>Add To Cart</a>
                        </div>
                    </div>
                </a>
              </div>";
          }

          $select_item = "SELECT * FROM item WHERE category_id = 3 ORDER BY item_id DESC LIMIT 6";
          $result_query = mysqli_query($connection, $select_item);
          while ($row = mysqli_fetch_assoc($result_query)) {
              $item_id = $row['item_id'];
              $item_title = $row['item_title'];
              $item_description = $row['item_description'];
              $category_id = $row['category_id'];
              $batch_id = $row['batch_id'];
              $item_price = $row['item_price'];
              $item_image1 = $row['item_image1'];



              echo "<div class='pro'>
                <a href='item_detail.php?item_id=$item_id' class='card-link'>
                    <div class='card'>
                        <img src='admin/item_images/$item_image1' class='card-img-top' alt='$item_image1'>
                        <div class='card-body'>
                            <h5 class='card-title'>$item_title</h5>
                            <p>Rs. $item_price</p>
                            <a href='index.php?add_to_cart=$item_id' class='btn btn-warning'>Add To Cart</a>
                        </div>
                    </div>
                </a>
              </div>";
          }


          ?>
        </div>
      </div>
    </div>

    <?php include('footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>

    <script>
$(document).ready(function() {
    $('.slider').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 560,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

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


  </div>
  <script>
document.addEventListener("DOMContentLoaded", function() {
    const toggleBtn = document.querySelector('.toggle_btn');
    const toggleBtnIcon = document.querySelector('.toggle_btn i');
    const dropDownMenu = document.querySelector('#navbar');

    if (toggleBtn) {
        toggleBtn.onclick = function() {
            dropDownMenu.classList.toggle('open');
        };
    }
});

  </script>
</body>

</html>