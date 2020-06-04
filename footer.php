<?php include("signin.php"); ?>
<footer class="footer-distributed">
    <div class="footer-left">
        <img src="images/logo2.jpg" height="60">
      <h3>About<span>DigExpo</span></h3>

      <p class="footer-links">
        <a href="#">Home</a>
        |
        <a href="#">About</a>
        |
        <a href="#">Contact</a>
      </p>

      <p class="footer-company-name">© 2020 DigExpo. Ltd.</p>
    </div>

    <div class="footer-center">
      <div>
        <i class="fa fa-map-marker"></i>
          <p><span>KG 687st -
            KIGALI, GASABO, GISOZI - </span>
          </p>
      </div>

      <div>
        <i class="fa fa-phone"></i>
        <p>+2509676664, +2504871958</p>
      </div>
      <div>
        <i class="fa fa-envelope"></i>
        <p><a href="#">yves@digexpo, danny@digexpo.com</a></p>
      </div>
    </div>
    <div class="footer-right">
      <p class="footer-company-about">
        <span>About the company</span>
        We offer training and skill building courses across Technology, Design,software development.</p>
      <div class="">
          <a href="#" class="scl-btn scl-crcl shadow fab fa-twitter"></a>
      <a href="#" class="scl-btn scl-crcl shadow fab fa-linkedin-in"></a>
      <a href="#" class="scl-btn scl-crcl shadow fab fa-whatsapp"></a>
      <a href="#" class="scl-btn scl-crcl shadow fab fa-instagram"></a>
      <a href="#" class="scl-btn scl-crcl shadow fab fa-youtube"></a>
      <!-- <a href="#" class="scl-btn scl-crcl shadow fab fa-pinterest"></a> footer-social as class-->
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- comment modal -->
  <div id="commentModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Write Your Comment Here!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
            <form class="well" method="post">
              <div class="form-group">
                <input type="test" name="comment" id="comment" class="form-control" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success" style="background: #66CDAA;">Post</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  <!-- end of comment modal -->

  <!-- signup modal -->
  <div id="smallModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog ">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Sign Up Here</h5>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
              <form class="well" method="post">
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
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" id="password" placeholder="password" class="form-control" required>
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
  <!-- end signup modal -->

  <!-- sign-in form -->
  <div id="loginModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Sign-In </h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <form class="well login-modal" action="signin.php" method="post">
            <h3 class="text-center">Login Here</h3><br>
            <div class="form-group">
              <input type="email" name="email" id="email" class="form-control <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>" placeholder="Email address" required autofocus>
              <span class="help-block"><?php echo $email_err; ?></span>
            </div><br>
            <div class="form-group">
              <input type="password" name="password" id="password" class="form-control <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" placeholder="Password" required>
              <span class="help-block"><?php echo $password_err; ?></span>
            </div>

            <!-- <div class="custom-control custom-checkbox" style="margin: 0 auto;">
              <input type="checkbox" class="custom-control-input" id="customCheck1">
              <label class="custom-control-label" for="customCheck1">Remember password</label>
            </div><br> -->
            <button class="btn btn-lg btn-success btn-block text-uppercase btn-rounded" type="submit" style="background: #66CDAA">Sign in</button><br>
          </form>
        </div>

      </div>
    </div>
  </div>

  <!-- JS files: jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap.min.js.map"></script>
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/typed/typed.min.js"></script>
  <!-- into type word slider -->
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/counterup/jquery.waypoints.min.js"></script>
  <script src="lib/counterup/jquery.counterup.js"></script>
  <!-- end -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/bootstrap.bundle.min.js.map"></script>
  <!-- share button js -->
  <!-- scrolling and looping gallery -->
  <script src="js/scrolling_looping_gallery.js"></script>
  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- javascript for triggering tooltip-->
  <script>
      $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();
      });
  </script>
  <!-- scrolled Effect -->
  <script>
      $(function() {
      var header = $(".navbar");

      $(window).scroll(function() {
          var scroll = $(window).scrollTop();
          if (scroll >= 50) {
              header.addClass("scrolled");
          } else {
              header.removeClass("scrolled");
          }
      });

    });
  </script>