@extends('clients.include.main')
@section('content')
    <div id="container">
        <div class="wrap">
            <div class="wrap__left">
                <div class="product-text">
                    <div class="product-text-title">
                        <a href="/trang-chu" class="nav__menu-icon">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Trang chủ
                        </a>/<a href="#" class="nav__menu-icon">
                            {{ $nameCate->category->name }}
                        </a>
                    </div>
                    <div class="product-sort">
                        <form method="get" action="" name="catetHome">
                            <select name="order_by" onchange="document.catetHome.submit ()" class="form-control">
                                <option value="">----------------</option>
                                <option value="giam_dan">Giá giảm dần</option>
                                <option value="tang_dan">Giá tăng dần</option>
                                <option value="moi_nhat">Sản phẩm mới nhất</option>
                                <option value="khuyen_mai">Sản phẩm khuyến mãi</option>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="product-list">
                    @foreach ($productId as $item)
                        <div class="product-item">
                            <a href="/trang-chu/san-pham/{{ $item->id }}-{{ Str::slug($item->name, '-') }}">
                                <div class="product-about-img">
                                    <img src="/image/product/{{ $item->image }}" alt=""
                                        title="{{ $item->name }}">
                                </div>
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
                                    <span class="price">{{ number_format($item->price) }}</span>
                                </div>
                            @endif
                        </div>
                    @endforeach

                </div>
                <div class="paginate">
                    {!! $productId->links() !!}
                </div>
            </div>
            <div class="wrap__right">
                <div class="wrap__right-product">
                    <div class="wrap__right-text">
                        Có thể bạn thích
                    </div>
                    <div class="wrap__product-like">
                        <div class="wrap__product-like-half">
                            <div class="product__like-img">
                                <img src="/admin/assets/img/nt2.png" alt="">
                            </div>
                            <div class="product__like-info">
                                <div class="product__like-name">
                                    <p>Tủ gỗ để giày HK1</p>
                                </div>
                                <div class="product__like-price">
                                    <span class="price">1.200.000</span>
                                    <span class="sale">1.500.000</span>
                                </div>
                            </div>
                        </div>
                        <div class="wrap__product-like-half">
                            <div class="product__like-img">
                                <img src="/admin/assets/img/nt2.png" alt="">
                            </div>
                            <div class="product__like-info">
                                <div class="product__like-name">
                                    <p>Giường ngủ GN01</p>
                                </div>
                                <div class="product__like-price">
                                    <span class="price">7.200.000</span>
                                    <span class="sale">5.500.000</span>
                                </div>
                            </div>
                        </div>
                        <div class="wrap__product-like-half">
                            <div class="product__like-img">
                                <img src="/admin/assets/img/nt2.png" alt="">
                            </div>
                            <div class="product__like-info">
                                <div class="product__like-name">
                                    <p>Bàn làm việc MH01</p>
                                </div>
                                <div class="product__like-price">
                                    <span class="price">6.800.000</span>
                                </div>
                            </div>
                        </div>
                        <div class="wrap__product-like-half">
                            <div class="product__like-img">
                                <img src="/admin/assets/img/nt2.png" alt="">
                            </div>
                            <div class="product__like-info">
                                <div class="product__like-name">
                                    <p>Tủ gỗ để giày HK1</p>
                                </div>
                                <div class="product__like-price">
                                    <span class="price">1.200.000</span>
                                    <span class="sale">1.500.000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrap__banner">
                    <img src="/admin/assets/img/banner11.png" alt="">
                </div>
            </div>

        </div>
    </div>
    {{-- </div>
    </div>
    </body> --}}
@endsection
