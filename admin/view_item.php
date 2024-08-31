<?php 
include('../includes/connect.php');


if(isset($_GET['view_item'])){

$select_query="select * from item";
$result_select=mysqli_query($connection,$select_query);

echo "<h2 class='d-flex justify-content-center align-items-center mt-2'>Item Details</h2>
          <div class='d-flex justify-content-center align-items-center'>
          <div class='container border rounded p-3' style='width: 3000px; background-color: #f8f9fa;'>";


          echo "
                
          <div class='row align-items-center' style='height: 100px;'>
       
              <div class='col-2'>
                  <h5>Item ID</h5>
              </div>

                     <div class='col-2'>
                  <h5>Item title</h5>
              </div>

                <div class='col-2 '>
                  <h5>Item Price</h5>
              </div>

                 <div class='col-2 '>
                  <h5>Item Image</h5>
              </div>

               

                  <div class='col-2 ' >
                  <h5>Edit</h5>
              </div>

                       <div class='col-2'>
                  <h5>Delete</h5>
              </div>  
          </div>
          ";



while ($row=mysqli_fetch_assoc($result_select)) {
    $item_id = $row['item_id'];
    $item_title = $row['item_title'];
    $item_price = $row['item_price'];
    $item_image1 = $row['item_image1'];


    echo "
                
                <div class='row align-items-center' style='height: 100px;'>
             
                    <div class='col-2'>
                        <h5>$item_id</h5>
                    </div>

                           <div class='col-2'>
                        <h5>$item_title</h5>
                    </div>

                        <div class='col-2'>
                        <h5>Rs.$item_price</h5>
                    </div>

                             <div class='col-2'>
                             <img src='item_images/$item_image1' alt='$item_image1' class='rowimg'>
                        
                    </div>

                           <div class='col-2'>
                        <a href='index.php?update=$item_id'><i class='fa-solid fa-pen-to-square'></i></a>
                    </div>

                           <div class='col-2 '>
                        <a href='index.php?delete=$item_id'><i class='fa-solid fa-trash'></i></a>
                    </div>

                   
                    
                </div>
                <hr>";


}





}



?>