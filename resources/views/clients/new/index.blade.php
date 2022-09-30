@extends('clients.include.main')
@section('content')
    <div id="container">
        <div class="wrap">
            <div class="wrap__left">
                <div class="wrap__left-text">
                    {{ $title }}
                </div>
                @foreach ($listNew as $item)
                    <div class="new__list">
                        <div class="new__item">
                            <div class="new__item-img">
                                <a href="/trang-chu/tin-tuc/{{ $item->id }}-{{ Str::slug($item->title), '-' }}">
                                    <img src="/image/new/{{ $item->image }}" alt="">
                                </a>
                            </div>
                            <div class="new__item-content">
                                <div class="new__item-title">
                                    {{ $item->title }}
                                </div>
                                <div class="new__item-date">
                                    <span class="new__item-date-time">
                                        <i class="fa-solid fa-clock"></i>
                                        {{ $item->created_at->format('d/m/Y') }}
                                    </span>
                                    <span style="padding-right: 10px">
                                        <i class="fa-solid fa-user"></i>
                                        {{ $item->admin->name }}
                                    </span>
                                    <span>
                                        Cập nhật cách đây: {{$item->updated_at->diffForHumans()}}
                                    </span>
                                </div>
                                <div class="new__item-describe">
                                    <p>{{ $item->seo_description }}</p>
                                </div>
                                <div class="new__btn-readmore">
                                    <a href="/trang-chu/tin-tuc/{{ $item->id }}-{{ Str::slug($item->title), '-' }}">
                                        Chi tiết
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="paginate">
                    {!! $listNew->links() !!}
                </div>
            </div>
            <div class="wrap__right">
                <div class="wrap__right-search">
                    <form action="...">
                        <input type="text" placeholder="Tìm kiếm.." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="wrap__right-product">
                    <div class="wrap__right-text">
                        Có thể bạn thích
                    </div>
                    <div class="wrap__product-like">
                        <div class="wrap__product-like-half">
                            <div class="product__like-img">
                                <img src="./assets/img/nt2.png" alt="">
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
                                <img src="./assets/img/nt2.png" alt="">
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
                                <img src="./assets/img/nt2.png" alt="">
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
                                <img src="./assets/img/nt2.png" alt="">
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
                    <img src="./assets/img/banner11.png" alt="">
                </div>
            </div>

        </div>
    </div>
@endsection
