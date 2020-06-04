<?php
	include('create/new_product.php');
?>
<!DOCTYPE html>
<html>
<!-- including the file that contains css style in header -->
<?php include('includes/UIStyles.php');
?>

<body>
    <div class="container-scroller">
    	<!-- top navbar -->
		<?php include("includes/navbar.php");?>

		<!-- page body  -->
		<div class="container-fluid page-body-wrapper">

	        <!-- sidebar nav -->
			<?php include("includes/sidebar.php"); ?>

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
																					    include('DataBaseConnection.php');
																							$sql="SELECT * FROM tbl_products";
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
																							<td><img  src="../images/<?php echo $row['product_image']; ?>"></td>
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
	                        <input type="file" name="product_image[]" class="form-control" placeholder="Upload Image" multiple="multiple" required>
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
										 <form class="forms-sample" method="post" action="update/update_product.php" enctype="multipart/form-data">
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
			</div

    <?php include('includes/footer.php');?>

		<!-- Delete products Ajax JQuery Script -->
        <script>
            $(document).ready(function(){
                $(document).on('click', '.delete', function(){
                    var id = $(this).attr('id');
                    Dialogify.confirm("<h3 class='text-danger'><b>Are you sure you want to remove this product? </b></h3>", {
                    ok:function(){
                        $.ajax({
                        url:"deletes/delete_products.php",
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
