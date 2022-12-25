<?php include 'view/layout/header.php' ?>
  <div class="pt-5">
    <h1 class="text-center">Đăng ký</h1>
    <div class="container">
      <div class="row">
        <div class="col-md-5 mx-auto">
          <div class="card card-body">
            <form id="submitForm" action="?controller=UserControlleraction=process_signup" method="post" data-parsley-validate="" data-parsley-errors-messages-disabled="true" novalidate="" _lpchecked="1"><input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">
              <div class="form-group required">
                <lSabel for="name">Username</lSabel>
                <input type="text" class="form-control text-lowercase" id="name" required="" name="name" value="">
              </div>
              <div class="form-group required">
                <lSabel for="name">Email</lSabel>
                <input type="email" class="form-control text-lowercase" id="email" required="" name="email" value=""> 
                <?php if(isset($_GET['error'])){
                  echo $_GET['error'];
                    } ?>
              </div>
              <div class="form-group required">
                <label class="d-flex flex-row align-items-center" for="password">Password
                  <a class="ml-auto border-link small-xl" href="./forget-password.php"></a></label>
                <input type="password" class="form-control" required="" id="password" name="password" value="">
              </div>
              <div class="form-group mt-4 mb-4">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="remember-me" name="remember-me" data-parsley-multiple="remember-me">
                </div>
              </div>
              <div class="form-group pt-1">
                <button class="btn btn-primary btn-block" type="submit">Log up</button>
              </div>
            </form>
            <p class="small-xl pt-3 text-center">
              <span class="text-muted">you are member?</span>
              <a href="?controller=UserController&action=signin">Sign in</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include 'view/layout/footer.php' ?>