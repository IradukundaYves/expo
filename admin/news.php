<?php
	include('create/add_news.php');
	include('update/edit_news.php');
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
				                    <p class="card-title">Recent Trending news</p>
				                    <div align="right"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#largeLargeModal">Add News</button></div>
				                  
				                        <div class="table-responsive">
						                    <table id="recent-purchases-listing" class="table">
						                        <thead>
							                        <tr>
													    <th>ID</th>
							                            <th>News Title</th>
							                            <th>News Body</th>
							                            <th>News Image</th>
							                            <th>News Category</th>
							                            <th>News Source</th>
							                            <th>Upload_Date</th>
							                            <th>Edit</th>
							                            <th>Delete</th>
						                            </tr>
					                            </thead>
												<?php
													include('DataBaseConnection.php');
													$sql="SELECT * FROM tbl_news";
													$stmt = $conn->prepare($sql);
													$stmt ->execute();
													$result = $stmt->get_result();
													if($result->num_rows > 0){
													    while ($row = $result->fetch_assoc()) {
															$news_id = $row['news_id'];
												?>
							                        <tr>
							                            <td><?php echo $row['news_id'];?></td>
							                            <td><?php echo $row['news_title'];?></td>
							                            <td><?php echo $row['news_body'];?></td>
							                            <td><img  src="../images/<?php echo $row['news_image']; ?>"></td>
							                            <td><?php echo $row['news_category'];?></td>
														<td><?php echo $row['news_source'];?></td>
														<td><?php echo $row['upload_date'];?></td>
														<td><input type="button" name="update" id="update" class="btn btn-primary editbtn" value="Update" style="padding: 5px"></td>
														<td><button type="button" name="delete" id="<?php echo $row['news_id']; ?>" class="btn btn-danger delete" style="padding: 5px">Delete</button></td>
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

	<!-- modal for posting news -->
	<div id="largeLargeModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Post News</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                   <form class="forms-sample" method="post" enctype="multipart/form-data">
				        
	                    <div class="form-group">
	                      <label for="exampleInputUsername1">News Title</label>
	                      <input type="text" class="form-control" name="news_title" id="exampleInputUsername1" placeholder="write title " required>
	                    </div>
	                    <div class="form-group">
	                       	<label for="exampleInputUsername1">News Body</label>
	                       	<textarea name="news_body" id="news_body" class="form-control" placeholder="type description here" required></textarea>
                        </div>
                        <div class="form-group">
	                    	<label>Choole product Photo</label>
	                        <input type="file" class="form-control" name="news_image" placeholder="Upload Image" required>
                        </div>
	                    <div class="form-group">
		                    <label for="exampleFormControlSelect2">news Category</label>
		                    <select class="form-control" name="news_category" id="exampleFormControlSelect2" required>
		                      <option>Business</option>
		                      <option>Technology</option>
		                    </select>
		                </div>
	                    <div class="form-group">
	                      <label for="exampleInputUsername1">Source</label>
	                      <input type="text" class="form-control" name="news_source" id="exampleInputUsername1" placeholder="company name" required>
	                    </div>

	                    <div class="modal-footer">
		                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		                    <button type="submit" name="publishNews" class="btn btn-primary">Publish News</button>
		                </div>
	                </form>
                </div>
                
            </div>
        </div>
    </div><!-- end of modal -->

	<!-- EDIT PUBLISHED NEWS -->
	<div id="edit_news" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Post News</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                   <form class="forms-sample" method="post" enctype="multipart/form-data">
				        <input type="hidden" name="update_id" id="update_id">
	                    <div class="form-group">
	                      <label for="exampleInputUsername1">News Title</label>
	                      <input type="text" class="form-control" name="news_title" id="title" placeholder="write title" required>
	                    </div>
	                    <div class="form-group">
	                       	<label for="exampleInputUsername1">News Body</label>
	                       	<textarea name="news_body" id="body" class="form-control" placeholder="type description here" required></textarea>
                        </div>
                        <div class="form-group">
	                    	<label>Choole product Photo</label>
	                        <input type="file" class="form-control" name="news_image" id="image" placeholder="Upload Image" required>
                        </div>
	                    <div class="form-group">
		                    <label for="exampleFormControlSelect2">news Category</label>
		                    <select class="form-control" name="news_category" id="category" required>
		                      <option>Business</option>
		                      <option>Technology</option>
		                    </select>
		                </div>
	                    <div class="form-group">
	                      <label for="exampleInputUsername1">Source</label>
	                      <input type="text" class="form-control" name="news_source" id="source" placeholder="company name" required>
	                    </div>

	                    <div class="modal-footer">
		                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		                    <button type="submit" name="updateNews" class="btn btn-primary">Publish News</button>
		                </div>
	                </form>
                </div>
                
            </div>
        </div>
    </div>

    <?php include('includes/footer.php');?>

	
	<!-- DELETE NEWS AJAX JQUERY -->
	<script>
		$(document).ready(function(){
			$(document).on('click', '.delete', function(){
				var id = $(this).attr('id');
				Dialogify.confirm("<h3 class='text-danger'><b>Are you sure you want to remove this Article? </b></h3>", {
				ok:function(){
					$.ajax({
					url:"deletes/delete_news.php",
					method:"POST",
					data:{id:id},
					success:function(data)
					{
					Dialogify.alert('<h3 class="text-success text-center"><b>Article has been deleted successfully</b></h3>');
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

	<script>
		$(document).ready(function() {

			$('.editbtn').on('click', function() {
					$('#edit_news').modal('show');

					$tr = $(this).closest('tr');

					var data = $tr.children("td").map(function(){
						return $(this).text();
					}).get();

					console.log(data);

					$('#update_id').val(data[0]);
					$('#title').val(data[1]);
					$('#body').val(data[2]);
					$('#image').val(data[3]);
					$('#category').val(data[4]);
					$('#source').val(data[5]);

			});
		});
	</script>

	<!-- CKEDITOR -->
	<script>
			 CKEDITOR.replace('news_body');
		</script>
</body>
</html>