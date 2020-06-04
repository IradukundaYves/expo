<?php
    include('create/new_featured.php');
    include('update/update_freatured_products.php');
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
				                    <p class="card-title">Recent Featured Product Post</p>
				                    <div align="right"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#largeLargeModal">Create Post</button></div>

				                        <div class="table-responsive">
						                    <table id="recent-purchases-listing" class="table">
						                        <thead>
							                        <tr>
                                                        <th>ID</th>
                                                        <th>Image</th>
                                                        <th>Category</th>
                                                        <th>Short Description</th>
							                            <th>Phone(whatsapp)</th>
							                            <th>Post Side</th>
							                            <th>Uploaded Date</th>
							                            <th>Edit</th>
							                            <th>Delete</th>
						                            </tr>
					                            </thead>

                                                <?php
                                                    include('DataBaseConnection.php');
                                                    $sql="SELECT * FROM featured_products ORDER BY featured_product_id DESC";
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt ->execute();
                                                    $result = $stmt->get_result();
                                                    if($result->num_rows > 0){
                                                        while ($row = $result->fetch_assoc()) {
                                                            $product_id = $row['featured_product_id'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['featured_product_id']; ?></td>
													<td><img  src="../p_img/<?php echo $row['images']; ?>"></td>
                                                    <td><?php echo $row['category']; ?></td>
                                                    <td><?php echo $row['short_description']; ?></td>
                                                    <td><?php echo $row['phone']; ?></td>
                                                    <td><?php echo $row['side']; ?></td>
                                                    <td><?php echo $row['upload_date']; ?></td>
                                                    <td><input type="button" name="update" id="update" class="btn btn-primary editbtn" value="Update" style="padding: 5px"></td>
                                                    <td><button type="button" name="delete" id="<?php echo $row['featured_product_id']; ?>" class="btn btn-danger delete" style="padding: 5px">Delete</button></td>
                                                </tr>
                                                <?php
                                                        }
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





        <!-- modal for posting a featured product -->
        <div id="largeLargeModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Post a Featured Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Choole product Photo</label>
                                <input type="file" name="images" class="form-control" placeholder="Upload Image" multiple="multiple" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Category</label>
                                <select name="category" id="category" class="form-control" required>
                                    <option >clothes</option>
                                    <option >food</option>
                                    <option >furniture</option>
                                    <option >cars</option>
                                    <option >moto circle</option>
                                    <option >electronic devices</option>

                                </select>                            
                            </div>
                                <div class="form-group">
                                <label for="exampleInputUsername1">short Description</label>
                                <textarea name="short_description" id="short_description" class="form-control" placeholder="type description here" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Phone (Whatsapp)</label>
                                <input type="text" class="form-control" name="phone" id="exampleInputUsername1" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Post Side</label>
                                <select name="side" id="side" class="form-control" required>
                                    <option >right_side_1</option>
                                    <option >right_side_2</option>
                                    <option >right_side_3</option>
                                    <option >left_side_1</option>
                                    <option >left_side_2</option>
                                    <option >left_side_3</option>

                                </select>                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" name="savefeatured" class="btn btn-primary">Post</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div><!-- end of modal -->

		<div id="update_featured" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Featured Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
					<div class="modal-body">
                    <form class="forms-sample" method="post" action="" enctype="multipart/form-data">
                        <div>
                           <input type="hidden" name="update_id" id="update_id">
                        </div>
                        <div class="form-group">
                            <label>Choole product Photo</label>
                            <input type="file" name="images" id="img" class="form-control" placeholder="Upload Image" multiple="multiple" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Category</label>
                            <select name="category" id="cat" class="form-control">
                                <option >clothes</option>
                                <option >food</option>
                                <option >furniture</option>
                                <option >cars</option>
                                <option >moto circle</option>
                                <option >electronic devices</option>

                            </select>                            
                        </div>
                            <div class="form-group">
                            <label for="exampleInputUsername1">short Description</label>
                            <textarea name="short_description" id="short_desc" class="form-control" placeholder="type description here" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Phone (Whatsapp)</label>
                            <input type="text" class="form-control" name="phone" id="ph" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Post Side</label>
                            <select name="side" id="sid" class="form-control" >
                                <option >right_side_1</option>
                                <option >right_side_2</option>
                                <option >right_side_3</option>
                                <option >left_side_1</option>
                                <option >left_side_2</option>
                                <option >left_side_3</option>

                            </select>                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" name="featuredUpdate" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

			</div>
		</div>
	</div>

    <?php include('includes/footer.php');?>

		<!-- Delete products Ajax JQuery Script -->
        <script>
            $(document).ready(function(){
                $(document).on('click', '.delete', function(){
                    var id = $(this).attr('id');
                    Dialogify.confirm("<h3 class='text-danger'><b>Are you sure you want to remove this product? </b></h3>", {
                    ok:function(){
                        $.ajax({
                        url:"deletes/delete_featured_products.php",
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
									$('#update_featured').modal('show');

									$tr = $(this).closest('tr');

									var data = $tr.children("td").map(function(){
										return $(this).text();
									}).get();

									console.log(data);

									$('#update_id').val(data[0]);
									$('#img').val(data[1]);
									$('#cat').val(data[2]);
									$('#short_desc').val(data[3]);
									$('#ph').val(data[4]);
                                    $('#sid').val(data[5]);

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
