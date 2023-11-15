<?php view("site.partials.accountManageHeader") ?>
<div class="post-new_content">
    <h1 class="post-new__title">Đăng ký thuê
    </h1>
    <form
        action="http://localhost/poly_tro/site/order/saveOrder?id=<?= $_GET["id"] ?>"
        class="post-new_form" method="POST"
        enctype="multipart/form-data">
        <h2 class="post-new_form--title">Thông tin cá nhân
        </h2>
        <div class="form-group">
            <label for="" class="form-label ">Họ và
                tên</label>
            <input type="text"
                class="form-control form-control_normal input-normal"
                name="fullname" required>
        </div>
        <div class="form-group">
            <label for="" class="form-label">Số điện
                thoại</label>
            <input type="text"
                class="form-control form-control_normal input-normal"
                name="phone_number" required>
        </div>
        <div class="form-group">
            <label for="" class="form-label">Căn cước công
                dân</label>
            <input type="text"
                class="form-control form-control_normal input-normal"
                name="cccd" required>
        </div>
        <div class="form-group">
            <label for="" class="form-label">Mã số sinh
                viên</label>
            <input type="text"
                class="form-control form-control_normal input-normal"
                name="student_id" required>
        </div>
        <p class="error-massage">Lưu ý: Bạn chỉ cần
            điền đầy đủ thông tin một lần duy nhất</p>
        <button class="btn btn-submit">Đăng ký</button>
    </form>
</div>
<?php view("site.partials.accountManageFooter") ?>