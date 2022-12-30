<?php
require 'views/layout/header.php';
require 'views/users/page_user.php';

?>

<div class="container">
    <h5 class="mb-3">Quản lý sách</h5>
    <form action="?action=create_book" method="POST" enctype="multipart/form-data">
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
                                <label for="title" class="form-label">Tên sách(<span class="text-danger">*</span>)</label>
                                <input require type="title" name="title" class="form-control" id="title">
                            </div>
                            <div class="col-4 mb-2 mx-0">
                                <label for="author" class="form-label">Tác giả(<span class="text-danger">*</span>)</label>
                                <input require type="author" name="author" class="form-control" id="author">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-2 mx-0">
                                <label for="published_date" class="form-label">Năm xuất bản(<span class="text-danger">*</span>)</label>
                                <input require type="published_date" name="published_date" class="form-control" id="published_date">
                            </div>
                            <div class="col-8 mb-2 mx-0">
                                <label for="publisher" class="form-label">Nhà xuất bản(<span class="text-danger">*</span>)</label>
                                <input require type="publisher" name="publisher" class="form-control" id="publisher">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="des" class="form-label">Mô tả</label>
                            <textarea require name="description" class="form-control" id="$description" rows="6"></textarea>
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
            <?php foreach ($arr as $book) {?>
                <tr>
                    <td><?php echo $book->getId() ?></td>
                    <td> <?php echo $book->getTitle() ?> </td>
                    <td> <?php echo $book->getAuthor() ?> </td>
                    <td> <?php echo $book->getPublishedDate() ?></td>
                    <td> <?php echo $book->getPublisher() ?></td>
                    <td><i class="bi bi-pencil-square" data-bs-toggle="modal" data-bs-target=<?php echo "#editBook".$book->getId()?>></i></td>
                    <td><i class="bi bi-pencil-square" data-bs-toggle="modal" data-bs-target=<?php echo "#deleteBook".$book->getId()?>></i></td>
        
                    <form action= <?php echo "?controller=BookController&action=update_book"?> method="POST" enctype="multipart/form-data">
                        <!-- Modal sửa -->
                        <div class="modal fade" id=<?php echo "editBook".$book->getId()?> tabindex="-1" aria-labelledby="createBook" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Sửa sách </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input class="d-none" name="id" type="text" value=<?php echo $book->getId()?>>
                                        <div class="row">
                                            <div class="col-8 mb-2 mx-0">
                                                <label for="title" class="form-label">Tên sách(<span class="text-danger">*</span>)</label>
                                                <input require type="title" value=<?php echo $book->getTitle()?> name="title" class="form-control" id="title">
                                            </div>
                                            <div class="col-4 mb-2 mx-0">
                                                <label for="author" class="form-label">Tác giả(<span class="text-danger">*</span>)</label>
                                                <input require type="author" value=<?php echo $book->getAuthor()?> name="author" class="form-control" id="author">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 mb-2 mx-0">
                                                <label for="published_date" class="form-label">Năm xuất bản(<span class="text-danger">*</span>)</label>
                                                <input require type="published_date" value="<?php echo $book->getPublishedDate() ?> " name="published_date" class="form-control" id="published_date">
                                            </div>
                                            <div class="col-8 mb-2 mx-0">
                                                <label for="publisher" class="form-label">Nhà xuất bản(<span class="text-danger">*</span>)</label>
                                                <input require type="publisher" value="<?php echo $book->getPublisher() ?>" name="publisher" class="form-control" id="publisher">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="des" class="form-label">Mô tả</label>
                                            <textarea require name="description" class="form-control" id="$description" rows="6"><?php echo $book->getDescription()?></textarea>
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
                    <form action= <?php echo "?controller=BookController&action=delete_book&id=". $book->getId()?> method="POST" enctype="multipart/form-data">
                        <!-- Modal xoá -->
                        <div class="modal fade" id=<?php echo "deleteBook".$book->getId()?> tabindex="-1" aria-labelledby="createBook" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thông báo </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p> Bạn chắc chắn muốn xoá sách này ?</p>
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


