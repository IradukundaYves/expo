<?php
     include("DataBaseConnection.php");
		 include("update/update_job.php");
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

            <!-- main panel that contains table of all jobs post -->
			<div class="main-panel">
		        <div class="content-wrapper">

                    <div class="row">
			            <div class="col-md-12 stretch-card">
			                <div class="card">
				                <div class="card-body">
				                    <p class="card-title">Recent Jobs</p>
				                    <div align="right"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#largeLargeModal">Post a Job</button></div>

				                        <div class="table-responsive">
						                    <table id="recent-purchases-listing" class="table">
						                        <thead>
							                        <tr>
														<th>ID</th>
							                            <th>Job Title</th>
							                            <th>Job Source</th>
							                            <th>Job Category</th>
														<th>Job Type</th>
							                            <th>Job_Description</th>
							                            <th>Image</th>
														<th>Dead Line</th>
							                            <th>upload_date</th>
							                            <th>Edit</th>
							                            <th>Delete</th>
						                            </tr>
					                            </thead>
												<?php
													include("DataBaseConnection.php");
													$sql = "SELECT * FROM tbl_jobs";
													$stmt = $conn->prepare($sql);
													$stmt ->execute();
													$result = $stmt->get_result();
													if($result->num_rows > 0){
														while ($row = $result->fetch_assoc()) {
															$job_id = $row['job_id'];

												?>
												<tr>
													<td><?php echo $job_id;?></td>
													<td><?php echo $row['job_title']?></td>
													<td><?php echo $row['job_source']?></td>
													<td><?php echo $row['job_category']?></td>
													<td><?php echo $row['job_type']?></td>
													<td><?php echo $row['job_description']?></td>
													<td><img  src="../jobimages/<?php echo $row['job_image']; ?>"></td>
													<td><?php echo $row['deadline']?></td>
													<td><?php echo $row['published_date']?></td>
													<td><input type="button" name="update" id="update" class="btn btn-primary editbtn" value="Update" style="padding: 5px"></td>
													<td><button type="button" name="delete" id="<?php echo $row['job_id']; ?>" class="btn btn-danger delete" style="padding: 5px">Delete</button></td>
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

	<!-- modal for posting a Job -->
	<div id="largeLargeModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Post a Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                   <form class="forms-sample" method="POST" class="well" enctype="multipart/form-data">
	                    <div class="form-group">
	                      <label for="exampleInputUsername1">Job Title</label>
	                      <input type="text" class="form-control" name="job_title" id="job_title" placeholder="job title" required>
	                    </div>
	                    <div class="form-group">
	                      <label for="exampleInputUsername1">Job Source</label>
	                      <input type="text" class="form-control" name="job_source" id="job_source" placeholder="job source" required>
	                    </div>
	                    <div class="form-group">
		                    <label for="exampleFormControlSelect2">Job Category</label>
		                    <select class="form-control" name="job_category" id="job_category" required>
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
							<label>Job type</label>
							<input type="text" name="job_type" id="job_type" class="form-control" placeholder="eg:FullTime Entry leve(1 to 3 years of experience)" required>
			            </div>
	                    <div class="form-group">
	                    	<label>Choole Job Picture(company logo)</label>
	                        <input type="file" class="form-control" name="job_image" id="job_image" placeholder="Upload Image" required>
                        </div>

                       <div class="form-group">
							<label for="exampleInputUsername1">Job Description</label>
							<textarea name="job_description" id="job_description" class="form-control" placeholder="type description here" required></textarea>
                       </div>
                        <div class="form-group">
						    <label>Deadline</label>
							<input type="date" name="deadline"  class="form-control" required>
						</div>
	                    <div class="modal-footer">
		                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		                    <button type="submit" name="publishJob" class="btn btn-primary">Publish Job</button>
		                  </div>
	                </form>
                </div>

            </div>
        </div>
    </div><!-- end of modal -->

		<!-- JOB POSTS UPDATE -->
		<div id="jobupdate" class="modal fade" tabindex="-1" role="dialog">
	        <div class="modal-dialog modal-lg">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <h5 class="modal-title">Post a Product</h5>
	                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                </div>
	                <div class="modal-body">
	                   <form class="forms-sample" method="POST" class="well" enctype="multipart/form-data">
							<div class="">
								<input type="hidden" name="update_id" id="update_id" value="">
							</div>
		                    <div class="form-group">
		                      <label for="exampleInputUsername1">Job Title</label>
		                      <input type="text" class="form-control" name="job_title" id="title" placeholder="job title" required>
		                    </div>
		                    <div class="form-group">
		                      <label for="exampleInputUsername1">Job Source</label>
		                      <input type="text" class="form-control" name="job_source" id="source" placeholder="job source" required>
		                    </div>
		                    <div class="form-group">
			                    <label for="exampleFormControlSelect2">Job Category</label>
			                    <select class="form-control" name="job_category" id="category" required>
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
								<label>Job type</label>
								<input type="text" name="job_type" id="type" class="form-control" placeholder="eg:FullTime Entry leve(1 to 3 years of experience)" required>
							</div>
		                    <div class="form-group">
		                    	<label>Choole Job Picture(company logo)</label>
		                        <input type="file" class="form-control" name="job_image" id="image" placeholder="Upload Image" required>
	                        </div>

	                       <div class="form-group">
								<label for="exampleInputUsername1">Job Description</label>
								<textarea name="job_description" id="description" class="form-control" placeholder="type description here" required></textarea>
	                       </div>
						   <div class="form-group">
								<label>Deadline</label>
								<input type="date" name="deadline" id="deadline"  class="form-control" required>
							</div>
		                    <div class="modal-footer">
			                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
			                    <button type="submit" name="updateJob" class="btn btn-primary">Update Job</button>
			                </div>
		                </form>
	                </div>

	            </div>
	        </div>
	    </div>

    <?php include('includes/footer.php');?>


		<!-- CKEDITOR -->
		<script>
			 CKEDITOR.replace('job_description');
		</script>

		<?php
		    include('DataBaseConnection.php');

		    if (isset($_POST['publishJob'])) {
		      $sql="INSERT INTO tbl_jobs(job_title,job_description,job_category,job_type,job_image,job_source,deadline,published_date) VALUES(?,?,?,?,?,?,?,NOW())";
		      if($stmt = $conn->prepare($sql)){
		        $stmt->bind_param("sssssss",$title,$descr,$category,$job_type,$image,$source,$deadline);

		        //setting parameters
		        $title = $_POST['job_title'];
		        $descr = $_POST['job_description'];
				$category = $_POST['job_category'];
				$job_type = $_POST['job_type'];
		        $picture = $_FILES['job_image']['name'];
		        $source = $_POST['job_source'];
				$image = "../j_img/".basename($_FILES['job_image']['name']);
                $deadline = $_POST['deadline'];
		        if (!empty($title) && !empty($descr) && !empty($category) && !empty($job_type) && !empty($image) && !empty($source) && !empty($deadline)) {

		          move_uploaded_file($_FILES['job_image']['tmp_name'], $image);

		          // RUN INSERT QUERY
		          if ($stmt->execute()) {
		             echo '<script>alert("Job Published Successfully");</script>';
		             echo "<meta http-equiv='refresh' content='0;url=jobs.php'>";

		          }else{
		          //  echo '<script>alert("Failed to Publish job");</script>';
		          //  echo "<meta http-equiv='refresh' content='0;url=jobs.php'>";
		          echo "error".$conn->error;
		          }
		        }else{
		          echo '<script>alert("All fields are required");</script>';
		          echo "<meta http-equiv='refresh' content='0;url=jobs.php'>";
		          //echo "error ".$conn->error;
		        }
		      }else{
		        //echo '<script>alert("Something Went Wrong");</script>';
		        //echo "<meta http-equiv='refresh' content='0;url=jobs.php'>";
		        echo "error".$conn->error;
		      }

		      //close statement
		      $stmt->close();

		      //close the connection
		      $conn->close();

		    }

		?>


		<script>
				$(document).ready(function(){
						$(document).on('click', '.delete', function(){
								var id = $(this).attr('id');
								Dialogify.confirm("<h3 class='text-danger'><b>Are you sure you want to remove this Job Post? </b></h3>", {
								ok:function(){
										$.ajax({
										url:"deletes/delete_job.php",
										method:"POST",
										data:{id:id},
										success:function(data)
										{
										Dialogify.alert('<h3 class="text-success text-center"><b>Job Post has been deleted successfully</b></h3>');
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

		<!-- UPDATE JOB JAVASCRIPT TO POPULATE DATA FROM TAVLE TO HTML -->
		<script>
			$(document).ready(function() {

					$('.editbtn').on('click', function() {
							$('#jobupdate').modal('show');

							$tr = $(this).closest('tr');

							var data = $tr.children("td").map(function(){
								return $(this).text();
							}).get();

							console.log(data);

							$('#update_id').val(data[0]);
							$('#title').val(data[1]);
							$('#source').val(data[2]);
							$('#category').val(data[3]);
							$('#type').val(data[4]);
							$('#description').val(data[5]);
							$('#image').val(data[6]);
							$('#deadline').val(data[7])

					});
				});
		</script>

</body>
</html>
