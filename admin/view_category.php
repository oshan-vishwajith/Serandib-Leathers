<?php 
include('../includes/connect.php');

if (isset($_GET['view_category'])) {

    $select_query="select * from categories";
    $result_select=mysqli_query($connection,$select_query);
    
    echo "<h2 class='d-flex justify-content-center align-items-center mt-2'>Category Details</h2>
              <div class='d-flex justify-content-center align-items-center'>
              <div class='container border rounded p-3' style='width: 1500px; background-color: #f8f9fa;'>";
    
    
              echo "
                    
              <div class='row align-items-center' style='height: 100px;'>
           
                  <div class='col-2'>
                      <h5>Category ID</h5>
                  </div>
    
                         <div class='col-4 '>
                      <h5>Category title</h5>
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
        $category_id = $row['category_id'];
        $category_title = $row['category_title'];
    
    
        echo "
                    
                    <div class='row align-items-center' style='height: 100px;'>
                 
                        <div class='col-2'>
                            <h5>$category_id</h5>
                        </div>
    
                               <div class='col-4 mx-3'>
                            <h5>$category_title</h5>
                        </div>
    
                
                               <div class='col-2'>
                            <a href='index.php?update_category=$category_id'><i class='fa-solid fa-pen-to-square'></i></a>
                        </div>
    
                               <div class='col-2 '>
                            <a href='index.php?delete_category=$category_id'><i class='fa-solid fa-trash'></i></a>
                        </div>
    
                       
                        
                    </div>
                    <hr>";
    
    
    }


}


?>