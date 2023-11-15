<?php view("site.partials.accountManageHeader") ?>
<div class="post-new_content">
    <h1 class="post-new__title">Sửa tin đăng</h1>
    <form
        action="http://localhost/poly_tro/site/account/saveUpdateNew?id=<?= $new['id'] ?>"
        class="post-new_form" method="POST"
        enctype="multipart/form-data">
        <h2 class="post-new_form--title">Địa chỉ cho thuê
        </h2>
        <div class="form-group">
            <label for="" class="form-label">Cơ sở</label>
            <select name="facility" id=""
                class="form-control form-control_normal input-normal">
                <option value="">--- Chọn cơ sở ---
                </option>
                <?php foreach ($facilities as $facility) : ?>
                <option value="<?= $facility['id'] ?>"
                    <?= $new['facility_id'] == $facility['id'] ? "selected=selected" : "" ?>>
                    <?= $facility['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="" class="form-label">Địa chỉ
                chính xác</label>
            <input type="text"
                class="form-control form-control_normal"
                name="address"
                value="<?= $new['address'] ?>">
        </div>
        <h2 class="post-new_form--title">Thông tin mô tả
        </h2>
        <div class="form-group">
            <label for="" class="form-label">Loại chuyên
                mục</label>
            <select name="category" id=""
                class="form-control form-control_normal input-normal">
                <option value="">--- Chọn loại chuyên mục
                    ---</option>
                <?php foreach ($categories as $category) : ?>
                <option value="<?= $category['id'] ?>"
                    <?= $new['category_id'] == $category['id'] ? "selected=selected" : "" ?>>
                    <?= $category['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="" class="form-label">Tiêu
                đề</label>
            <input type="text"
                class="form-control form-control_normal"
                name="title" value="<?= $new['title'] ?>">>
        </div>
        <div class="form-group">
            <label for="" class="form-label">Nội dung mô
                tả</label>
            <textarea name="description" id="" rows="15"
                minlength="100" class="form-control_normal"
                style="padding: 5px 10px; font-size: 1.6rem"
                required><?= $new['description'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="" class="form-label">Thông tin liên
                hệ</label>
            <input type="text"
                class="form-control form-control_normal form-control_disabled input-normal"
                disabled value="<?= $new['fullname'] ?>">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Số điện
                thoại</label>
            <input type="text"
                class="form-control form-control_normal form-control_disabled input-normal"
                disabled value="<?= $new['phone'] ?>">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Giá cho
                thuê</label>
            <div class="input-group input-normal">
                <input type="text"
                    class="form-control form-control_normal"
                    style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;"
                    name="price"
                    value="<?= $new['price'] ?>">
                <div class="input-group_append">
                    <span
                        class="input-group_text">Đồng</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="form-label">Diện
                tích</label>
            <div class="input-group input-normal">
                <input name="area" type="number"
                    class="form-control form-control_normal"
                    value="<?= $new['area'] ?>"
                    style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                <div class="input-group_append">
                    <span
                        class="input-group_text">m<sup>2</sup></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="form-label">Số người
            </label>
            <div class="input-group input-normal">
                <input name="number_people" type="number"
                    class="form-control form-control_normal "
                    value="<?= $new['number_people'] ?>"
                    style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                <div class="input-group_append">
                    <span
                        class="input-group_text">người</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="form-label">Hình
                ảnh</label>
            <input type="file" id="files"
                multiple="multiple"
                accept="image/jpeg, image/png, image/jpg"
                name="images[]"
                style="font-size: 1.6rem; margin-bottom: 20px">
            <output id="images-result">
                <?php foreach (handleImage($new['image']) as $image) : ?>
                <div>
                    <img class="thumbnail"
                        src="http://localhost/poly_tro/<?= $image ?>">
                </div>
                <?php endforeach ?>
            </output>
        </div>
        <button class="btn btn-submit">Lưu</button>
    </form>
</div>
<script
    src="http://localhost/poly_tro/public/js/showImageUpload.js">
</script>
<?php view("site.partials.accountManageFooter") ?>