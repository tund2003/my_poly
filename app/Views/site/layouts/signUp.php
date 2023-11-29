<?php view("site.partials.header") ?>
<form class="form form-signUp"
    action="http://localhost/poly_tro/site/auth/signUp"
    method="post">
    <h1 class="form-title">Tạo tài khoản mới</h1>
    <div class="form-content">
        <div class="form-group">
            <label for="" class="form-label">Họ và
                tên</label>
            <input type="text" name="fullname"
                class="form-control" required>
        </div>
        <div class="form-group">
            <label class="form-label">Số điện thoại</label>
            <input type="text" name="phone_number"
                class="form-control" required>
            <?php if (isset($_GET["phoneError"])) : ?>
            <p class="error-massage">Số điện thoại đã
                được đăng ký</p>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" name="email"
                class="form-control" required>
            <?php if (isset($_GET["emailError"])) : ?>
            <p class="error-massage">Email đã
                được đăng ký</p>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label class="form-label">Mật khẩu </label>
            <input type="password" name="password"
                class="form-control" required>
        </div>
        <div class="form-group">
            <select name="facility_id" id="" style="width: 100%;
    padding: 10px 8px;
    border-radius: 5px;" required>
                <option value="">--Chọn cơ sở--
                </option>
                <?php foreach ($facilities as $facility) : ?>
                <option value="<?= $facility['id'] ?>">
                    <?= $facility['name'] ?></option>
                <?php endforeach ?>
            </select>
            <div class="form-group">
            <label for="" class="form-label">Địa chỉ</label>
            <input type="text" name="address"
                class="form-control" required>
        </div>
        </div>
        <button type="submit" class="btn btn-submit">
            Đăng ký
        </button>
        <div class="form-group_direction">
            Bạn đã có tài khoản?
            <a href="http://localhost/poly_tro/site/account?signIn"
                class="forgot-link">
                Đăng nhập ngay
            </a>
            </d>
        </div>
</form>
<?php view("site.partials.footer") ?>