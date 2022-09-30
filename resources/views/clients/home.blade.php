@extends('clients.include.main')
<div class="content">
    @section('banner')
        <div id="banner">
            <div class="left__banner">
                <a href="{{$bannerTopLeft->description }}">
                    <img src="/image/banner/{{ $bannerTopLeft->image }}" alt="{{ $bannerTopLeft->name }}">
                </a>
            </div>
            <div class="right__banner">
                @foreach ($bannerTopRight as $item)
                    <a href="{{ $item->description }}" title="{{ $item->name }}">
                        <img src="/image/banner/{{ $item->image }}" class="right__banner-img1" alt="">
                    </a>
                @endforeach
            </div>

        </div>
    @endsection
    @section('content')
        <div id="container">
            <div class="product">
                <div class="product-text">
                    <p class="product-text-title">
                        <i class="fa fa-line-chart" aria-hidden="true"></i>
                        {{ $titleSell }}
                    </p>
                    <p class="product-text-paging">
                        <a href="/home/product">
                            <i class="fa fa-spinner fa-spin fa-fw"></i> Xem tất cả
                        </a>
                    </p>
                </div>
                <div class="product-list">
                    @foreach ($sellProduct as $item)
                        <div class="product-item-4">
                            <a href="/trang-chu/san-pham/{{ $item->id }}-{{ Str::slug($item->name, '-') }}">
                                <div class="product-about-img">
                                    <img src="image/product/{{ $item->image }}" alt=""
                                        title="{{ $item->name }}">
                                </div>
                                <div class="product-about-name">
                                    <p>{{ $item->name }}</p>
                                </div>
                            </a>
                            <div class="product-about-price">
                                <span class="sale">Giá: {{ number_format($item->sale) }}</span>
                                <span class="price"> {{ number_format($item->price) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="banner__adv">
                <a href="{{ $bannerBot->description }}" class="" title="{{ $bannerBot->name }}">
                    <img src="/image/banner/{{ $bannerBot->image }}" alt="">
                </a>
            </div>
            <div class="product">
                <div class="product-text">
                    <p class="product-text-title">
                        <i class="fa fa-line-chart" aria-hidden="true"></i>
                        {{ $titleSale }}
                    </p>
                    <p class="product-text-paging">
                        <a href="/home/product">
                            <i class="fa fa-spinner fa-spin fa-fw"></i> Xem tất cả
                        </a>
                    </p>
                </div>
                <div class="product-list">
                    @foreach ($saleProduct as $item)
                        <div class="product-item-4">
                            <a href="/trang-chu/san-pham/{{ $item->id }}-{{ Str::slug($item->name, '-') }}">
                                <div class="product-about-img">
                                    <img src="image/product/{{ $item->image }}" alt=""
                                        title="{{ $item->name }}">
                                </div>
                                <div class="product-about-name">
                                    <p>{{ $item->name }}</p>
                                </div>
                            </a>
                            <div class="product-about-price">
                                <span class="sale">Giá: {{ number_format($item->sale) }}</span>
                                <span class="price"> {{ number_format($item->price) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="product">
                <div class="product-text">
                    <p class="product-text-title">
                        <i class="fa fa-bolt" aria-hidden="true"></i>
                        {{ $titleNew }}
                    </p>
                    <p class="product-text-paging">
                        <a href="/home/product">
                            <i class="fa fa-spinner fa-spin fa-fw"></i> Xem tất cả
                        </a>
                    </p>
                </div>
                <div class="product-list">
                    @foreach ($newProduct as $newPr)
                        <div class="product-item-4">
                            <a href="/trang-chu/san-pham/{{ $newPr->id }}-{{ Str::slug($newPr->name, '-') }}">
                                <div class="product-about-img">
                                    <img src="image/product/{{ $newPr->image }}" alt="Anh"
                                        title="{{ $newPr->name }}">
                                </div>
                                <div class="product-about-name">
                                    <p>{{ $newPr->name }}</p>
                                </div>
                            </a>
                            @if ($newPr->sale == $newPr->price)
                                <div class="product-about-price">
                                    <span class="sale">Giá: {{ number_format($newPr->price) }}</span>
                                </div>
                            @else
                                <div class="product-about-price">
                                    <span class="sale">Giá: {{ number_format($newPr->sale) }}</span>
                                    <span class="price"> {{ number_format($newPr->price) }}</span>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection
</div>
</div>
