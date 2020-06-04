<?php include("DataBaseConnection.php");?>

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

            <!-- main panel that contains table of all system users  -->
			<div class="main-panel">
		        <div class="content-wrapper">

                <div class="row">
			            <div class="col-md-12 stretch-card">
			                <div class="card">
				                <div class="card-body">
				                    <p class="card-title">System Users</p>
				                    <div align="right"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#largeLargeModal">Add New User</button></div>

				                        <div class="table-responsive">
						                    <table id="recent-purchases-listing" class="table">
						                        <thead>
							                        <tr>
																				  <th>User ID</th>
							                            <th>First Name</th>
							                            <th>Last Name</th>
							                            <th>Email</th>
							                            <th>Phone</th>
							                            <th>User Role</th>
							                            <th>User Name</th>
							                            <!-- <th>Created Date</th> -->
							                            <th>Edit</th>
							                            <th>Delete</th>
						                            </tr>
					                            </thead>
												<?php
                                                    $sql = "SELECT * FROM tbl_users";
													$stmt = $conn->prepare($sql);
													$stmt ->execute();
													$result = $stmt->get_result();
													if($result->num_rows > 0){
														while ($row = $result->fetch_assoc()) {
															$user_id = $row['user_id'];

											    ?>
												<tr>
													<td><?php echo $row['user_id'];?></td>
													<td><?php echo $row['first_name'];?></td>
													<td><?php echo $row['last_name'];?></td>
													<td><?php echo $row['email'];?></td>
													<td><?php echo $row['phone'];?></td>
													<td><?php echo $row['user_role'];?></td>
													<td><?php echo $row['user_name'];?></td>
													<td><input type="button" name="update" id="update" class="btn btn-primary editbtn" value="Update" style="padding: 5px"></td>
													<td><button type="button" name="delete" id="<?php echo $row['user_id']; ?>" class="btn btn-danger delete" style="padding: 5px">Delete</button></td>
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

	<!-- UPDATE USER  -->
	<div id="users" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New User Account </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                   <form class="forms-sample" method="post" class="well" action="update/update_users.php">
										 <div class="">
										 	 <input type="hidden" name="update_id" id="update_id" value="">
										 </div>
	                    <div class="form-group">
	                      <label for="exampleInputUsername1">First Name</label>
	                      <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" onkeypress="return(event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && eve.charCode <123)" required>
	                    </div>
	                    <div class="form-group">
	                      <label for="exampleInputUsername1">Last Name</label>
	                      <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" onkeypress="return(event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && eve.charCode <123)" required>
	                    </div>
	                    <div class="form-group">
	                      <label for="exampleInputEmail1">Email address</label>
	                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
	                    </div>
	                    <div class="form-group">
	                      <label for="exampleInputUsername1">Phone Number</label>
	                      <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" required>
	                    </div>
	                    <div class="form-group">
	                      <label for="exampleInputUsername1">User Name</label>
	                      <input type="text" class="form-control" name="user_name" id="user_name" placeholder="User Name" required>
	                    </div>
	                    <div class="form-group">
		                    <label for="exampleFormControlSelect2">User Role</label>
		                    <select class="form-control" name="user_role" id="user_role" required>
		                      <option>Admin</option>
		                      <option>Blogger</option>
							  <option value="">Products_Blogger</option>
		                     </select>
		                  </div>

											<div class="form-group">
	                      <label for="exampleInputPassword1">Password</label>
	                      <input type="password" class="form-control" name="password" id="pwd1" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
	                    </div>
	                    <div class="form-group">
	                      <label for="exampleInputConfirmPassword1">Confirm Password</label>
	                      <input type="password" name="pwd2" id="pwd2" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password" required>
	                    </div>

	                    <div class="modal-footer">
		                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		                    <button type="submit" name="UpdateUser" class="btn btn-primary">UPDATE</button>
		                </div>
	                </form>
                </div>

            </div>
        </div>
    </div>







	<!-- modal for creating user account -->
	<div id="largeLargeModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New User Account </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                   <form class="forms-sample" method="post" class="well" action="create/create-user.php">
	                    <div class="form-group">
	                      <label for="exampleInputUsername1">First Name</label>
	                      <input type="text" class="form-control" name="first_name" id="exampleInputUsername1" placeholder="First Name" onkeypress="return(event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && eve.charCode <123)" required>
	                    </div>
	                    <div class="form-group">
	                      <label for="exampleInputUsername1">Last Name</label>
	                      <input type="text" class="form-control" name="last_name" id="exampleInputUsername1" placeholder="Last Name" onkeypress="return(event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && eve.charCode <123)" required>
	                    </div>
	                    <div class="form-group">
	                      <label for="exampleInputEmail1">Email address</label>
	                      <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email" required>
	                    </div>
	                    <div class="form-group">
	                      <label for="exampleInputUsername1">Phone Number</label>
	                      <input type="text" class="form-control" name="phone" id="exampleInputUsername1" placeholder="Phone Number" required>
	                    </div>
	                    <div class="form-group">
	                      <label for="exampleInputUsername1">User Name</label>
	                      <input type="text" class="form-control" name="user_name" id="exampleInputUsername1" placeholder="User Name" required>
	                    </div>
	                    <div class="form-group">
		                    <label for="exampleFormControlSelect2">User Role</label>
		                    <select class="form-control" name="user_role" id="exampleFormControlSelect2" required>
		                      <option>Admin</option>
		                      <option>Blogger</option>
													<option value="">Products_Blogger</option>
		                    </select>
		                </div>

	                    <div class="form-group">
	                      <label for="exampleInputPassword1">Password</label>
	                      <input type="password" class="form-control" name="password" id="pwd1" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
	                    </div>
	                    <div class="form-group">
	                      <label for="exampleInputConfirmPassword1">Confirm Password</label>
	                      <input type="password" name="pwd2" id="pwd2" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password" required>
	                    </div>


	                    <div class="modal-footer">
		                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		                    <button type="submit" name="saveUser" class="btn btn-primary">Save</button>
		                </div>
	                </form>
                </div>

            </div>
        </div>
    </div><!-- end of modal -->

    <?php include('includes/footer.php');?>

		<!-- Delete users Ajax JQuery Script -->
        <script>
            $(document).ready(function(){
                $(document).on('click', '.delete', function(){
                    var id = $(this).attr('id');
                    Dialogify.confirm("<h3 class='text-danger'><b>Are you sure you want to remove this User? </b></h3>", {
                    ok:function(){
                        $.ajax({
                        url:"deletes/delete_user.php",
                        method:"POST",
                        data:{id:id},
                        success:function(data)
                        {
                        Dialogify.alert('<h3 class="text-success text-center"><b>User has been deleted successfully</b></h3>');
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

				<!-- JAVASCRIPT FOR UPDATE SYSTEM USERS -->
		    <script>
			    $(document).ready(function() {

			        $('.editbtn').on('click', function() {
			            $('#users').modal('show');

			            $tr = $(this).closest('tr');

			            var data = $tr.children("td").map(function(){
			              return $(this).text();
			            }).get();

			            console.log(data);

			            $('#update_id').val(data[0]);
			            $('#first_name').val(data[1]);
			            $('#last_name').val(data[2]);
			            $('#email').val(data[3]);
									$('#phone').val(data[4]);
			            $('#user_role').val(data[5]);
			            $('#user_name').val(data[6]);

			        });
			      });
		    </script>
		    <!-- END OF UPDATE SYETEM  USERS -->
</body>
</html>
