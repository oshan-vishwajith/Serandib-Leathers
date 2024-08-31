<?php
include('../includes/connect.php');

if (isset($_GET['all_payment'])) {

    echo "<h2 class='d-flex justify-content-center align-items-center m-5'>All Payment</h2>
          <div class='d-flex justify-content-center align-items-center min-vh-50'>
          <div class='container border rounded p-3' style='width: 2500px; background-color: #f8f9fa;'>";


          echo "
                
          <div class='row align-items-center' style='height: 100px;'>
       
              <div class='col-2'>
                  <h5>Invoice Number</h5>
              </div>

                     <div class='col-1'>
                  <h5>Item title</h5>
              </div>

                 <div class='col-1'>
                  <h5>Color</h5>
              </div>

                 <div class='col-1'>
                  <h5>Size</h5>
              </div>

                  <div class='col-1 p-2 m-2' >
                  <h5>Item Price</h5>
              </div>

                       <div class='col-1 p-2 m-1'>
                  <h5>Total Price</h5>
              </div>

                                <div class='col-1 mx-2'>
                  <h5>Status</h5>
              </div>

                 <div class='col-2'>
                  <h5>Date</h5>
              </div>

              
             
              
          </div>
          ";
          



      $select_query = "SELECT * FROM orders";
      $result_query = mysqli_query($connection, $select_query);
      $num_row = mysqli_num_rows($result_query);

      while ($row = mysqli_fetch_assoc($result_query)) {

        $order_id=$row['order_id'];
        $item_id=$row['item_id'];
        $invoice_number=$row['invoice_number'];
        $color_selected=$row['color'];
        $size=$row['size'];
        $item_price=$row['item_price'];
        $total_price=$row['total_price'];
        $qty=$row['qty'];
        $item_title=$row['item_title'];
        $date=$row['date'];


        echo "
                
                <div class='row align-items-center' style='height: 50px;'>
             
                    <div class='col-2'>
                        <h5>$invoice_number</h5>
                    </div>

                           <div class='col-1'>
                        <h5>$item_title</h5>
                    </div>

                       <div class='col-1'>
                        <h5>$color_selected</h5>
                    </div>

                       <div class='col-1 mx-2'>
                        <h5>$size</h5>
                    </div>

                        <div class='col-1'>
                        <h5>Rs.$item_price</h5>
                    </div>

                             <div class='col-1'>
                        <h5>Rs.$total_price</h5>
                    </div>

                                      <div class='col-1 mx-2'>
                        <h5 class='status'>Completed</h5>
                    </div>

                       <div class='col-2 mx-2'>
                        <h5>$date</h5>
                    </div>


                   
                    
                </div>
                <hr>";
      }



}
