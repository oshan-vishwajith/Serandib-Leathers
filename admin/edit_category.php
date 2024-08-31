<?php 
include('../includes/connect.php');

if(isset($_GET['update_category'])){

$category_id=$_GET['update_category'];

$select_query="select * from categories where category_id=$category_id";
$result_select=mysqli_query($connection,$select_query);
$row_data=mysqli_fetch_assoc($result_select);
$category_title=$row_data['category_title'];

}
?> 

<h2 class="text-center my-5">Edit Category</h2>
<form action="" method="post" class="mb-2">

<div class="input-group w-90 mb-2 my-3">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="cat_title" value=<?php echo"$category_title"; ?> aria-label="username" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10 mb-2 m-auto">
    <input type="submit" class="btn btn-primary" name="update_cat" value="Update Category" aria-label="username" aria-describedby="basic-addon1" class="bg-info">
</div>



</form>


<?php 

if (isset($_POST['update_cat'])) {
    $new_category_title=$_POST['cat_title'];

    $insert_query="update categories set category_title=' $new_category_title' where category_id=$category_id";
    $result_update=mysqli_query($connection,$insert_query);


    if ($result_update) {
        echo "<script>window.open('index.php?view_category','_self')</script>";
    }

    else{
        echo "<script>alert('Faild item')</script>";
    }


}


?>