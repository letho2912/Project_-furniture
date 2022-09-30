@extends('clients.include.main')
@section('content')
    <div id="container">
        <div class="wrap">
            <div class="wrap__main">
                <div class="product-text">
                    <p class="product-text-title">
                        {{-- {{ $title }} --}}
                        Có {{ count($products) }} {{ $title }} phù hợp với từ khóa <b>{{ $nameSearch }}</b>
                    </p>
                </div>
                <div class="product-list">
                    @foreach ($products as $item)
                        <div class="product-item-4">
                            <a href="/trang-chu/san-pham/{{ $item->id }}-{{ Str::slug($item->name, '-') }}">
                                <div class="product-about-img">
                                    <img src="/image/product/{{ $item->image }}" alt="" title="{{ $item->name }}">
                                </div>
                                <div class="product-about-name">
                                    <p>{{ $item->name }}</p>
                                </div>
                            </a>
                            @if ($item->sale == $item->price)
                                <div class="product-about-price">
                                    <span class="sale">Giá: {{ number_format($item->sale) }}</span>
                                    {{-- <span class="sale">{{ number_format($item->sale) }}</span> --}}
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
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>
    {{-- </div>
    </div>
    </body> --}}
@endsection
