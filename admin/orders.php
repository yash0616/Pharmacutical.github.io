<?php
session_start();
include("../db.php");

error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')

{
  $order_id=$_GET['order_id'];
  // echo $order_id;
  // exit;
$delete = "delete from orders_info where order_id = ".$order_id;
$query = mysqli_query($con,$delete);

} 

///pagination
$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
}

include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Orders  / Page <?php echo $page;?> </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                      <tr><th>Order Id</th><th>Customer Name</th><th> Email</th><th>Address</th><th>City</th><th>State</th><th>Zip Code</th><th>Quantity</th><th>Order Total</th> 
                    </tr></thead>
                    <tbody>
                      <?php 
                      $select="select * from orders_info";
                      $query= mysqli_query($con,$select);

                      while($data=mysqli_fetch_assoc($query))
                      {
                        ?>
                        <tr>
                        <td><?php echo $data['order_id'];?></td>
                        <td><?php echo $data['f_name'];?></td>
                        <td><?php echo $data['email'];?></td>
                        <td><?php echo $data['address'];?></td>
                        <td><?php echo $data['city'];?></td>
                        <td><?php echo $data['state'];?></td>
                        <td><?php echo $data['zip'];?></td>
                        <td><?php echo $data['prod_count'];?></td>
                        <td><?php echo $data['total_amt'];?></td>
                        
                        <!-- <td>
                          <a class=' btn btn-success' href='orders.php?order_id=<?php echo $data['order_id'];?>&action=delete' type='button' rel='tooltip' title=''>Delete</a>
                        
                        </td> -->
                   
                     <?php }
                          ?>
                          </tr>
                    </tbody>
                  </table>
                  
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <?php
include "footer.php";
?>