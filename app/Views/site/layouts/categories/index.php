<?php view("site.partials.header") ?>
<div class="main-content clear" style="margin-top: 40px">
    <!-- boxtrai -->
    <div class="boxtrai mr">
        <div class=" clear">
            <div class="box1 menu2">
                <h2 style="margin-bottom: 8px">DANH SÁCH BÀI
                    ĐĂNG </h2>
                <ul>
                    <span style="font-size: 1.4rem">Sắp
                        xếp:</span>
                    <li><a href="http://localhost/poly_tro/site/category?id=<?= $_GET["id"] ?>">Mặc
                            định</a></li>
                    <li><a href="http://localhost/poly_tro/site/category?id=<?= $_GET["id"] ?>&orderBy=latest">Mới
                            nhất</a></li>
                    <li><a href="http://localhost/poly_tro/site/category?id=<?= $_GET["id"] ?>&orderBy=topView">Nhiều
                            lượt xem
                            nhất</a></li>
                </ul>
            </div>
        </div>
        <!-- Bai viet -->
        <div class="news-content">
        </div>
        <!-- Pagination -->
        <div class="btn-group_page">
        </div>
    </div>
    <!-- box phai -->
    <div class="boxphai">
        <!-- box p1 -->
        <div class="clear boxtrai-item">
            <div class="boxtitle">Xem theo cơ sở</div>
            <div class="boxcontent menudoc">
                <ul>
                    <?php foreach ($facilities as $facility) : ?>
                        <li><a href="http://localhost/poly_tro/site?facility_id=<?= $facility['id'] ?>">>
                                <?= $facility['name'] ?></a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
        <!-- box p2  -->
        <div class=" clear  boxtrai-item">
            <div class="boxtitle">XEM THEO GIÁ</div>
            <div class="boxcontent menudoc">
                <ul>
                    <li>
                        <a href="#">> Dưới 1tr</a>
                    </li>
                    <li>
                        <a href="#">> Từ 1 - 2 triệu</a>
                    </li>
                    <li>
                        <a href="#">> Từ 2 - 3 triệu</a>
                    </li>
                    <li>
                        <a href="#">> Từ 2 - 3 triệu</a>
                    </li>
                    <li>
                        <a href="#">> Từ 3 - 4 triệu</a>
                    </li>
                    <li>
                        <a href="#">> Từ 4 - 5 triệu</a>
                    </li>
                    <li>
                        <a href="#">> Trên 5 triệu</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- box p3 -->
        <div class=" clear boxtrai-item">
            <div class="boxtitle">XEM THEO DIỆN TÍCH</div>
            <div class="boxcontent menudoc">
                <ul>
                    <li>
                        <a href="#">> Dưới 20m²</a>
                    </li>
                    <li>
                        <a href="#">> Từ 20 - 30m²</a>
                    </li>
                    <li>
                        <a href="#">> Từ 30 - 40m²</a>
                    </li>
                    <li>
                        <a href="#">> Từ 40 - 50m²</a>
                    </li>
                    <li>
                        <a href="#">> Trên 50m²</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- box p4 -->
        <div class=" clear boxtrai-item">
            <div class="boxtitle">TIN MỚI ĐĂNG</div>
            <div class="new-latest boxcontent"></div>
        </div>
    </div>
</div>
<script>
    const data = <?= json_encode($news) ?>;
    const newLatest = <?= json_encode($getNewPost) ?>;
    const newsContent = document.querySelector('.news-content');
    const latest = document.querySelector('.new-latest');
    const btnGroupPage = document.querySelector(
        '.btn-group_page');

    data.forEach(e => {
        for (let i in e) {
            if (!isNaN(Number(i))) {
                delete e[i];
            }
        }
    })
    console.log('data',data)
    let temp = 0;
    let numberData = 7;

    function getFirstImage(link) {
        return image = link.slice(0, link.indexOf(","));
    }

    function formatPrice(a) {
        let str = `${a}`;
        return str.split("").reverse().reduce((prev,
            next,
            index) => {
            return ((index % 3) ? next : (next + '.')) +
                prev
        })
    }

    const get_day_of_time = (d1, d2) => {
        let ms1 = d1.getTime();
        let ms2 = d2.getTime();
        return Math.ceil((ms2 - ms1) / (24 *
            60 * 60 * 1000));
    };


    function render(temp) {
        let target = temp > 0 ? temp * numberData : numberData;
        const newData = data.slice(target - numberData, target);

        newsContent.innerHTML =
            newData.map(ele => {
                const getImage = getFirstImage(ele
                    .image);
                const price = formatPrice(ele.price);

                let start = new Date(ele.created_at)
                let end = new Date()

                let time = get_day_of_time(start, end);
                let day = Math.floor(time / 30);
                if (Math.floor(time / 30) > 0) {
                    time =
                        `${day} tháng ${time - (day * 30)} ngày trước`;
                } else {
                    time =
                        `${time} ngày trước`;
                }
                return `
            <div class="boxcontent2 stt">
                <a href="http://localhost/poly_tro/site/new?detail=${ele.id}"
                    class='content-img'>
                    <img src="http://localhost/poly_tro/${getImage}"
                        alt="" class='content-img_link'>
                </a>
                <div>
                    <a href="http://localhost/poly_tro/site/new?detail=${ele.id}"
                        class="content-title short-title">${ele.title}</a>
                    <div class="content-body">
                        <div class="content-price">
                        ${price}đ
                        </div>
                        <div class="content-area">
                        ${ele.area}m²</div>
                        <div
                            class="content-address table-short_title">
                            ${ele.address}</div>
                    </div>
                    <div class="content-description short-title"
                        style="max-width: 500px">
                        ${ele.description}
                    </div>
                    <div class="content-user">
                        <div style="display: flex;
    align-items: center;">
                            <div class="content-user_avatar">
                                <img src="http://localhost/poly_tro${ele.avatar}"
                                    alt="">
                            </div>
                            <p class="content-user_name">
                            ${ele.fullname}
                            </p>
                        </div>
                        <div class="view">${ele.view} lượt xem</div>
                        <div class="timestamp">${time}</div>
                    </div>
                </div>
            </div>`
            }).join("");

    }

    latest.innerHTML = newLatest.map(ele => {
        const getImage = getFirstImage(ele
            .image);
        const price = formatPrice(ele.price);

        let start = new Date(ele.created_at)
        let end = new Date()

        let time = get_day_of_time(start, end);
        let day = Math.floor(time / 30);
        if (Math.floor(time / 30) > 0) {
            time =
                `${day} tháng ${time - (day * 30)} ngày trước`;
        } else {
            time =
                `${time} ngày trước`;
        }
        return `
            <a href="http://localhost/poly_tro/site/new?detail=${ele.id}"
                class=" clear10 newstt">
                <div class="newstt-img">
                    <img src="http://localhost/poly_tro/${getImage}"
                        alt="">
                </div>
                <div class="newstt-body">
                    <p class="newstt-title">
                    ${ele.title}</p>
                    <div style="display: flex;
                                align-items: center;
                                justify-content: space-between;
                                margin-top: 8px;">
                        <span class="newstt-price">${price}đ</span>
                        <span>${time}</span>
                    </div>
                </div>
            </a>`
    }).join("")

    document.body.onload = () => {
        render(temp)
    }

    if (Math.ceil(data.length / numberData) > 1) {

        for (let i = 1; i <= Math.ceil(data.length /
                numberData); i++) {
            btnGroupPage.innerHTML +=
                `<button class="btn-page">${i}</button>`
        }
    }

    const btnPage = document.querySelectorAll(".btn-page");

    for (let i = 0; i < btnPage.length; i++) {
        btnPage[i].onclick = () => {
            render(Number(btnPage[i].innerText))
            window.scrollTo({
                top: 0,
                behavior: `smooth`
            })
        }
    }
</script>
<?php view("site.partials.footer") ?>