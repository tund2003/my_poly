<?php view("site.partials.header") ?>
<form class="form form-signIn"
    action="http://localhost/poly_tro/site/auth/forgot"
    method="post">
    <h1 class="form-title">Quên mật khẩu</h1>
    <div class="form-content">
        <div class="form-group">
            <label class="form-label">Số điện thoại</label>
            <input type="text" name="phone_number"
                class="form-control" required>
        </div>
        <?php if (isset($phone)) : ?>
        <p class="error-massage" style="font-size: 1.6rem;">
            Mật khẩu của bạn
            là: <span
                style="font-weight: 600;"><?= $phone ?></span>
        </p>
        <?php endif ?>
        <?php if (isset($_GET["error"])) : ?>
        <p class="error-massage">Số điện thoại chưa được
            đăng ký hoặc sai định dạng</p>
        <?php endif ?>
        <button type="submit" class="btn btn-submit">
            Gửi
        </button>
        <div class="form-group_direction">
            <a href="http://localhost/poly_tro/site/account?signUp"
                class="signUp-link">
                Tạo tài khoản mới
            </a>
            </d>
        </div>
</form>
<?php view("site.partials.footer") ?>