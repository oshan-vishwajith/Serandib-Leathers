<?php 
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
$category_title=$_POST['cat_title'];

$select_query="select * from categories where category_title='$category_title'";
$result_select=mysqli_query($connection,$select_query);
$number=mysqli_num_rows($result_select);

if ($number>0) {
    echo"<script>alert('Category Is Already Inside The Database')</script>";

}else{


$insert_query="insert into categories (category_title) values('$category_title')";
$result=mysqli_query($connection,$insert_query);

if ($result) {
    echo "<script>window.open('index.php?insert_category','_self')</script>";
}

}
}


?> 

<h2 class="text-center my-5">Insert Category</h2>
<form action="" method="post" class="mb-2">

<div class="input-group w-90 mb-2 my-3">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="cat_title" placeholder="Insert Category" aria-label="username" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10 mb-2 m-auto">
    <input type="submit" class="btn btn-primary" name="insert_cat" value="Insert Category" aria-label="username" aria-describedby="basic-addon1" class="bg-info">
</div>



</form>