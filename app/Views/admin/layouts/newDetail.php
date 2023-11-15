<?php view("admin.partials.header") ?>
<div class="app-content">
    <div class="app-content-header">
        <h1 class="app-content-headerText">Quản lý tin
            đăng</h1>
        <button class="mode-switch" title="Switch Theme">
            <svg class="moon" fill="none"
                stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2"
                width="24" height="24" viewBox="0 0 24 24">
                <defs></defs>
                <path
                    d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z">
                </path>
            </svg>
        </button>
    </div>
    <div class="app-content-actions">
        <div class="app-content-actions-wrapper">
            <div class="filter-button-wrapper">
                <button
                    class="action-button filter jsFilter"><span>Filter</span><svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16"
                        viewBox="0 0 24 24" fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-filter">
                        <polygon
                            points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                    </svg></button>
                <div class="filter-menu ">
                    <label>Category</label>
                    <select>
                        <option>All Categories</option>
                        <option>Furniture</option>
                        <option>Decoration</option>
                        <option>Kitchen</option>
                        <option>Bathroom</option>
                    </select>
                    <label>Status</label>
                    <select>
                        <option>All Status</option>
                        <option>Active</option>
                        <option>Disabled</option>
                    </select>
                    <div class="filter-menu-buttons">
                        <button class="filter-button reset">
                            Reset
                        </button>
                        <button class="filter-button apply">
                            Apply
                        </button>
                    </div>
                </div>
            </div>
            <button class="action-button list active"
                title="List View">
                <svg xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16"
                    viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-list">
                    <line x1="8" y1="6" x2="21" y2="6" />
                    <line x1="8" y1="12" x2="21" y2="12" />
                    <line x1="8" y1="18" x2="21" y2="18" />
                    <line x1="3" y1="6" x2="3.01" y2="6" />
                    <line x1="3" y1="12" x2="3.01"
                        y2="12" />
                    <line x1="3" y1="18" x2="3.01"
                        y2="18" />
                </svg>
            </button>
            <button class="action-button grid"
                title="Grid View">
                <svg xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16"
                    viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-grid">
                    <rect x="3" y="3" width="7"
                        height="7" />
                    <rect x="14" y="3" width="7"
                        height="7" />
                    <rect x="14" y="14" width="7"
                        height="7" />
                    <rect x="3" y="14" width="7"
                        height="7" />
                </svg>
            </button>
        </div>
    </div>
    <div class="products-area-wrapper container">
        <div class="post-new_content">
            <form
                action="http://localhost/poly_tro/admin/new/saveUpdate?id=<?= $new['id'] ?>"
                class="post-new_form" method="POST"
                enctype="multipart/form-data">
                <h2
                    class="post-new_form--title app-content-headerText">
                    Địa chỉ
                    cho
                    thuê
                </h2>
                <div class="form-group">
                    <label for=""
                        class="form-label app-content-headerText">Cơ
                        sở</label>
                    <select name="facility" id=""
                        class="form-control form-control_normal input-normal form-control_disabled"
                        disabled>
                        <option value="">--- Chọn
                            cơ sở
                            ---
                        </option>
                        <?php foreach ($facilities as $facility) : ?>
                        <option
                            value="<?= $facility['id'] ?>"
                            <?= $new['facility_id'] == $facility['id'] ? "selected=selected" : "" ?>>
                            <?= $facility['name'] ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for=""
                        class="form-label app-content-headerText">Địa
                        chỉ
                        chính xác</label>
                    <input type="text"
                        class="form-control form-control_normal form-control_disabled"
                        name="address"
                        value="<?= $new['address'] ?>"
                        disabled>
                </div>
                <h2
                    class="post-new_form--title app-content-headerText">
                    Thông tin
                    mô
                    tả
                </h2>
                <div class="form-group">
                    <label for=""
                        class="form-label app-content-headerText">Loại
                        chuyên
                        mục</label>
                    <select name="category" id=""
                        class="form-control form-control_normal input-normal form-control_disabled"
                        disabled>
                        <option value="">--- Chọn loại
                            chuyên
                            mục
                            ---</option>
                        <?php foreach ($categories as $category) : ?>
                        <option
                            value="<?= $category['id'] ?>"
                            <?= $new['category_id'] == $category['id'] ? "selected=selected" : "" ?>>
                            <?= $category['name'] ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for=""
                        class="form-label app-content-headerText">Tiêu
                        đề</label>
                    <input type="text"
                        class="form-control form-control_normal form-control_disabled"
                        name="title"
                        value="<?= $new['title'] ?>"
                        disabled>
                </div>
                <div class="form-group">
                    <label for=""
                        class="form-label app-content-headerText">Nội
                        dung
                        mô
                        tả</label>
                    <textarea name="description" id=""
                        disabled rows="15" minlength="100"
                        class="form-control_normal form-control_disabled"
                        style="padding: 5px 10px; font-size: 1.6rem"
                        required><?= $new['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for=""
                        class="form-label app-content-headerText ">Thông
                        tin
                        liên
                        hệ</label>
                    <input type="text"
                        class="form-control form-control_normal form-control_disabled input-normal form-control_disabled"
                        disabled
                        value="<?= $new['fullname'] ?>">
                </div>
                <div class="form-group">
                    <label for=""
                        class="form-label app-content-headerText">Số
                        điện
                        thoại</label>
                    <input type="text"
                        class="form-control form-control_normal form-control_disabled input-normal"
                        disabled
                        value="<?= $new['phone'] ?>">
                </div>
                <div class="form-group">
                    <label for=""
                        class="form-label app-content-headerText">Giá
                        cho
                        thuê</label>
                    <div class="input-group input-normal">
                        <input type="text"
                            class="form-control form-control_normal form-control_disabled"
                            style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;"
                            name="price" disabled
                            value="<?= $new['price'] ?>">
                        <div class="input-group_append">
                            <span
                                class="input-group_text">Đồng</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for=""
                        class="form-label app-content-headerText">Diện
                        tích</label>
                    <div class="input-group input-normal">
                        <input name="area" type="number"
                            class="form-control form-control_normal form-control_disabled"
                            value="<?= $new['area'] ?>"
                            disabled
                            style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                        <div class="input-group_append">
                            <span
                                class="input-group_text">m<sup>2</sup></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for=""
                        class="form-label app-content-headerText">Số
                        người
                    </label>
                    <div class="input-group input-normal">
                        <input name="number_people"
                            type="number"
                            class="form-control form-control_normal form-control_disabled"
                            value="<?= $new['number_people'] ?>"
                            disabled
                            style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                        <div class="input-group_append">
                            <span
                                class="input-group_text">người</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for=""
                        class="form-label app-content-headerText">Hình
                        ảnh</label>
                    <output id="images-result">
                        <?php foreach (handleImage($new['image']) as $image) : ?>
                        <div>
                            <img class="thumbnail"
                                src="http://localhost/poly_tro/<?= $image ?>">
                        </div>
                        <?php endforeach ?>
                    </output>
                </div>
                <button
                    class="btn btn-submit">Duyệt</button>
            </form>
        </div>
    </div>
</div>
<?php view("admin.partials.footer") ?>