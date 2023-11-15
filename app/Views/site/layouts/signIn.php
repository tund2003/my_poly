<?php view("site.partials.header")?>
    <form class="form form-signIn" action="http://localhost/poly_tro/site/auth/signIn" method="post">
        <h1 class="form-title">Đăng nhập</h1>
        <div class="form-content">
            <div class="form-group">
                <label class="form-label">Số điện thoại</label>
                <input type="text" name="phone_number" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="form-label">Mật khẩu</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <?php if(isset($_GET['error'])) :?>
                <p class="error-massage">Sai tài khoản hoặc mật khẩu</p>
            <?php endif?>
            <button type="submit" class="btn btn-submit">
                Đăng nhập
            </button>
            <div class="form-group_direction">
                <a href="http://localhost/poly_tro/site/account?forgot" class="forgot-link">
                    Bạn quên mật khẩu?
                </a>
                <a href="http://localhost/poly_tro/site/account?signUp" class="signUp-link">
                    Tạo tài khoản mới
                </a>
            </d>
        </div>
    </form>
<?php view("site.partials.footer")?>