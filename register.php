<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MĀORI</title>
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css"
  rel="stylesheet"
/>

    <style>
        .gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}
    </style>
</head>
<body>
    


<section class="h-100 gradient-form" style="background : url(img1/crystals/gl2.jpg); ;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                 
                  <h4 class="mt-1 mb-5 pb-1"><b>MĀORI</b></h4>
                </div>
                <h3>User Registration</h3>

                <form action="controller/register.php" method="POST">
                  <p>Please register to your account </p>

                  <div class="form-outline mb-4">
                    <input type="text" name="name"  id="form2Example11" class="form-control"
                      placeholder="Your name" required/>
                    <label class="form-label" for="form2Example11">Username</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="tel" name="phone" id="form2Example11" class="form-control"
                      placeholder="Phone number" pattern="[0-9]{10}" title="Please Enter Valid Number" pattern="[0-9]{10}" title="Please Enter Valid Number" required/>
                    <label class="form-label" for="form2Example11">Phone no</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example11" class="form-control"
                      placeholder="email address" required/>
                    <label class="form-label" for="form2Example11">email</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example22" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
                    <label class="form-label" for="form2Example22">Password</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="password" name="repassword" id="form2Example22" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required/>
                    <label class="form-label" for="form2Example22">Confirm Password</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button name="register" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Register</button>
                   
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Already a user?</p>
                    <a href="login.php" class="btn btn-outline-danger">Login</a>
                   
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center" style="background-image: url('img1/light.png');background-repeat:no-repeat;background-size:cover;margin-top:-160px">
              
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"
></script>
</body>
</html>