<?php 
	include("DataBaseConnection.php");
	include("update/edit_business_profile.php");
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
            
            <!-- main panel that contains table of all Business post -->
			<div class="main-panel">        
		        <div class="content-wrapper">

                    <div class="row">
			            <div class="col-md-12 stretch-card">
			                <div class="card">
				                <div class="card-body">
				                    <p class="card-title">Recent Business Registered</p>
				                        <div class="table-responsive">
						                    <table id="recent-purchases-listing" class="table">
						                        <thead>
							                        <tr>
														<th>ID</th>
							                            <th>Company Name</th>
							                            <th>Company Logo</th>
							                            <th>Location</th>
							                            <th>Phone</th>
							                            <th>Email</th>
							                            <th>Website</th>
							                            <th>Business Type</th>
							                            <th>Status</th>
							                            <th>Approve</th>
							                            <th>Edit</th>
							                            <th>Delete</th>
						                            </tr>
					                            </thead>
					                            
												<?php
                                                    $sql = "SELECT * FROM business_profiles";
													$stmt = $conn->prepare($sql);
													$stmt ->execute();
													$result = $stmt->get_result();
													if($result->num_rows > 0){
													    while ($row = $result->fetch_assoc()) {
																$b_id = $row['business_ID'];

											    ?>
							                        <tr>
							                            <td><?php echo $row['business_ID']?></td>
							                            <td><?php echo $row['business_name']?></td>
							                            <td><?php echo $row['logo']?></td>
							                            <td><?php echo $row['location']?></td>
							                            <td><?php echo $row['phone']?></td>
							                            <td><?php echo $row['email']?></td>
							                            <td><?php echo $row['website']?></td>
														<td><?php echo $row['type']?></td>
														<td><?php echo $row['status']?></td>
							                            <td><a href="#" class=""><i class="mdi mdi-thumb-up" style="padding:0px 20px;color: #71c016;font-size: 28px;font-weight: bold;"></i></a> </td>
							                            <td><input type="button" name="update" id="update" class="btn btn-primary editbtn" value="Update" style="padding: 5px"></td>
													    <td><button type="button" name="delete" id="<?php echo $row['business_ID']; ?>" class="btn btn-danger delete" style="padding: 5px">Delete</button></td>
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

	<!-- UPDATE BUSINESS PROFILE MODAL -->
	<div id="business_profile" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog ">
            <div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Sign Up Here</h5>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<form class="well" method="post">
						<div>
							<input type="text" name="update_id" id="update_id">
						</div>
						<div class="form-group">
							<label>Business Name (or your name if you don't have a company)</label>
							<input type="text" name="business_name" id="business_name" class="form-control" placeholder="eg:ubumwe tech circle Ltd" required>
						</div>
						<div class="form-group">
							<label>Logo</label>
							<input type="file" name="logo" id="logo" class="form-control"  style="width: 100%;">
						</div>
						<div class="form-group">
							<label>Location</label>
							<input type="text" name="location" id="location" class="form-control" placeholder="eg:nyarugenge" required>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" name="phone" id="phone" class="form-control" placeholder="eg:+250781111111" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" id="email" class="form-control" placeholder="eg:nnnn@gmail.com" required>
						</div>
						<div class="form-group">
							<label>Website</label>
							<input type="text" name="website" id="website" class="form-control" placeholder="www.ubumwe.rw">
						</div>
						<div class="form-group">
							<label>Business Type</label>
							<select name="type" id="type" class="form-control" required>
								<option>techology</option>
								<option>photography</option>
								<option>videography</option>
								<option>education</option>
								<option>Medical and Health</option>
								<option>fashion</option>
								<option>restourant</option>
								<option>saloon</option>
								<option>cosmetics</option>
								<option>bar</option>
								<option>grocely</option>
								<option>selling cars</option>
								<option>selling house</option>
								<option>selling plots</option>
								<option>computer repair</option>
								<option>phone repair</option>
								<option>selling phones</option>
								<option>selling computers</option>
								<option>cars repair</option>
								<option> selling furnitures</option>
							</select>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							<button type="submit" name="signup" class="btn btn-success" style="background: #66CDAA">Send</button>
						</div>
                    </form>
                </div>
            </div>
        </div>
	</div>
	

	<?php include('includes/footer.php');?>
	
	<!-- AJAX JQUERY TO DELETE BUSINESS PROFILES -->
	<script>
		$(document).ready(function(){
			$(document).on('click', '.delete', function(){
				var id = $(this).attr('id');
				Dialogify.confirm("<h3 class='text-danger'><b>Are you sure you want to remove this Business Profile? </b></h3>", {
				ok:function(){
					$.ajax({
					url:"deletes/delete_buisiness_profile.php",
					method:"POST",
					data:{id:id},
					success:function(data)
					{
					Dialogify.alert('<h3 class="text-success text-center"><b>Business profile has been deleted successfully</b></h3>');
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

	<!-- AJAX JJQUERY FOR BUSINESS PROFILE UPDATES -->
	<script>
		$(document).ready(function() {

			$('.editbtn').on('click', function() {
				$('#business_profile').modal('show');

				$tr = $(this).closest('tr');

				var data = $tr.children("td").map(function(){
					return $(this).text();
				}).get();

				console.log(data);

				$('#update_id').val(data[0]);
				$('#business_name').val(data[1]);
				$('#logo').val(data[2]);
				$('#location').val(data[3]);
				$('#phone').val(data[4]);
				$('#email').val(data[5]);
				$('#website').val(data[6]);
				$('#type').val(data[7]);

			});
		});
	</script>
</body>
</html>