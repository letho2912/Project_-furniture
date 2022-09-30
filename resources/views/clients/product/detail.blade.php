@extends('clients.include.main')
@section('content')
    <div class="product__detail">
        <div class="product__detail-info">
            <div class="product__detail-text">
                <p class="product-text-title">
                    <a href="/trang-chu" class="nav__menu-icon">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        Trang chủ
                    </a>/
                    <a href="/trang-chu/danh-muc/{{ $detail->category->id }}-{{ Str::slug($detail->category->name, '-') }}"
                        class="nav__menu-icon">
                        {{ $detail->category->name }}/
                    </a>
                    <a href="#" class="nav__menu-icon">
                        {{ $detail->name }}
                    </a>
                </p>
            </div>
            <div class="product__detail-info-describe">
                <div class="product__detail-info-img">
                    <img src="/image/product/{{ $detail->image }}" alt="" title="{{ $detail->name }}">
                    <div class="product__detail-info-img-list">
                    </div>
                </div>
                <div class="product__detail-info-content">
                    <div class="product__detail-info-name">
                        {{ $detail->name }}
                    </div>
                    @if ($detail->sale < $detail->price)
                        <div class="product__detail-info-price">
                            <span class="product__detail-price">Giá: {{ number_format($detail->sale) }}</span>
                            <span class="product__detail-sale">{{ number_format($detail->price) }}</span>
                        </div>
                        <div class="precent_sale">
                            <p>( Tiết kiệm {{ number_format($detail->price - $detail->sale) }} đồng )</p>
                            <p class="precent">
                                {{ number_format((($detail->price - $detail->sale) / $detail->price) * 100, 2) }}%</p>
                        </div>
                    @else
                        <div class="product__detail-info-price">
                            <span class="product__detail-price">Giá: {{ number_format($detail->price) }}</span>
                        </div>
                    @endif

                    <div class="product__detail-info-list">
                        <p class="detail__info-item">
                            <i> Chất liệu: {{ $detail->material }}</i>
                        </p>
                        <p class="detail__info-item">
                            <i>Nhà cung cấp: {{ $detail->producer }}</i>
                        </p>
                    </div>
                    <div class="product__detail-info-list">
                        <p class="detail__info-item">
                            <i> Danh mục: {{ $detail->category->name }}</i>
                        </p>
                    </div>
                    <div class="cart-btn">
                        <a href="{{ url('/trang-chu/gio-hang/' . $detail->id) }}" class="btn btn-success">Mua ngay</a>
                        <a href="" class="btn btn-danger">Liên hệ</a>
                    </div>
                </div>
            </div>
            <!-- Tab links -->
            <div class="tabs">
                <button class="tablinks active" data-electronic="information">Chi tiết sản phẩm</button>
                <button class="tablinks" data-electronic="Microcontrollers">Hướng dẫn mua hàng</button>
            </div>
            <!-- Tab content -->
            <div class="wrapper_tabcontent">
                <div id="information" class="tabcontent active">
                    {!! $detail->description !!}
                </div>
                <div style="padding: 10px 20px" id="Microcontrollers" class="tabcontent">
                    <p style="font-weight: 600;padding-left:10px">Giá bán trên đã bao gồm thuế và phí vận chuyển</p>
                    <p style="font-weight: 600;padding-left:10px">Tất cả các sản phẩm được bảo hành 12 tháng</p>
                    <p style="font-weight: 600;padding-left:10px">Chính sách 1 đổi 1 với sản phẩm lỗi do phía công ty</p>
                    <b style="font-size: 18px;">BƯỚC 1: CHỌN MẪU NỘI THẤT GỖ MÀ BẠN THÍCH</b>

                    <p>Bạn có thể chọn sản phẩm tại website: https://noithatdogoviet.com/ hoặc bất kỳ nguồn nào, kể cả ảnh
                        chụp.</p>
                    <b style="font-size: 18px">BƯỚC 2: ĐẶT HÀNG</b>

                    <p>Đặt hàng qua chức năng đặt hàng của website, hoặc gọi điện thoại, gửi ảnh qua phần mềm chat chat
                        zalo, viber qua SĐT 0343444290 hoặc email: letho.lvt@gmail.com</p>
                    <h2>Hướng dẫn đặt hàng qua Webiste</h2>
                    <b style="font-size: 18px"> Bước 1: chọn mẫu nội thất bạn muốn mua, đặt.</b>

                    <p>1. Chọn kích thước muốn đặt</p>
                    <p>2. Chọn số lượng</p>
                    <p>3. Nhấn vào nút "MUA NGAY"</p>
                    <b style="font-size: 18px"> Bước 2: Lúc này bạn sẽ được chuyển qua giao diện cảu giỏ hàng, bạn cần điền
                        thông tin đơn hàng:</b>

                    <p>1. Chú ý số lượng, kích thước sản phẩm và giá trị tổng đơn hàng</p>
                    <p>2. Điền đầy đủ thông tin như số điện thoại, tên, địa chỉ giao hàng chính xác và đầy đủ.</p>
                    <p>3. Ghi chú các yêu cầu riêng của bạn, ví dụ như bạn cần đặt kích thước khác...</p>
                    <p>4. Sau khi điền đầy đủ các mục bạn nhấn vào nút "ĐẶT HÀNG"</p>
                    <i style="font-size: 16px"> Lưu ý: Bạn muốn mua thêm nhiều sản phẩm khác thì tiếp tục nhấn ra các danh
                        mục chọn sản phẩm và nhấp
                        vào "MUA NGAY" để thêm sản phẩm vào giỏ hàng.</i><br>

                    <b style="font-size: 18px">BƯỚC 3: XÁC NHẬN ĐƠN HÀNG</b>

                    <p>Chúng tôi sẽ gọi điện thoại hoặc nhắn tin qua di động, mail cho bạn để xác nhận lại đơn đặt hàng của
                        bạn.</p>


                    <b style="font-size: 18px">BƯỚC 4: ĐẶT CỌC</b>

                    <p> Đối với sản phẩm có sẵn : KHÔNG CẦN ĐẶT CỌC</p>
                    <p> Đối với sản phẩm thiết kế theo yêu cầu : Bạn tiến hành chuyển khoản, thanh toán
                        cho chúng tôi 30 - 50% giá trị đơn hàng mà bạn đã đặt.</p>
                    <p>Đối với sản phẩm thiết kế theo yêu cầu : THANH TOÁN 100% GIÁ TRỊ ĐƠN HÀNG</p>
                    <b style="font-size: 18px">BƯỚC 5: GIAO HÀNG VÀ THANH TOÁN</b>

                    <p>Đối với sản phẩm có sẵn: NHẬN HÀNG, KIỂM TRA VÀ THANH TOÁN.</p>
                    <p> Đối với sản phẩm thiết kế theo yêu cầu: NHẬN HÀNG, KIỂM TRA VÀ THANH TOÁN SỐ TIỀN
                        CÒN LẠI.</p>
                    <h2>Số tài khoản:</h2>

                    <p>1. Ngân hàng ACB chi nhánh Sở Giao Dịch TP. Hồ Chí Minh</p>
                    <p>Tên chủ tài khoản: Nguyễn Thị Lệ Thơ</p>
                    <p>Số tài khoản: 141459869</p>
                    <p>2. Ngân Hàng NN&PTNT (AgriBank)chi nhánh Sài Gòn, TPHCM.</p>
                    <p>Tên chủ tài khoản: Nguyễn Thị Lệ Thơ</p>
                    <p> Số tài khoản: 6460205321674</p><br>
                    <i style="font-size: 16px"> Lưu ý: Khi chuyển khoản vui lòng ghi rõ Họ tên kèm mã đơn hàng.</i><br>
                </div>
            </div>
        </div>
        <div class="product__detail-news">
            <div class="product__detail-news-title">
                <p class="product-text-title">
                    Tin tức liên quan
                </p>
            </div>
            <div class="product__detail-news-item">
                <div class="product__detail-news-item-img">
                    <img src="/admin/assets/img/nt1.png" alt="">
                </div>
                <div class="product__detail-news-name">
                    <span class="product__detail-news-namenew">
                        Bài báo về thiết kế nội thất sang trọng
                    </span>
                    <div class="product__detail-news-icon">
                        <i><i class="fa-solid fa-clock"></i>
                            29/07/2022</i>
                        <br>
                        <i><i class="fa-solid fa-user"></i> Nguyễn Thị Lệ Thơ</i>
                    </div>
                </div>
            </div>
            <div class="product__detail-news-item">
                <div class="product__detail-news-item-img">
                    <img src="/admin/assets/img/nt1.png" alt="">
                </div>
                <div class="product__detail-news-name">
                    <span class="product__detail-news-namenew">
                        Bài báo về thiết kế nội thất sang trọng
                    </span>
                    <div class="product__detail-news-icon">
                        <i><i class="fa-solid fa-clock"></i>
                            29/07/2022</i>
                        <br>
                        <i><i class="fa-solid fa-user"></i> Nguyễn Thị Lệ Thơ</i>
                    </div>
                </div>
            </div>
            <div class="product__detail-news-item">
                <div class="product__detail-news-item-img">
                    <img src="/admin/assets/img/nt1.png" alt="">
                </div>
                <div class="product__detail-news-name">
                    <span class="product__detail-news-namenew">
                        Bài báo về thiết kế nội thất sang trọng
                    </span>
                    <div class="product__detail-news-icon">
                        <i><i class="fa-solid fa-clock"></i>
                            29/07/2022</i>
                        <br>
                        <i><i class="fa-solid fa-user"></i> Nguyễn Thị Lệ Thơ</i>
                    </div>
                </div>
            </div>
            <div class="product__detail-news-item">
                <div class="product__detail-news-item-img">
                    <img src="/admin/assets/img/nt1.png" alt="">
                </div>
                <div class="product__detail-news-name">
                    <span class="product__detail-news-namenew">
                        Bài báo về thiết kế nội thất sang trọng
                    </span>
                    <div class="product__detail-news-icon">
                        <i><i class="fa-solid fa-clock"></i>
                            29/07/2022</i>
                        <br>
                        <i><i class="fa-solid fa-user"></i> Nguyễn Thị Lệ Thơ</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product">
        <div class="product-text">
            <p class="product-text-title">
                <i class="fa fa-line-chart" aria-hidden="true"></i>
                {{ $titleRelated }}
            </p>
            <p class="product-text-paging">
                <a href="product.html">
                    <i class="fa fa-spinner fa-spin fa-fw"></i> Xem tất cả
                </a>
            </p>
        </div>
        <div class="product-list">
            @foreach ($related as $item)
                <div class="product-item-4">
                    <a href="/trang-chu/san-pham/{{ $item->id }}-{{ Str::slug($item->name), '-' }}">
                        <img src="/image/product/{{ $item->image }}" alt="" class="product-about-img">
                        <div class="product-about-name">
                            <p>{{ $item->name }}</p>
                        </div>
                    </a>
                    @if ($item->sale == $item->price)
                        <div class="product-about-price">
                            <span class="sale">Giá: {{ number_format($item->sale) }}</span>
                        </div>
                    @else
                        <div class="product-about-price">
                            <span class="sale">Giá: {{ number_format($item->sale) }}</span>
                            <span class="price"> {{ number_format($item->price) }}</span>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
