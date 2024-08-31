<?php 
include('../includes/connect.php');
if(isset($_POST['insert_batch'])){
$batch_title=$_POST['batch_title'];

$select_query="select * from batch where batch_title='$batch_title'";
$result_select=mysqli_query($connection,$select_query);
$number=mysqli_num_rows($result_select);

if ($number>0) {
    echo"<script>alert('Batch Is Already Inside The Database')</script>";

}else{


$insert_query="insert into Batch (batch_title) values('$batch_title')";
$result=mysqli_query($connection,$insert_query);

if ($result) {
    echo "<script>window.open('index.php?insert_batch','_self')</script>";
}

}
}


?>



<h2 class="text-center my-5">Insert Batch</h2>
<form action="" method="post" class="mb-2">

<div class="input-group w-90 mb-2 my-3">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="batch_title" placeholder="Insert Batch" aria-label="batch" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10 mb-2 m-auto">
    <input type="submit" class="btn btn-primary" name="insert_batch" value="Insert Batch" aria-label="batch" aria-describedby="basic-addon1" class="bg-info">
</div>



</form>