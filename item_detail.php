<?php
include('includes/connect.php');
include('funtions/common.php');
session_start();

if (isset($_GET['buy_now'])) {
  if (!isset($_SESSION['username'])) {
    header('Location: ./user_area/user_login.php');
    exit();
  } else {
    if (isset($_GET['options']) && isset($_GET['qty']) && isset($_GET['item_id'])) {
      $item_id = $_GET['item_id'];

      $select_item = "SELECT * FROM item WHERE item_id=$item_id";
      $result_query = mysqli_query($connection, $select_item);
      $row = mysqli_fetch_assoc($result_query);
      $item_title = $row['item_title'];
      $item_price = $row['item_price'];

      $color_selected = $_GET['options'];
      $size = $_GET['size'];
      $qty = $_GET['qty'];
      $total_price = $item_price * $qty;

      $_SESSION['colors'] = $color_selected;
      $_SESSION['qty'] = $qty;
      $_SESSION['size'] = $size;
      $_SESSION['item_price'] = $item_price;
      $_SESSION['total_price'] = $total_price;
      $_SESSION['item_id'] = $item_id;
      $_SESSION['item_title'] = $item_title;

      header('Location: payment.php');
      exit();
    }
  }
}

addToCart();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Item Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">

</head>

<body style="background-color: #E5E4E2;">
  <div class="container-fluid">

  <?php navbar(); ?>

 

    <div>

      <?php
      if (isset($_GET['item_id'])) {
        $item_id = $_GET['item_id'];

        $select_item = "select * from item where item_id=$item_id";
        $result_query = mysqli_query($connection, $select_item);
        while ($row = mysqli_fetch_assoc($result_query)) {
          $item_title = $row['item_title'];
          $item_description = $row['item_description'];
          $category_id = $row['category_id'];
          $batch_id = $row['batch_id'];
          $item_price = $row['item_price'];
          $item_old_price = $row['item_old_price'];
          $item_sold = $row['item_sold'];
          $star = $row['star'];
          $item_image1 = $row['item_image1'];
          $item_image2 = $row['item_image2'];
          $item_image3 = $row['item_image3'];
          $item_image4 = $row['item_image4'];

          $select_color = "select * from color where item_id=$item_id";
          $color_query = mysqli_query($connection, $select_color);
          $num_row = mysqli_num_rows($color_query);


          echo " <form method='GET' action='item_detail.php'>
          <input type='hidden' name='item_id' value='$item_id'>
          <div class = 'card-wrapper'>
       <div class = 'card'>
          <div class = 'product-imgs'>
            <div class = 'img-display'>
              <div class = 'img-showcase'>
                <img src='admin/item_images/$item_image1' alt='$item_image1'>
                 <img src='admin/item_images/$item_image2' alt='$item_image2'>
                  <img src='admin/item_images/$item_image3' alt='$item_image3'>
                   <img src='admin/item_images/$item_image4' alt='$item_image4'>
              </div>
            </div>
            <div class = 'img-select'>
              <div class = 'img-item'>
                <a href = '#' data-id = '1'>
                <img src='admin/item_images/$item_image1' alt='$item_image1'>
                </a>
              </div>
              <div class = 'img-item'>
                <a href = '#' data-id = '2'>
                 <img src='admin/item_images/$item_image2' alt='$item_image2'>
                </a>
              </div>
              <div class = 'img-item'>
                <a href = '#' data-id = '3'>
                  <img src='admin/item_images/$item_image3' alt='$item_image3'>
                </a>
              </div>
              <div class = 'img-item'>
                <a href = '#' data-id = '4'>
                   <img src='admin/item_images/$item_image4' alt='$item_image4'>
                </a>
              </div>
            </div>
          </div>
          <div class = 'product-content'>
            <h2 class = 'product-title'>$item_title</h2>
            <div class = 'product-rating'>
              <i class = 'fas fa-star'></i>
              <i class = 'fas fa-star'></i>
              <i class = 'fas fa-star'></i>
              <i class = 'fas fa-star'></i>
              <i class = 'fas fa-star-half-alt'></i>
              <span>4.7(21)</span>
            </div>

            <div class = 'product-price'>
              <p class = 'last-price'>Old Price: <span>Rs.$item_old_price</span></p>
              <p class = 'new-price'>New Price: <span>Rs.$item_price </span></p>
            </div>";

          if ($batch_id == 1 || $batch_id == 2) {
            echo " <div class='size-container'>
            <h5 class='m-3'>Size</h5>
            <label class='radio-label m-2'>
                <input type='radio' name='size' value='M' required>
                M
            </label>
            <label class='radio-label m-2'>
                <input type='radio' name='size' value='L'>
                L
            </label>
            <label class='radio-label m-2'>
                <input type='radio' name='size' value='XL'>
                XL
            </label>
            <label class='radio-label m-2'>
                <input type='radio' name='size' value='XXL'>
                XXL
            </label>
          </div>";
          }




          echo "<h5 class='my-2'>Colors</h5>";


          if ($num_row == 1) {

            while ($data = mysqli_fetch_assoc($color_query)) {
              $color_value = $data['color'];
            }

            echo "
   
                <div class='form-check form-check-inline m->  m-3'>
                  <input
                    class='form-check-input'
                    type='radio'
                    name='options'
                    id='defaultRadioSwitch'
                    value='$color_value'
                    checked
                    autocomplete='off'
                   required
                  />
                  <label class='form-check-label' for='defaultRadioSwitch'>
                   $color_value
                  </label>
                </div>
               ";
          } else {

            while ($data = mysqli_fetch_assoc($color_query)) {
              $color_value = $data['color'];
              echo "
   
    <div class='form-check form-check-inline m->  m-3'>
      <input
        class='form-check-input'
        type='radio'
        name='options'
        id='defaultRadioSwitch'
        value='$color_value'
        autocomplete='off'
       required
      />
      <label class='form-check-label' for='defaultRadioSwitch'>
       $color_value
      </label>
    </div>
   ";
            }
          }



          echo "<div class = 'product-detail'>
              <h2>about this item: </h2>
              <p>$item_description</p>
            </div>

            <div class = 'purchase-info'>
              <input type = 'number' min = '1' value = '1' name='qty'>
           
              <a href='index.php?add_to_cart=$item_id' class='btn btn-warning'>Add To Cart</a>
              <button type = 'submit' name='buy_now' value='$item_id' class = 'btn btn-danger'> Buy Now</button>
              </form>
            </div>

            <div class = 'social-links'>
              <p> Share At: </p>
              <a href = '#'>
                <i class = 'fab fa-facebook-f'></i>
              </a>
              <a href = '#'>
                <i class = 'fab fa-twitter'></i>
              </a>
              <a href = '#'>
                <i class = 'fab fa-instagram'></i>
              </a>
              <a href = '#'>
                <i class = 'fab fa-whatsapp'></i>
              </a>
              <a href = '#'>
                <i class = 'fab fa-pinterest'></i>
              </a>
            </div>
          </div>
        </div>
      </div>";
        }
      } else {
        echo "Item not found.";
      }

      ?>
    </div>
  </div>

  <script src='script.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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


</body>

</html>