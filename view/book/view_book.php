<?php
session_start();
if(empty($_SESSION['ID']))
{
    header("location: ?controller=UserController");
}
?>
<?php include "view/layout/header.php"; ?>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">MiniProject</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?controller=UserController&action=view_user">Hiển thị các user</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?controller=BookController&action=view_book">Quản lý sách</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?controller=UserController&action=process_signout">Đăng xuất</a>
            </li>
        </ul>
    </nav>
    <div class="p-2 mb-5 bg-success text-white"><h5>Xin chào, <?php echo $_SESSION['name']; ?></h5></div>

    <div class="container">
        <h5 class="mb-3">Quản lý sách</h5>
        <form action="?controller=BookController&action=create" method="POST" enctype="multipart/form-data">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createBook">
                Thêm mới
            </button>

            <!-- Modal -->
            <div class="modal fade" id="createBook" tabindex="-1" aria-labelledby="createBook" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm sách mới</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-8 mb-2 mx-0">
                                    <label for="title" class="form-label">Tên sách</label>
                                    <input type="title" name="title" class="form-control" id="title">
                                </div>
                                <div class="col-4 mb-2 mx-0">
                                    <label for="author" class="form-label">Tác giả</label>
                                    <input type="author" name="author" class="form-control" id="author">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 mb-2 mx-0">
                                    <label for="published_date" class="form-label">Năm xuất bản</label>
                                    <input type="published_date" name="published_date" class="form-control" id="published_date">
                                </div>
                                <div class="col-8 mb-2 mx-0">
                                    <label for="publisher" class="form-label">Nhà xuất bản</label>
                                    <input type="publisher" name="publisher" class="form-control" id="publisher">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="des" class="form-label">Mô tả</label>
                                <textarea name="description" class="form-control" id="$description" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                            <button type="submit" name="btnSubmitBook" class="btn btn-primary" data-bs-dismiss="modal">Thêm mới</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Tên sách</th>
                <th scope="col">Tác giả</th>
                <th scope="col">Năm xuất bản</th>
                <th scope="col">Nhà xuất bản</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xoá</th>
            </tr>
            </thead>
            <tbody>
            <?php if(isset($data)){ ?>
                <?php foreach ($data as $book) {?>
                    <tr>
                        <td><?php echo $book['id']?></td>
                        <td> <?php echo $book['title']?> </td>
                        <td> <?php echo $book['author']?> </td>
                        <td> <?php echo $book['published_date']?> </td>
                        <td> <?php echo $book['publisher']?> </td>
                        <td><i class="bi bi-pencil-square" data-bs-toggle="modal" data-bs-target=<?php echo "#editBook".$book['id']?>></i></td>
                        <td><a href= <?php echo"?controller=BookController&action=delete&id=". $book['id'] ?>><i class="bi bi-trash"></a></i></td>
                        <form action=<?php echo "?controller=BookController&action=edit"?> <?php echo $book['id']?> method="POST" enctype="multipart/form-data">
                            <!-- Modal -->
                            <div class="modal fade" id=<?php echo "editBook".$book['id']?> tabindex="-1" aria-labelledby="createBook" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Sửa sách </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input class="d-none" name="id" type="text" value=<?php echo $book['id']?>>
                                            <div class="row">
                                                <div class="col-8 mb-2 mx-0">
                                                    <label for="title" class="form-label">Tên sách</label>
                                                    <input type="title" value=<?php echo $book['title']?> name="title" class="form-control" id="title">
                                                </div>
                                                <div class="col-4 mb-2 mx-0">
                                                    <label for="author" class="form-label">Tác giả</label>
                                                    <input type="author" value=<?php echo $book['author']?> name="author" class="form-control" id="author">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4 mb-2 mx-0">
                                                    <label for="published_date" class="form-label">Năm xuất bản</label>
                                                    <input type="published_date" value="<?php echo $book['published_date']?> " name="published_date" class="form-control" id="published_date">
                                                </div>
                                                <div class="col-8 mb-2 mx-0">
                                                    <label for="publisher" class="form-label">Nhà xuất bản</label>
                                                    <input type="publisher" value="<?php echo $book['publisher']?>" name="publisher" class="form-control" id="publisher">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="des" class="form-label">Mô tả</label>
                                                <textarea name="description" class="form-control" id="$description" rows="6"><?php echo $book['description']?></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                                            <button type="submit" name="btnSubmitBook" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </tr>
                 <?php } ?>
            <?php } ?>
            </tbody>
        </table>
    </div>

<!-- show error validate form-->
<div id="myToast" class="bg-danger mb-4  toast toast-container position-absolute bottom-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <strong class="me-auto">Thông báo</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body text-white">
        Hello, world! This is a toast message.
    </div>
</div>

<?php include "view/layout/footer.php"?>

