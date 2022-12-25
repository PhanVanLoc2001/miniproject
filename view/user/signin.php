<?php include 'view/layout/header.php'?>
  <div class="pt-5">
    <h1 class="text-center mb-5">Login</h1>
    <div class="container">
      <div class="row">
        <div class="col-md-5 mx-auto">
          <div class="card card-body">
            <form id="submitForm" action="?controller=UserController&action=process_signin" method="post" data-parsley-validate="" data-parsley-errors-messages-disabled="true" novalidate="" _lpchecked="1"><input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">
              <div class="form-group required">
                <lSabel for="email">Username / Email</lSabel>
                <input type="text" class="form-control text-lowercase" id="email" required="" name="email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>">
              </div>
              <div class="form-group required">
                <label class="d-flex flex-row align-items-center" for="password">Password
                  <a class="ml-auto border-link small-xl" href="./forget-password.php">Forget?</a></label>
                <input type="password" class="form-control" required="" id="password" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
              </div>
              <div class="form-group mt-4 mb-4">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="remember-me" name="remember-me" data-parsley-multiple="remember-me" value="1">
                  <?php if(isset($_GET['error'])){
                  echo $_GET['error'];
                    } ?>
                  <label class="custom-control-label" for="remember-me">Remember me?</label>
                </div>
              </div>
              <div class="form-group pt-1">
                <button class="btn btn-primary btn-block" type="submit">Log In</button>
              </div>
            </form>
            <p class="small-xl pt-3 text-center">
              <span class="text-muted">Not a member?</span>
              <a href="?controller=UserController&action=signup">Sign up</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include 'view/layout/footer.php'?>