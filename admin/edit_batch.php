<?php 
include('../includes/connect.php');

if(isset($_GET['update_batch'])){

$batch_id=$_GET['update_batch'];

$select_query="select * from batch where batch_id=$batch_id";
$result_select=mysqli_query($connection,$select_query);
$row_data=mysqli_fetch_assoc($result_select);
$batch_title=$row_data['batch_title'];

}
?> 

<h2 class="text-center my-5">Edit Batch</h2>
<form action="" method="post" class="mb-2">

<div class="input-group w-90 mb-2 my-3">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="batch_title" value=<?php echo"$batch_title"; ?> aria-label="username" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10 mb-2 m-auto">
    <input type="submit" class="btn btn-primary" name="update_batch" value="Update Batch" aria-label="username" aria-describedby="basic-addon1" class="bg-info">
</div>



</form>


<?php 

if (isset($_POST['update_batch'])) {
    $new_batch_title=$_POST['batch_title'];

    $insert_query="update batch set batch_title=' $new_batch_title' where batch_id=$batch_id";
    $result_update=mysqli_query($connection,$insert_query);


    if ($result_update) {
        echo "<script>window.open('index.php?view_batch','_self')</script>";
    }

    else{
        echo "<script>alert('Faild item')</script>";
    }


}


?>