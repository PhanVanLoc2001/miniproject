<?php
include 'views/layout/header.php';
include 'views/users/page_user.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card card-body">

                <form id="submitForm" action="?controller=UserController&action=process_update" method="post" data-parsley-validate="" data-parsley-errors-messages-disabled="true" novalidate="" _lpchecked="1"><input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">
                    <input type="hidden" name="ID" value="<?php echo $each->getId()?>">
                    <div class="form-group required">
                        <lSabel for="name">Username</lSabel>
                        <input type="text" class="form-control text-lowercase" id="name" required="" name="name" value="<?php echo $each->getName() ?>">
                    </div>
                    <div class="form-group required">
                        <lSabel for="name">Email</lSabel>
                        <input type="email" class="form-control text-lowercase" id="email" required="" name="email" value="<?php echo $each->getEmail() ?>">
                    </div>
                    <div class="form-group pt-1">
                        <button class="btn btn-primary btn-block" type="submit">Sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
