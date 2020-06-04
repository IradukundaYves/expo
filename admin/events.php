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
				                    <p class="card-title">Upcoming Events</p>
				                    <div align="right"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#largeLargeModal">Add Events</button></div>
				                  
				                        <div class="table-responsive">
						                    <table id="recent-purchases-listing" class="table">
						                        <thead>
							                        <tr>
							                            <th>Event Title</th>
							                            <th>Description</th>
							                            <th>Event Image</th>
							                            <th>News Category</th>
							                            <th>Company</th>
							                            <th>Upload_Date</th>
							                            <th>Edit</th>
							                            <th>Delete</th>
						                            </tr>
					                            </thead>
					                            <tbody>
							                        <tr>
							                            <td>Jeremy Ortega</td>
							                            <td>Levelled up</td>
							                            <td>Catalinaborough</td>
							                            <td>06 Jan 2018</td>
							                            <td>$2274253</td>
							                             <td>$2274253</td>
							                            <td><a href="#" class="btn btn-primary" style="padding: 5px">Edit</a> </td>
							                            <td><a href="#" class="btn btn-danger" style="padding: 5px">Delete</a> </td>
							                        </tr>
							                        <tr>
							                            <td>Alvin Fisher</td>
							                            <td>Ui design completed</td>
							                            <td>East Mayra</td>
							                            <td>18 Jul 2018</td>
							                            <td>$83127</td>
							                             <td>$2274253</td>
							                            <td><a href="#" class="btn btn-primary" style="padding: 5px">Edit</a> </td>
							                            <td><a href="#" class="btn btn-danger" style="padding: 5px">Delete</a> </td>
							                        </tr>
							                        
                                                 </tbody>
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

	<!-- modal for posting events -->
	<div id="largeLargeModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Post Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                   <form class="forms-sample">
	                    <div class="form-group">
	                      <label for="exampleInputUsername1">Event Title</label>
	                      <input type="text" class="form-control" name="event_title" id="exampleInputUsername1" placeholder="write title ">
	                    </div>
	                    <div class="form-group">
	                       	<label for="exampleInputUsername1">Description </label>
	                       	<textarea name="description" class="form-control" placeholder="type description here"></textarea>
                        </div>
                        <div class="form-group">
	                    	<label>Choole Event Photo</label>
	                        <input type="file" class="form-control" name="event_image" placeholder="Upload Image">
                        </div>
	                    <div class="form-group">
		                    <label for="exampleFormControlSelect2">Event Category</label>
		                    <select class="form-control" name="event_category" id="exampleFormControlSelect2">
		                      <option>Tech summit</option>
		                      <option>Business summit</option>
		                      <option>Competition</option>
		                    </select>
		                </div>
	                    <div class="form-group">
	                      <label for="exampleInputUsername1">Company</label>
	                      <input type="text" class="form-control" name="company" id="exampleInputUsername1" placeholder="company name">
	                    </div>

	                    <div class="modal-footer">
		                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		                    <button type="button" class="btn btn-primary">Post</button>
		                </div>
	                </form>
                </div>
                
            </div>
        </div>
    </div><!-- end of modal -->

    <?php include('includes/footer.php');?>
</body>
</html>