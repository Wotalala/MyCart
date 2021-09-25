<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "new");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'	=>	$_GET["id"],
				'item_name'		=>	$_POST["hidden_name"],
				'item_price'	=>	$_POST["hidden_price"],
				'item_quantity'	=>	$_POST["quantity"]
				
		
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';


		}
	}
	else
	{
		$item_array = array(
			'item_id'	=>	$_GET["id"],
			'item_name'	=>	$_POST["hidden_name"],
			'item_price'	=>	$_POST["hidden_price"],
			'item_quantity'	=>	$_POST["quantity"]
			
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="index.php"</script>';
			}
		}
	}
}
if(isset($_GET["action"]))
{

	if($_GET["action"] == "clear")
	{
			
				unset($_SESSION["shopping_cart"]);
			
			
			
		}
	
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-beJoAY4VI2Q+5IPXjI207/ntOuaz06QYCdpWfWRv4lSFDyUSqsM0W+wiAMr2I185" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Nyum</title>
  </head>
  <body>
	
       <!--<div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a href="index.html" class="navbar-brand">-->
       <!--  <img src="images/img1.png" alt="Nyum Logo" width="40" height="30" class="d-inline-block align-top"> Nyum--></a>
       <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu" aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Toggle Navigation">
          <span class="navbar-toggler-icon"></span>
          
        </button>
          <div class="collapse navbar-collapse" id="toggleMobileMenu">
            <ul class="navbar-nav me-auto text-center">
              <li>
                <a href="index.html" class="nav-link active">Home</a>
              </li>
              <li>
                <a href="cart.php" class="nav-link">My Cart</a>
              </li>
            </ul>
          </div>
      </nav>
    </div> <div class="container">
      <div><a class="btn btn-primary" href="index.html" role="button">Back</a>
      </div> 
     
    </div>-->
   
      
      <!---<a class="btn btn-danger" href="index.html" role="button">Back to Menu Categories</a> 
      
      
      <hr>
     

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="index.html">Menu Categories</a>

        <a class="nav-link active" aria-current="page" href="burgers.html">Burgers</a>
        
     
      </div>
    </div>
  </div>
</nav>-->
  <br> 

<div class="container-fluid">
  <div class ="row g-2"> 
   <div class="container-fluid">
    	<h3>Burgers</h3>
   </div>
  	<div class="col-12 col-md-6">
  <div class="row g-3">
			<?php
				$query = "SELECT * FROM tbl_menu ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class ="col-12 col-md-6 col-lg-4">
				<form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
					<div class="card">
						<img src="images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />
						<div class="card-body">
						<h6 class="text-center"><?php echo $row["name"]; ?></h6>

						<h6  align ="center" class="text-danger">₱ <?php echo $row["price"]; ?>
						<input type="text" name="quantity" value="1" class="form-control" style="margin: 20px;width: 80%;" />

						

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<!--<input type="submit" name="add_to_cart" class="btn btn-danger" value="Add to Cart" /> -->
						<input type="submit" name="add_to_cart" class="btn btn-danger btn-sm " style="margin-top: 5px;" value="Add to Cart"/>

					</h6></div></div>
				</form>
			</div>
			<?php
					}
				}
			?>
		</div>
		<hr>
 		<div class="container-fluid">
    	<h3>Beverages</h3>
   		</div>
		  <div class="row g-3">
		
   				<?php
				$query = "SELECT * FROM tbl_bev ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class ="col-12 col-md-6 col-lg-4">
				<form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
					<div class="card">
						<img src="images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />
						<div class="card-body">
						<h6 class="text-center"><?php echo $row["name"]; ?></h6>

						<h6  align ="center" class="text-danger">₱ <?php echo $row["price"]; ?>
						<input type="text" name="quantity" value="1" class="form-control" style="margin: 20px;width: 80%;" />
						
						
						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<!--<input type="submit" name="add_to_cart" class="btn btn-danger" value="Add to Cart" /> -->
						<input type="submit" name="add_to_cart" class="btn btn-danger btn-sm" style="margin-top: 5px;" value="Add to Cart"/>

					</h6></div></div>
				</form>
			</div>
			<?php
					}
				}
			?>
		</div>
		<hr>
 		<div class="container-fluid">
    	<h3>Combo Meals</h3>
   		</div>
		  <div class="row g-3">
		
   				<?php
				$query = "SELECT * FROM tbl_combo ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class ="col-12 col-md-6 col-lg-4">
				<form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
					<div class="card">
						<img src="images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />
						<div class="card-body">
						<h6 class="text-center"><?php echo $row["name"]; ?></h6>

						<h6  align ="center" class="text-danger">₱ <?php echo $row["price"]; ?>
						<input type="text" name="quantity" value="1" class="form-control" style="margin: 20px;width: 80%;" />
				

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<!--<input type="submit" name="add_to_cart" class="btn btn-danger" value="Add to Cart" /> -->
						<input type="submit" name="add_to_cart" class="btn btn-danger btn-sm" style="margin-top: 5px;" value="Add to Cart"/>

					</h6></div></div>
				</form>
			</div>
			<?php
					}
				}
			?>
		</div>
	</div>	

	<div class="col-md-6" >
			<div style="clear:both"></div>
	
			<h3 align="center">Order Summary</h3>
			<a href="index.php?action=clear" role="button"class="btn btn-dark btn-sm"><i class="bi bi-cart-x"></i> Clear</a>
			<div class="table-responsive">
				<table class="table">
					<tr>
					<th>Order</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>₱ <?php echo $values["item_price"]; ?></td>
						<td>₱ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><img src="images/icon-delete.png"></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
							$vat = $total * .12;
							$vatsales = $total - $vat;

							$disc = 0;
							$due = $total-$disc;

							//$query = "SELECT * FROM coupon ORDER BY id'";

							
							//if(isset($_POST["checkout"]))
								//{
									//if(is_array($array)){
									//	$value = array();
									//	foreach ($array as $row => $values){
									//$item_id = mysqli_real_escape_string($connect,$values[0]);		
									//$item_name = mysqli_real_escape_string($connect,$values[1]);
									//$item_quantity = mysqli_real_escape_string($connect,$values[2]);
								//	$item_price = mysqli_real_escape_string($connect,$values[3]);
								//	$total = mysqli_real_escape_string($connect,$values[4]);
									//$values[] = "('$item_id','$item_name','$item_quantity','$item_price','$total','$order_type')";
										}
										//$sql = "INSERT INTO orders (order_id,order_name,order_qty,order_price,total,order_type) VALUES";
										//$sql .= implode(', ', $value);
										//mysqli_query($connect,$sql);
										
									//echo '<script>alert("Item Saved.")</script>';
									//}

								//	}
								
						
							

						//}


					?>
					<tr>
						<td colspan="3" align="right">VATable Sales</td>
						<td align="right">₱ <?php echo number_format($vatsales, 2); ?></td>
						<td></td>
					</tr>
					<tr>
						<td colspan="3" align="right">VAT(%12)</td>
						<td align="right">₱ <?php echo number_format($vat,2);?></td>
						<td></td>
					</tr>
				
					<tr>
						<td colspan="3" align="right">Coupon Code</td>
						<td align="right"><input type="textbox" id="couponcode" name="couponcode" placeholder="Enter Coupon Code"/>
							
					<td><input type="button" name="apply" id="apply" class="btn btn-success btn-sm" value="Apply"/></td>
					</tr>
					
					<tr>
						<td colspan="3" align="right">Sub Total</td>
						<td align="right">₱ <?php echo number_format($total, 2); ?></td>
					<td></td>
					</tr>
					<tr>
						<td colspan="3" align="right">Discount</td>
						<td align="right">₱ <?php echo number_format($disc, 2); ?></td>
					<td></td>
					</tr>

					<tr>
						<td colspan="3" align="right">Amount Due</td>
						<td align="right">₱ <?php echo number_format($due, 2); ?></td>
					<td></td>
					</tr>
						<tr>
						<td colspan="4" align="right"><input type="submit" name="checkout" class="btn btn-success btn-sm" value="Proceed to Checkout"/></td>
					<td></td>
					</tr>
					
					<?php

					}
					?>	
				</table>
				

			</div>
		</div>
	</div>
</div>
</div>
<br>
  
      
   
   
   
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->




</body>
</html>
