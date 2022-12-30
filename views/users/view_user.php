<?php
require 'views/layout/header.php';
require 'views/users/page_user.php';
?>
<div class="container">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Chức năng</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($arr as $each) {?>
        <tr>
            <td><?php echo $each->getName() ?></td>
            <td><?php echo $each->getEmail() ?></td>
            <td>
                <button type="button" class="btn btn-success"><a href="?controller=UserController&action=edit_user&ID=<?php echo $each->getId()?>" style="color: white;">Sửa</a></button>
                <button type="button" class="btn btn-danger"><a href="?controller=UserController&action=del_user&ID=<?php echo $each->getId()?>" style="color: white;">Xóa</a></button>
            </td>
        </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

