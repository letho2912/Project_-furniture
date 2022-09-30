<footer class="footer">
    <div class="footer__about">
        <div class="footer__about-logo">
            <img src="/admin/assets/img/logo-vietads.png" alt="">
        </div>
        <div class="footer__about-content">
            <p>CÔNG TY CỔ PHẦN KIẾN TRÚC VÀ NỘI THẤT VIETADS</p>

            <p>VIETADS Furniture luôn mong muốn biến không gian sống trong ngôi nhà bạn thành một triển lãm, và
                đồ đạc
                trong
                phòng chính là những tác phẩm nghệ thuật được trưng bày ở đó. "MANG NGHỆ THUẬT VÀO KHÔNG GIAN
                SỐNG"
                - Đó chính là giá trị cốt lõi, là tôn chỉ và mục đích tồn tại của ART HOME.
            </p>
        </div>
    </div>
    <div class="footer__policy">
        <ul>
            <li>Chính sách bảo mật</li>
            <li>Điều khoản và sử dụng</li>
            <li>Các vấn đề liên quan</li>
            <li>Hướng dẫn sử dụng</li>
        </ul>
    </div>
    <div class="footer__social">
        <div class="footer__social-new">
            <a href="">
                <img src="/admin/assets/img/banner3.png" alt="">
                <p class="footer__social-new-title">
                    Nội thất nhà VietADS, giá tiền hợp lí, chất lượng đỉnh cao
                </p>
            </a>
        </div>
        <div class="footer__social-new">
            <a href="">
                <img src="/admin/assets/img/banner3.png" alt="">
                <p class="footer__social-new-title">
                    Nội thất nhà VietADS, giá tiền hợp lí, chất lượng đỉnh cao
                </p>
            </a>
        </div>
    </div>
</footer>
<script type="text/javascript">
    $(".update-cart").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ url('trang-chu/update-cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });

    $(".remove-from-cart").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Bạn có chắc muốn xóa sản phẩm?")) {
            $.ajax({
                url: '{{ url('trang-chu/remove-from-cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });
</script>

<script type="text/javascript" src="/client/assets/js/main.js"></script>
<script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
