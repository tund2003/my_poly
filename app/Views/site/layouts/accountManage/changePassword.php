<?php view("site.partials.accountManageHeader") ?>
<div class="">
    <h1 class="profile__title">Đổi mật khẩu
    </h1>
    <form
        action="http://localhost/poly_tro/site/account/saveChangePassword"
        class="profile-form" method="POST"
        enctype="multipart/form-data">
        <div class="form-group2">
            <label for="" class="form-label">Mật khẩu
                cũ</label>
            <input type="text"
                class="form-control form-control_normal"
                name="oldPassword">
        </div>
        <div class="form-group2">
            <label for="" class="form-label">Mật khẩu
                mới</label>
            <input type="text"
                class="form-control form-control_normal"
                name="newPassword">
        </div>
        <div class="form-group2">
            <label for="" class="form-label">Nhập lại mật
                khẩu mới</label>
            <input type="text"
                class="form-control form-control_normal"
                name="reNewPassword">
        </div>
        <?php if (isset($_GET["error"])) : ?>
        <p class='error-massage'>Bạn đã nhập sai thông
            tin</p>
        <?php endif ?>
        <button class="btn btn-submit">Lưu</button>
    </form>
</div>
<script
    src="http://localhost/poly_tro/public/js/showImageUpload.js">
</script>
<?php view("site.partials.accountManageFooter") ?>