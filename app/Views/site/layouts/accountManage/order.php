<?php view("site.partials.accountManageHeader") ?>
<div class="manage-news_title">
    <p>Quản lý thuê phòng</p>
</div>
<div class="manage-news_table">
    <table cellspacing="0">
        <thead>
            <tr>
                <th>Mã</th>
                <th width="300">Tiêu đề và mô tả</th>
                <th>Giá</th>
                <th>Ngày tạo</th>
                <th>Trạng thái</th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($orders as $order) : ?>
            <tr>
                <td><?= $order['order_item_id'] ?></td>
                <td>
                    <a href="http://localhost/poly_tro/site/new?detail=<?= $order['new_id'] ?>"
                        class="table-short_title"
                        style="color: var(--secondaryColor)"><?= $order['title'] ?></a>
                    <p class="table-short_title"><b>Địa
                            chỉ:</b>
                        <?= $order['address'] ?>
                    </p>
                </td>
                <td><?= price_format($order['price']) ?>
                </td>
                <td><?= $order['order_created_at'] ?></td>
                <td><?= $order['status'] == 0 ? "Đang duyệt" : "Đã duyệt" ?>
                </td>
                <td><a href="http://localhost/poly_tro/site/order/deleteOrder?id=<?= $order['order_item_id'] ?>"
                        class="btn-remover">Xóa</a>
                </td>
                <?php if ($order['status'] == 0) : ?>
                </td>
                <td>Chờ thanh toán</td>
                <?php else : ?>
                    <td>
                <form action="http://localhost/vnpay_php/" method="POST">
                    <button type="submit" class="btn btn-success">Thanh Toán VNP</button>
                </form>
                </td>
                <?php endif; ?>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php view("site.partials.accountManageFooter") ?>