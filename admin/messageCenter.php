<!DOCTYPE html>
<html>
<!-- including the file that contains css style in header -->
<?php include('includes/UIStyles.php');?>
<style>

	/*Content Container*/
	.content-container {
	    background-color:#fff;
	    padding:35px 20px;
	    margin-bottom:20px;
	}
	h1.content-title{
	    font-size:32px;
	    font-weight:300;
	    text-align:center;
	    margin-top:0;
	    margin-bottom:20px;
	    font-family: 'Open Sans', sans-serif!important;
	}
	/*Compose*/
	.btn-send{
	    text-align:center;
	    margin-top:20px;
	}
	/*mail list*/

	ul.mail-list{
	    padding:0;
	    margin:0;
	    list-style:none;
	    margin-top:30px;
	}
	ul.mail-list li a{
	    display:block;
	    border-bottom:1px dotted #CFCFCF;
	    padding:20px;
	    text-decoration:none;
	}
	ul.mail-list li:last-child a{
	    border-bottom:none;
	}
	ul.mail-list li a:hover{
	    background-color:#DBF9FF;
	}
	ul.mail-list li span{
	    display:block;
	}
	ul.mail-list li span.mail-sender{
	    font-weight:600;
	    color:#8F8F8F;
	}
	ul.mail-list li span.mail-subject{
	    color:#8C8C8C;
	}
	ul.mail-list li span.mail-message-preview{
	    display:block;
	    color:#A8A8A8;
	}
</style>
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
				                    <p class="card-title">Recent Messages</p>

				                    <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
  	<a href="#compose" class="btn btn-danger" id="nav-compose-tab" data-toggle="tab" role="tab"><i class="mdi mdi-pen"></i> Compose</a>
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Inbox</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-sentMail" role="tab" aria-controls="nav-profile" aria-selected="false">Sent Mail</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Draft</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-trash" role="tab" aria-controls="nav-contact" aria-selected="false">Trash</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">

	<div class="tab-pane fade" id="compose" role="tabpanel" aria-labelledby="nav-profile-tab">
		<div class="container"> 
	        <form action="#" class="was-validated"> 
	            <div class="form-group"> 
	                <label for="email">To Email</label> 
	                <input type="email" class="form-control" id="email"
	                    placeholder="Enter Email Id" name="email" required> 
	                <div class="valid-feedback">Valid</div> 
	                <div class="invalid-feedback"> 
	                    Please fill this field 
	                </div> 
	            </div> 
	            <div class="form-group"> 
	                <label for="fname">Subject</label> 
	                <input type="text" class="form-control" id="fname"
	                    placeholder="Enter First Name" name="subject" required> 
	                <div class="valid-feedback">Valid</div> 
	                <div class="invalid-feedback"> 
	                    Please fill this field 
	                </div> 
	            </div> 
	            <div class="form-group"> 
	                <label for="message">Message</label> 
	                <textarea class="form-control" placeholder="Enter message here" name="message" required style="height: 150px"></textarea>
	                
	                <div class="valid-feedback">Valid</div> 
	                <div class="invalid-feedback"> 
	                    Please fill this field 
	                </div> 
	            </div> 
	              
	   
	              
	            <div class="form-group form-check"> 
	                <label class="form-check-label"> 
	                    <input class="form-check-input form-control" type="checkbox"
	                        name="remember" required> I agree 
	                    <div class="valid-feedback">Valid</div> 
	                    <div class="invalid-feedback"> 
	                        Please check the checkbox 
	                    </div> 
	                </label> 
	            </div> 
	              
	            <button type="submit" class="btn bg-success">Submit</button> 
	        </form> 
        </div> 
	</div>

    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
	  	<div class="tab-pane active" id="inbox">
	        <div class="container">
	           <div class="content-container clearfix">
	               <div class="col-md-12">
	                   <input type="search" placeholder="Search Mail" class="form-control mail-search" />
	                   <ul class="mail-list">
	                       <li>
	                           <a href="">
	                               <span class="mail-sender">You Tube</span>
	                               <span class="mail-subject">New subscribers!</span>
	                               <span class="mail-message-preview">You have ten more subscriptions click her...</span>
	                           </a>
	                       </li>
	                       <li>
	                           <a href="">
	                               <span class="mail-sender">You Tube</span>
	                               <span class="mail-subject">New subscribers!</span>
	                               <span class="mail-message-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil eveniet ipsum nisi? Eaque odio quae debitis saepe explicabo alias sit tenetur animi...</span>
	                           </a>
	                       </li>
	                       <li>
	                           <a href="">
	                               <span class="mail-sender">You Tube</span>
	                               <span class="mail-subject">New subscribers!</span>
	                               <span class="mail-message-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil eveniet ipsum nisi? Eaque odio quae debitis saepe explicabo alias sit tenetur animi...</span>
	                           </a>
	                       </li>
	                       <li>
	                           <a href="">
	                               <span class="mail-sender">You Tube</span>
	                               <span class="mail-subject">New subscribers!</span>
	                               <span class="mail-message-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil eveniet ipsum nisi? Eaque odio quae debitis saepe explicabo alias sit tenetur animi...</span>
	                           </a>
	                       </li>
	                       <li>
	                           <a href="">
	                               <span class="mail-sender">You Tube</span>
	                               <span class="mail-subject">New subscribers!</span>
	                               <span class="mail-message-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil eveniet ipsum nisi? Eaque odio quae debitis saepe explicabo alias sit tenetur animi...</span>
	                           </a>
	                        </li>
	                    </ul>
	                </div>
	            </div>
	        </div>
	      
	    </div>
    </div>

    <div class="tab-pane fade" id="nav-sentMail" role="tabpanel" aria-labelledby="nav-profile-tab">
	  	<div class="container">
	        <div class="content-container clearfix">
	            <div class="col-md-12">
	               <input type="search" placeholder="Search Mail" class="form-control mail-search" />
	               <ul class="mail-list">
	                   <li>
	                       <a href="">
	                           <span class="mail-sender">You Tube</span>
	                           <span class="mail-subject">New subscribers!</span>
	                           <span class="mail-message-preview">You have ten more subscriptions click her...</span>
	                       </a>
	                   </li>
	                   <li>
	                       <a href="">
	                           <span class="mail-sender">You Tube</span>
	                           <span class="mail-subject">New subscribers!</span>
	                           <span class="mail-message-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil eveniet ipsum nisi? Eaque odio quae debitis saepe explicabo alias sit tenetur animi...</span>
	                       </a>
	                   </li>
	                </ul>
	            </div>
	        </div>
	    </div>
	</div>

    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
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
                   <form class="forms-sample">
	                    <div class="form-group">
	                      <label for="exampleInputUsername1">Company Name</label>
	                      <input type="text" class="form-control" name="" id="exampleInputUsername1" placeholder="Username">
	                    </div>
	                    <div class="form-group">
	                      <label for="exampleInputUsername1">Product Name</label>
	                      <input type="text" class="form-control" name="" id="exampleInputUsername1" placeholder="Username">
	                    </div>
	                    <div class="form-group">
	                    	<label>Choole product Photo</label>
	                        <input type="file" class="form-control" placeholder="Upload Image">
                        </div>

                       <div class="form-group">
                       	<label for="exampleInputUsername1">Product Description</label>
                       	<textarea name="" class="form-control" placeholder="type description here"></textarea>
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