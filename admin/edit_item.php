<?php
include('../includes/connect.php');


$item_id=$_GET['update'];

$select_query = "select * from item where item_id=$item_id";
$result_select = mysqli_query($connection, $select_query);
$row = mysqli_fetch_assoc($result_select);
$item_id = $row['item_id'];
$item_title = $row['item_title'];
$item_keyword = $row['item_keyword'];

$item_description = $row['item_description'];
$category_old_id = $row['category_id'];
$batch_old_id = $row['batch_id'];
$item_price = $row['item_price'];
$item_old_price = $row['item_old_price'];   
$item_image1 = $row['item_image1'];
$item_image2 = $row['item_image2'];
$item_image3 = $row['item_image3'];
$item_image4 = $row['item_image4'];


// $select_color = "select * from color where item_id=$item_id";
// $color_query = mysqli_query($connection, $select_color);
// $num_row = mysqli_num_rows($color_query);

$select_category_query = "SELECT * FROM categories where category_id=$category_old_id";
$result_category = mysqli_query($connection, $select_category_query);
$row_data = mysqli_fetch_assoc($result_category);
$category_old_title = $row_data['category_title'];


$select_batch_query = "SELECT * FROM batch where batch_id=$batch_old_id";
$result_batch = mysqli_query($connection, $select_batch_query);
$row_data = mysqli_fetch_assoc($result_batch);
$batch_old_title = $row_data['batch_title'];


?>


<div class="container mt-2">
    <h1 class="text-center">Edit Item</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="item_title" class="form-label">Item Title</label>
            <input type="text" name="item_title" id="item_title" class="form-control" value="<?php echo"$item_title"; ?>" placeholder="Enter Title" autocomplete="off" required>
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="description" class="form-label">Item Description</label>
            <input type="text" name="description" id="description" class="form-control" value="<?php echo"$item_description"; ?>" placeholder="Enter Description" autocomplete="off" required>
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="item_keyword" class="form-label">Item Keyword</label>
            <input type="text" name="item_keyword" id="item_keyword" class="form-control" value="<?php echo"$item_keyword"; ?>" placeholder="Enter Item Keyword" autocomplete="off" required>
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="item_category" class="form-label">Item Category</label>

            <select name="item_category" class="form-select" id="">
                <option value="<?php echo"$category_old_id"; ?>"><?php echo"$category_old_title"; ?></option>
                <?php
                $select_query = "SELECT * FROM categories";
                $result_category = mysqli_query($connection, $select_query);
                while ($row_data = mysqli_fetch_assoc($result_category)) {
                    $category_title = $row_data['category_title'];
                    $category_id = $row_data['category_id'];
                    if ($category_old_id===$category_id) {
                        continue;
                    }
                    echo "<option value='$category_id'>$category_title</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="item_batch" class="form-label">Item Batch</label>

            <select name="item_batch" class="form-select" id="">
            <option value="<?php echo"$batch_old_id"; ?>"><?php echo"$batch_old_title"; ?></option>
            <?php
                $select_query = "SELECT * FROM batch";
                $result_batch = mysqli_query($connection, $select_query);
                while ($row_data = mysqli_fetch_assoc($result_batch)) {
                    $batch_title = $row_data['batch_title'];
                    $batch_id = $row_data['batch_id'];
                    if ($batch_old_id===$batch_id) {
                        continue;
                    }
                    echo "<option value='$batch_id'>$batch_title</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="item_image1" class="form-label">Image 1</label>
            <div class="d-flex">
                <input type="file" name="item_image1" id="item_image1" class="form-control w-90 m-auto" required>
                <?php echo " <img src='./item_images/$item_image1 ' alt='$item_image1' class='rowimg mx-2'>"; ?>
            </div>
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="item_image2" class="form-label">Image 2</label>
            <div class="d-flex">
                <input type="file" name="item_image2" id="item_image2" class="form-control w-90 m-auto" required>
                <?php echo " <img src='./item_images/$item_image2 ' alt='$item_image2' class='rowimg mx-2'>"; ?>
            </div>
        </div>


        <div class="form-outline mb-4 w-50 m-auto">
            <label for="item_image3" class="form-label">Image 3</label>
            <div class="d-flex">
                <input type="file" name="item_image3" id="item_image3" class="form-control w-90 m-auto" required>
                <?php echo " <img src='./item_images/$item_image3 ' alt='$item_image3' class='rowimg mx-2'>"; ?>
            </div>
        </div>



        <div class="form-outline mb-4 w-50 m-auto">
            <label for="item_image4" class="form-label">Image 4</label>
            <div class="d-flex">
                <input type="file" name="item_image4" id="item_image4" class="form-control w-90 m-auto" required>
                <?php echo " <img src='./item_images/$item_image4 ' alt='$item_image4' class='rowimg mx-2'>"; ?>
            </div>
        </div>


        <div class="form-outline mb-4 w-50 m-auto">
            <label for="item_price" class="form-label">Item Price</label>
            <input type="text" name="item_price" id="item_price" class="form-control" value=<?php echo"$item_price"; ?> placeholder="Enter Item Price" autocomplete="off" required>
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="item_old_price" class="form-label">Item Old Price</label>
            <input type="text" name="item_old_price" id="item_old_price" class="form-control" value=<?php echo"$item_old_price"; ?> placeholder="Enter Old Item Price" autocomplete="off" required>
        </div>

        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="update_item" class="btn btn-primary" value="Update Item">
        </div>
    </form>
</div>



<?php 
if (isset($_POST['update_item'])) {
    
    $item_title = mysqli_real_escape_string($connection, $_POST['item_title']); 
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $item_keyword = mysqli_real_escape_string($connection, $_POST['item_keyword']); 
    $item_category = $_POST['item_category'];
    $item_batch = $_POST['item_batch'];
    $item_price = $_POST['item_price'];
    $item_old_price = $_POST['item_old_price'];


    $item_image1 = $_FILES['item_image1']['name'];
    $item_image2 = $_FILES['item_image2']['name'];
    $item_image3 = $_FILES['item_image3']['name'];
    $item_image4 = $_FILES['item_image4']['name'];

    $temp_image1 = $_FILES['item_image1']['tmp_name'];
    $temp_image2 = $_FILES['item_image2']['tmp_name'];
    $temp_image3 = $_FILES['item_image3']['tmp_name'];
    $temp_image4 = $_FILES['item_image4']['tmp_name'];


    move_uploaded_file($temp_image1, "item_images/$item_image1");
    move_uploaded_file($temp_image2, "item_images/$item_image2");
    move_uploaded_file($temp_image3, "item_images/$item_image3");
    move_uploaded_file($temp_image4, "item_images/$item_image4");

    $update_item="update item set item_title='$item_title',item_description='$description',
    item_keyword='$item_keyword',category_id=$item_category,batch_id=$item_batch,
    item_image1='$item_image1',item_image2='$item_image2',item_image3='$item_image3',item_image4='$item_image4',
    item_price=$item_price,item_old_price=$item_old_price where item_id=$item_id";


    $result_update=mysqli_query($connection,$update_item);

    if ($result_update) {
        echo "<script>window.open('index.php','_self')</script>";
    }

    else{
        echo "<script>alert('Faild item')</script>";
    }



}


?>