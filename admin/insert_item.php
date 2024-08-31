<?php
include('../includes/connect.php');



if (isset($_POST['insert_item'])) {
    $item_title = mysqli_real_escape_string($connection, $_POST['item_title']); 
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $item_keyword = mysqli_real_escape_string($connection, $_POST['item_keyword']); 
    $item_category = $_POST['item_category'];
    $item_batch = $_POST['item_batch'];
    $item_price = $_POST['item_price'];
    $item_old_price = $_POST['item_old_price'];
    $star = $_POST['star'];
    $item_sold = $_POST['item_sold'];

    $item_image1 = $_FILES['item_image1']['name'];
    $item_image2 = $_FILES['item_image2']['name'];
    $item_image3 = $_FILES['item_image3']['name'];
    $item_image4 = $_FILES['item_image4']['name'];

    $temp_image1 = $_FILES['item_image1']['tmp_name'];
    $temp_image2 = $_FILES['item_image2']['tmp_name'];
    $temp_image3 = $_FILES['item_image3']['tmp_name'];
    $temp_image4 = $_FILES['item_image4']['tmp_name'];

    if (
        $item_old_price == '' || $star == 0 || $item_sold == 0 || $item_title == '' || 
        $description == '' || $item_keyword == '' || $item_category == '' ||
        $item_price == '' || $item_image1 == '' || $item_image2 == '' || $item_image3 == '' || $item_image4 == ''
    ) {
        echo "<script>alert('Fill All the Fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "item_images/$item_image1");
        move_uploaded_file($temp_image2, "item_images/$item_image2");
        move_uploaded_file($temp_image3, "item_images/$item_image3");
        move_uploaded_file($temp_image4, "item_images/$item_image4");

        $insert_items = "INSERT INTO item (item_title,item_description,item_keyword,category_id,batch_id,item_image1,item_image2,item_image3,item_image4,item_price,item_old_price,item_sold,star,date) 
        VALUES ('$item_title', '$description', '$item_keyword', '$item_category', 
        '$item_batch', '$item_image1', '$item_image2', '$item_image3', '$item_image4', '$item_price', 
        '$item_old_price', $item_sold, $star, NOW())";
        

        $result_query = mysqli_query($connection, $insert_items);

        if ($result_query) {
            $item_id = mysqli_insert_id($connection);

            if (isset($_POST['color'])) {
                $color = $_POST['color'];

                foreach ($color as $item_color) {
                    $insert_color = "INSERT INTO color (item_id,color) VALUES ('$item_id', '$item_color')";
                    $color_result = mysqli_query($connection, $insert_color);
                }
                echo "<script>alert('success')</script>";

                echo "<script>window.open('index.php','_self')</script>";

            }
        } else {
            echo "<script>alert('Item Insertion Failed')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard Insert Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./Header.css">
</head>
<body class="bg-light">
    <div class="container mt-2">
   
        <a href="index.php" class="btn btn btn-primary"><- Bach To Admin</a>
        <h1 class="text-center">Insert Item</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="item_title" class="form-label">Item Title</label>
                <input type="text" name="item_title" id="item_title" class="form-control" placeholder="Enter Title" autocomplete="off" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Item Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter Description" autocomplete="off" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="item_keyword" class="form-label">Item Keyword</label>
                <input type="text" name="item_keyword" id="item_keyword" class="form-control" placeholder="Enter Item Keyword" autocomplete="off" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="item_category" class="form-select" id="">
                    <option value="">Select Category</option>
                    <?php
                    $select_query = "SELECT * FROM categories";
                    $result_category = mysqli_query($connection, $select_query);
                    while ($row_data = mysqli_fetch_assoc($result_category)) {
                        $category_title = $row_data['category_title'];
                        $category_id = $row_data['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    
                    ?>

                </select>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="item_batch" class="form-select" id="">
                    <option value="">Select Batch</option>
                    <?php
                    $select_query = "SELECT * FROM batch";
                    $result_batch = mysqli_query($connection, $select_query);
                    while ($row_data = mysqli_fetch_assoc($result_batch)) {
                        $batch_title = $row_data['batch_title'];
                        $batch_id = $row_data['batch_id'];
                        echo "<option value='$batch_id'>$batch_title</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="item_image1" class="form-label">Image 1</label>
                <input type="file" name="item_image1" id="item_image1" class="form-control" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="item_image2" class="form-label">Image 2</label>
                <input type="file" name="item_image2" id="item_image2" class="form-control" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="item_image3" class="form-label">Image 3</label>
                <input type="file" name="item_image3" id="item_image3" class="form-control" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="item_image4" class="form-label">Image 4</label>
                <input type="file" name="item_image4" id="item_image4" class="form-control" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="item_price" class="form-label">Item Price</label>
                <input type="text" name="item_price" id="item_price" class="form-control" placeholder="Enter Item Price" autocomplete="off" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="item_old_price" class="form-label">Item Old Price</label>
                <input type="text" name="item_old_price" id="item_old_price" class="form-control" placeholder="Enter Old Item Price" autocomplete="off" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="item_sold" class="form-label">Item Sold</label>
                <input type="text" name="item_sold" id="item_sold" class="form-control" placeholder="Enter Sold Items" autocomplete="off" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="star" class="form-label">Rating Stars</label>
                <input type="text" name="star" id="star" class="form-control" placeholder="Enter Stars out of 5" autocomplete="off" required>
            </div> 

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="color">Colors</label><br>
                <div class="form-group mb-3">
                    <input type="checkbox" class="m-1" name="color[]" value="black" autocomplete="off">Black<br>
                    <input type="checkbox" class="m-1" name="color[]" value="brown" autocomplete="off">Brown<br>          
                    <input type="checkbox" class="m-1" name="color[]" value="purple" autocomplete="off">Purple<br>
                    <input type="checkbox" class="m-1" name="color[]" value="pink" autocomplete="off">Pink<br>

                    <input type="checkbox" class="m-1" name="color[]" value="red" autocomplete="off">Red<br>
                    <input type="checkbox" class="m-1" name="color[]" value="green" autocomplete="off">Green<br>          
                    <input type="checkbox" class="m-1" name="color[]" value="blue" autocomplete="off">Blue<br>
                    <input type="checkbox" class="m-1" name="color[]" value="gold" autocomplete="off">Gold<br>

                    <input type="checkbox" class="m-1" name="color[]" value="white" autocomplete="off">White<br>
                    <input type="checkbox" class="m-1" name="color[]" value="grey" autocomplete="off">Grey<br>          
                    <input type="checkbox" class="m-1" name="color[]" value="yellow" autocomplete="off">Yellow<br>
                    <input type="checkbox" class="m-1" name="color[]" value="cream" autocomplete="off">Cream<br>

                </div>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_item" class="btn btn-primary" value="Insert Item">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
