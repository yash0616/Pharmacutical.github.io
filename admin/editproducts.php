
    <?php
session_start();
include("../db.php");
$product_id=$_REQUEST['product_id'];

$result=mysqli_query($con,"select product_id,product_title,product_price,product_desc from products where product_id='$product_id'")or die ("query 1 incorrect.......");

list($product_id,$product_title,$product_price,$product_desc)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{

$product_title=$_POST['product_title'];
$product_price=$_POST['product_price'];
$product_desc=$_POST['product_desc'];


mysqli_query($con,"update products set product_title='$product_title', product_price='$product_price', product_desc='$product_desc' where product_id='$product_id'")or die("Query 2 is inncorrect..........");

header("location: productlist.php");
mysqli_close($con);
}
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <div class="col-md-5 mx-auto">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Edit Products</h5>
              </div>
              <form action="editproducts.php" name="form" method="post" enctype="multipart/form-data">
              <div class="card-body">
                
                  <input type="hidden" name="user_id" id="product_id" value="<?php echo $product_id;?>" />
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" id="product_title" name="first_name"  class="form-control" value="<?php echo $product_title; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label>Product Price</label>
                        <input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo $product_price; ?>" >
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Product Desc</label>
                        <input type="text"  id="email" name="email" class="form-control" value="<?php echo $product_desc; ?>">
                      </div>
                    </div>
                    <!-- <div class="col-md-12 ">
                      <div class="form-group">
                        <label >Password</label>
                        <input type="text" name="password" id="password" class="form-control" value="">
                      </div>
                    </div> -->
                  
                  
                  
                
              </div>
              <div class="card-footer">
                <button type="submit" id="btn_save" name="btn_save" class="btn btn-fill btn-primary">Update</button>
              </div>
              </form>    
            </div>
          </div>
         
          
        </div>
      </div>
      <?php
include "footer.php";
?>