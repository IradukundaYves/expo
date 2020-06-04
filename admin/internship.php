<?php 
   include("create/new_training.php");
   include("update/update_training.php");
?>
<!DOCTYPE html>
<html>
<!-- including the file that contains css style in header -->
<?php include('includes/UIStyles.php');?>
<body>
    <div class="container-scroller">
    	<!-- top navbar -->
		<?php include("includes/navbar.php");?>

		<!-- page body  -->
		<div class="container-fluid page-body-wrapper">

	        <!-- sidebar nav -->
			<?php include("includes/sidebar.php"); ?>

            <!-- main panel that contains table of all training post -->
			<div class="main-panel">
		        <div class="content-wrapper">

                    <div class="row">
			            <div class="col-md-12 stretch-card">
			                <div class="card">
				                <div class="card-body">
				                    <p class="card-title">Recent Internships & Trainings</p>
				                    <div align="right"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#largeLargeModal">Post an Internship or Training</button></div>

				                        <div class="table-responsive">
						                    <table id="recent-purchases-listing" class="table">
						                        <thead>
							                        <tr>
														<th>ID</th>
							                            <th>Training Title</th>
							                            <th>Category</th>
							                            <th>Description</th>
							                            <th>Image</th>
							                            <th>Company</th>
							                            <th>Edit</th>
							                            <th>Delete</th>
						                            </tr>
					                            </thead>
												<?php
													include('DataBaseConnection.php');
													$sql="SELECT * FROM tbl_trainings";
													$stmt = $conn->prepare($sql);
													$stmt ->execute();
													$result = $stmt->get_result();
													if($result->num_rows > 0){
															while ($row = $result->fetch_assoc()) {
																	$product_id = $row['training_id'];
												?>
												<tr>
													<td><?php echo $row['training_id'];?></td>
													<td><?php echo $row['training_title'];?></td>
													<td><?php echo $row['training_category'];?></td>
													<td><?php echo $row['traning_description'];?></td>
													<td><img  src="../images/<?php echo $row['training_image']; ?>"></td>
													<td><?php echo $row['trainers_company_name'];?></td>
													<td><input type="button" name="update" id="update" class="btn btn-primary editbtn" value="Update" style="padding: 5px"></td>
													<td><button type="button" name="delete" id="<?php echo $row['training_id']; ?>" class="btn btn-danger delete" style="padding: 5px">Delete</button></td>
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

		<!-- modal for posting a training -->
		<div id="largeLargeModal" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Post a Product</h5>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<form class="forms-sample" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="exampleInputUsername1">Training Title</label>
								<input type="text" class="form-control" name="training_title" id="exampleInputUsername1" placeholder="write title" required>
							</div>
							<div class="form-group">
								<label for="exampleFormControlSelect2">training Category</label>
								<select class="form-control" name="training_category" id="exampleFormControlSelect2" required>
									<option>Finance</option>
									<option>Technology</option>
									<option>Accounting</option>
									<option>Education</option>
									<option>Health</option>
									<option>Communication_Media</option>
									<option>Sports</option>
									<option>Management</option>
									<option>Agriculture</option>
									<option>technical_engineering</option>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputUsername1">Training Description</label>
								<textarea name="training_description" id="trainingDescription" class="form-control" placeholder="type description here" required></textarea>
							</div>
						    <div class="form-group">
								<label>Choole product Photo</label>
								<input type="file" class="form-control" name="training_image" placeholder="Upload Image" required>
							</div>
							<div class="form-group">
								<label for="exampleInputUsername1">company</label>
								<input type="text" class="form-control" name="trainers_company_name" id="exampleInputUsername1" placeholder="company name" required>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								<button type="submit" name="training" class="btn btn-primary">Publish Training</button>
							</div>
						</form>
                    </div>
                </div>
            </div>
        </div><!-- end of modal -->

		<!-- UPDATE TRAINING -->
		<div id="trainingUpdate" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Post a Product</h5>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<form class="forms-sample" method="post" enctype="multipart/form-data">
						    <div>
							    <input type="hidden" name="update_id" id="update_id">
							</div>
							<div class="form-group">
								<label for="exampleInputUsername1">Training Title</label>
								<input type="text" class="form-control" name="training_title" id="title" placeholder="write title" required>
							</div>
							<div class="form-group">
								<label for="exampleFormControlSelect2">training Category</label>
								<select class="form-control" name="training_category" id="category" required>
									<option>Finance</option>
									<option>Technology</option>
									<option>Accounting</option>
									<option>Education</option>
									<option>Health</option>
									<option>Communication_Media</option>
									<option>Sports</option>
									<option>Management</option>
									<option>Agriculture</option>
									<option>technical_engineering</option>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputUsername1">Training Description</label>
								<textarea name="training_description" id="description" class="form-control" placeholder="type description here" required></textarea>
							</div>
						    <div class="form-group">
								<label>Choole product Photo</label>
								<input type="file" class="form-control" name="training_image" id="image" placeholder="Upload Image" required>
							</div>
							<div class="form-group">
								<label for="exampleInputUsername1">company</label>
								<input type="text" class="form-control" name="trainers_company_name" id="companyName" placeholder="company name" required>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								<button type="submit" name="updateTraining" class="btn btn-primary">Publish Training</button>
							</div>
						</form>
                    </div>
                </div>
            </div>
        </div>

        <?php include('includes/footer.php');?>

		<!-- CKEDITOR -->
		<script>
			 CKEDITOR.replace('trainingDescription');
		</script>
		<!-- UPDATE CKEDITOR -->
		<!-- CKEDITOR -->
		<script>
			 CKEDITOR.replace('description');
		</script>

    <script>
		$(document).ready(function(){
			$(document).on('click', '.delete', function(){
				var id = $(this).attr('id');
				Dialogify.confirm("<h3 class='text-danger'><b>Are you sure you want to remove this Training? </b></h3>", {
				ok:function(){
					$.ajax({
					url:"deletes/delete_training.php",
					method:"POST",
					data:{id:id},
					success:function(data)
					{
					Dialogify.alert('<h3 class="text-success text-center"><b>Training has been deleted successfully</b></h3>');
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

    <!-- UPDATE JAVASRCIPT TO POPULATE DATA FROM TABLE TO FORM -->
	<script>
		$(document).ready(function() {

			$('.editbtn').on('click', function() {
					$('#trainingUpdate').modal('show');

					$tr = $(this).closest('tr');

					var data = $tr.children("td").map(function(){
						return $(this).text();
					}).get();

					console.log(data);

					$('#update_id').val(data[0]);
					$('#title').val(data[1]);
					$('#category').val(data[2]);
					$('#description').val(data[3]);
					$('#image').val(data[4]);
					$('#companyName').val(data[5]);

			});
		});
	</script>
</body>
</html>
