@extends('clients.include.main')
@section('content')
    {{-- <div class="product-text">
            <p class="product-text-title">
                <a href="/home" class="nav__menu-icon">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    Trang chủ
                </a>/
                <a href="#" class="nav__menu-icon">
                    {{ $title }}
                </a>/
                <a href="#" class="nav__menu-icon">
                    {{ $detailNew->title }}
                </a>
            </p>
        </div> --}}
    <div class="detail_new">
        <div class="new__item-title">
            {{ $detailNew->title }}
        </div>
        <div class="new__item-date">
            <span class="new__item-date-time">
                <i class="fa-solid fa-clock"></i>
                {{ $detailNew->created_at->format('d/m/Y') }}
            </span>
            <span style="padding-right: 20px">
                <i class="fa-solid fa-user"></i>
                {{ $detailNew->admin->name }}
            </span>
            <span>
                Cập nhật cách đây: {{$detailNew->updated_at->diffForHumans()}}
            </span>
        </div>
        <div class="detail_description">
            {!! $detailNew->description !!}
        </div>
    </div>
@endsection
