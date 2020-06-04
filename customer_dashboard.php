<?php
    include("admin/DataBaseConnection.php");
	//include('customer_post.php');

	// Initialize the session
	session_start();
     
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: home.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>DigExipo Customers</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="admin/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="admin/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="admin/images/favicon.png" />

  <!-- DELETE AND UPDATE AJAX,JQuery LIBRARIES  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://www.jqueryscript.net/demo/Dialog-Modal-Dialogify/dist/dialogify.min.js"></script>

  <!-- CKEDITOR -->
  <!-- <script src="https://cdn.ckeditor.com/4.5.9/full/ckeditor.js"></script> -->
  <script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>

</head>

<body>
    <div class="container-scroller">
    	<!-- top navbar -->
		<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
           <div class="navbar-brand-wrapper d-flex justify-content-center">
				<div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
					<a class="navbar-brand brand-logo" href="dashboard.php"></a>
					<a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="images/logo-mini.svg" alt="logo"/></a>
					<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
						<span class="mdi mdi-sort-variant"></span>
					</button>
				</div>  
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
				<ul class="navbar-nav mr-lg-4 w-100">
					<li class="nav-item nav-search d-none d-lg-block w-100">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="search">
								<i class="mdi mdi-magnify"></i>
								</span>
							</div>
							<input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search" style="width:50%">
						</div>
					</li>
				</ul>
				<ul class="navbar-nav navbar-nav-right">
					<li class="nav-item nav-profile dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
						<img src="images/1.jpg" alt="profile"/>
						<span class="nav-profile-name"><?php echo htmlspecialchars($_SESSION["email"]); ?></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
						<a class="dropdown-item">
							<i class="mdi mdi-settings text-primary"></i>
							Settings
						</a>
						<a class="dropdown-item" href="customerlogout.php">
							<i class="mdi mdi-logout text-primary"></i>
							Logout
						</a>
					</li>
				</ul>
				<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
				<span class="mdi mdi-menu"></span>
				</button>
		    </div>
	    </nav>

		<!-- page body  -->
		<div class="container-fluid page-body-wrapper">

	        <!-- sidebar nav -->
			<nav class="sidebar sidebar-offcanvas" id="sidebar">
				<ul class="nav">
					<li class="nav-item">
						<a class="nav-link" href="customer_dashboard.php">
							<i class="mdi mdi-home menu-icon"></i>
							<span class="menu-title">Dashboard</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="profile.php">
							<i class="mdi mdi-view-headline menu-icon"></i>
							<span class="menu-title">View Profile</span>
						</a>
					</li>
				</ul>
				</nav>

            <!-- main panel that contains table of all products post -->
			<div class="main-panel">
		        <div class="content-wrapper">

                    <div class="row">
			            <div class="col-md-12 stretch-card">
			                <div class="card">
				                <div class="card-body">
				                    <p class="card-title">Recent Post</p>
				                    <div align="right"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#largeLargeModal">Create Post</button></div>

				                        <div class="table-responsive">
						                    <table id="recent-purchases-listing" class="table">
						                        <thead>
							                        <tr>
														<th>ID</th>
														<th>Product Name</th>
														<th>Description</th>
														<th>Image</th>
							                            <th>Company Name</th>
							                            <!-- <th>Posted Date</th> -->
							                            <!-- <th>Category Name</th> -->
							                            <th>Edit</th>
							                            <th>Delete</th>
						                            </tr>
					                            </thead>

												<?php
													include('admin/DataBaseConnection.php');
													$bid = $_SESSION["business_ID"];
													$sql="SELECT * FROM tbl_products WHERE business_ID='$bid' ";
													$stmt = $conn->prepare($sql);
													$stmt ->execute();
													$result = $stmt->get_result();
													if($result->num_rows > 0){
														while ($row = $result->fetch_assoc()) {
															$product_id = $row['product_id'];
												?>
												<tr>
													<td><?php echo $row['product_id']; ?></td>
													<td><?php echo $row['product_name']; ?></td>
													<td><?php echo $row['product_description']; ?></td>
													<td><img  src="<?php echo $row['product_image']; ?>"></td>
													<td><?php echo $row['company_name']; ?></td>
													<!-- <td><?php //echo $row['category_name']; ?></td> -->
													<td><input type="button" name="update" id="update" class="btn btn-primary editbtn" value="Update" style="padding: 5px"></td>
													<td><button type="button" name="delete" id="<?php echo $row['product_id']; ?>" class="btn btn-danger delete" style="padding: 5px">Delete</button></td>
													</tr>
												<?php
													    }
													}else{
														echo "No Data Found in the dataBase";
													}
									            ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
			        </div>
			    </div>
			    <!-- end of table that contains all post -->
		    </div>
	    </div>

	<!-- modal for posting a product -->
	<div id="largeLargeModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Post a Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
					<form class="forms-sample" method="post" action="" enctype="multipart/form-data">
					    <input type="hidden" name="business_id" value="<?php echo  $_SESSION['business_ID'];?>"> 
	                    <div class="form-group">
							<label for="exampleInputUsername1">Product Name</label>
							<input type="text" class="form-control" name="product_name" id="exampleInputUsername1" placeholder="Username" required>
						</div>
						<div class="form-group">
							<label for="exampleInputUsername1">Product Description</label>
							<textarea name="product_description" id="myeditor" class="form-control" placeholder="type description here" required></textarea>
						</div>
	                    <div class="form-group">
	                    	<label>Choole product Photo</label>
	                        <input type="file" name="product_image" class="form-control" placeholder="Upload Image" multiple="multiple" required>
                        </div>
					    <div class="form-group">
							<label for="exampleInputUsername1">Company Name</label>
							<input type="text" class="form-control" name="company_name" id="exampleInputUsername1" placeholder="Username" required>
	                    </div>
	                    <div class="modal-footer">
		                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		                    <button type="submit" name="saveProduct" class="btn btn-primary">Post</button>
		                </div>
	                </form>
                </div>

            </div>
        </div>
    </div><!-- end of modal -->

	<div id="update_products" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Update Product Details</h5>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<form class="forms-sample" method="post" action="customer_post_edit.php" enctype="multipart/form-data">
						<div class="">
							<input type="hidden" name="update_id" id="update_id" value="">
						</div>
						<div class="form-group">
							<label for="exampleInputUsername1">Product Name</label>
							<input type="text" class="form-control" name="product_name" id="product_name" placeholder="Username" required>
						</div>
						<div class="form-group">
							<label for="exampleInputUsername1">Product Description</label>
							<textarea name="product_description" id="product_description" class="form-control" placeholder="type description here" required></textarea>
						</div>
						<div class="form-group">
							<label>Choole product Photo</label>
							<input type="file" name="product_image" id="product_image" class="form-control" placeholder="Upload Image" multiple="multiple" required>
						</div>
						<div class="form-group">
							<label for="exampleInputUsername1">Company Name</label>
							<input type="text" class="form-control" name="company_name" id="company_name" placeholder="Username" required>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="submit" name="updateProduct" class="btn btn-primary">Update</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>

	<footer class="footer">
		<div class="d-sm-flex justify-content-center justify-content-sm-between">
			<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 <a href="#" target="_blank">Digexpo</a>. All rights reserved.</span>
			<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Digital Exposition <i class="mdi mdi-heart text-danger"></i></span>
		</div>
	</footer>

	<?php
    include('admin/DataBaseConnection.php');

    if (isset($_POST['saveProduct'])) {

      $sql="INSERT INTO tbl_products(product_name,product_description,product_image,company_name,business_ID,reg_date) VALUES(?,?,?,?,?,NOW())";
      if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("ssssi",$name,$descr,$p_img,$company,$business_id);

        //setting parameters
        $name = $_POST['product_name'];
        $descr = $_POST['product_description'];
        $company = $_POST['company_name'];
        $business_id = $_POST['business_id'];
        $p_img = "p_img/".basename($_FILES['product_image']['name']);
        
        if (!empty($name) && !empty($descr) && !empty($p_img) && !empty($company) && !empty($business_id)) {

          move_uploaded_file($_FILES['product_image']['tmp_name'], $p_img);

          // RUN INSERT QUERY
          if ($stmt->execute()) {
			  //$query = "SELECT product_id FROM tbl_products";
            echo '<script>alert("Posted Successfully");</script>';
            echo "<meta http-equiv='refresh' content='0;url=customer_dashboard.php'>";

          }else{
            echo '<script>alert("Failed to Post ");</script>';
            echo "<meta http-equiv='refresh' content='0;url=customer_dashboard.php'>";
          //echo "error".$conn->error;
          }
        }else{
          echo '<script>alert("All fields are required");</script>';
          echo "<meta http-equiv='refresh' content='0;url=customer_dashboard.php'>";
          //echo "error .$sql".$conn->error;
        }
      }else{
        echo '<script>alert("Something Went Wrong");</script>';
        echo "<meta http-equiv='refresh' content='0;url=customer_dashboard.php'>";
        //echo "error".$conn->error;
      }

      //close statement
      $stmt->close();

      //close the connection
      $conn->close();

    }

?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- plugins:js -->
	<script src="admin/vendors/base/vendor.bundle.base.js"></script>
	<!-- endinject -->
	<!-- Plugin js for this page-->
	<script src="admin/vendors/chart.js/Chart.min.js"></script>
	<script src="admin/vendors/datatables.net/jquery.dataTables.js"></script>
	<script src="admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
	<!-- End plugin js for this page-->
	<!-- inject:js -->
	<script src="admin/js/off-canvas.js"></script>
	<script src="admin/js/hoverable-collapse.js"></script>
	<script src="admin/js/template.js"></script>
	<!-- endinject -->
	<!-- Custom js for this page-->
	<script src="admin/js/dashboard.js"></script>
	<script src="admin/js/data-table.js"></script>
	<script src="admin/js/jquery.dataTables.js"></script>
	<script src="admin/js/dataTables.bootstrap4.js"></script>
	<!-- End custom js for this page-->

	<!-- Delete products Ajax JQuery Script -->
	<script>
		$(document).ready(function(){
			$(document).on('click', '.delete', function(){
				var id = $(this).attr('id');
				Dialogify.confirm("<h3 class='text-danger'><b>Are you sure you want to remove this product? </b></h3>", {
				ok:function(){
					$.ajax({
					url:"admin/deletes/delete_products.php",
					method:"POST",
					data:{id:id},
					success:function(data)
					{
					Dialogify.alert('<h3 class="text-success text-center"><b>Product has been deleted successfully</b></h3>');
					location.reload();
					}
					})
				},
				cancel:function(){
					this.close();
				}
				});
			});
		});
	</script>

	<!-- JAVASCRIPT FOR UPDATE PRODUCTS -->
	<script>
		$(document).ready(function() {

			$('.editbtn').on('click', function() {
					$('#update_products').modal('show');

					$tr = $(this).closest('tr');

					var data = $tr.children("td").map(function(){
						return $(this).text();
					}).get();

					console.log(data);

					$('#update_id').val(data[0]);
					$('#product_name').val(data[1]);
					$('#product_description').val(data[2]);
					$('#product_image').val(data[3]);
					$('#company_name').val(data[4]);

			});
		});
	</script>
	<!-- END OF UPDATE PRODUCTS -->

	<!-- CKEDITOR -->
	<script>
		CKEDITOR.replace('myeditor');
	</script>
</body>
</html>
