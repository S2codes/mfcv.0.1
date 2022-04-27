<!DOCTYPE html>
<html lang="en">

<head>
  <?php
    include "partials/.head.php";
  ?>
  <title>Home | muscleandfinesscare</title>
</head>

<body>
  <!-- navbar  -->
 <?php
   include "partials/header.php";
 ?>
 
  <main class="mt-5" >

    <div class="container-fluid p-0 mt-5">
      <!-- feature products  -->
      <div class="row mt-5">
        <div class="col-md-10 col-12 mx-auto feature_product_container p-0">
          <p class="heading-small text-center">Support</p>
          <h1 class="heading text-center">Customer Support</h1>

          <div class="row mt-5">
              <div class="col-md-8 col-12">
                <form action="#" class="row mt-17">
                    <div class="col-12 col-sm-6">
                        <div class="form-group"><label for="first_name" class="form-label">First name</label> <input
                                type="text" class="form-control" id="first_name"></div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group"><label for="last_name" class="form-label">Last name</label> <input
                                type="text" class="form-control" id="last_name"></div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group"><label for="phone" class="form-label">Phone</label> <input
                                type="text" class="form-control" id="phone"></div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group"><label for="email" class="form-label">Email</label> <input
                                type="text" class="form-control" id="email"></div>
                    </div>
                    <div class="col-12">
                        <div class="form-group"><label for="message" class="form-label">Message</label> <textarea
                                id="message" class="form-control" rows="3">
                              </textarea></div>
                        
                        <div class="form-group mb-0 mt-3"><button class="aboutBtn">Send message</button>
                        </div>
                    </div>
                </form>
              </div>

              <div class="col-md-4 col-12">
                <div class="card border-0 bg-secondary mt-4 mb-4 ml-lg-9">
                    <div class="card-body py-17 px-10 text-center">
                        <!-- <div class="card-icon mb-6 bg-dark"><i class="material-icons">map</i></div> -->
                        <div
                            class="fs-1 lh-1 my-5 font-family-secondary text-uppercase font-weight-bold letter-spacing-caption text-muted">
                            Our address</div>
                        <p class="mb-0 text-body">Brooklyn, NY 11204. 9359<br>Hollow Lane. NY 11706.</p>
                    </div>
                </div>
               
              </div>

          </div>
          
        </div>
      </div>
    </div>

 

  </main>

<?php
  include "partials/footer.php";
?>
  <script src="assets/js/plugins/bootstrap.bundle.min.js"></script>
  <script src="assets/js/plugins/jquery-3.6.0.min.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>