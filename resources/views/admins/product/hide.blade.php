@extends('admins.include.main')

@section('content')
    <div class="product-search">
        <div>
            <a href="/quan-li/san-pham/them-moi" class="btn btn-success">Thêm mới</a>
        </div>
        <div class="form-search">
            <form action="{{ route('simple_search') }}" style="margin-block-end: 0;" method="GET">
                <input type="text" placeholder="Tên sản phẩm cần tìm..." name="search">
                <button type="submit" class="btn btn-warning">Tìm kiếm</button>
            </form>
        </div>
        <div>
            <a href="/quan-li/san-pham/danh-sach" class="btn btn-secondary">Làm mới</a>
        </div>
        <div>
            <a href="{{ route('productHide') }}" class="btn btn-danger">Sản phẩm ẩn</a>
        </div>
    </div>
    <div class="manager-form">
        <div class="card shadow mb-4">
            <div class="card__title">
                <p>{{ $title }}</p>
            </div>
            <table cellspacing="0" cellpadding="5">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá gốc</th>
                        <th>Giá khuyến mãi</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $pr)
                        <tr>
                            <td>{{ $pr->id }}</td>
                            <td>
                                <img src="/image/product/{{ $pr->image }}" alt="Anh" title="Hình ảnh sản phẩm">
                            </td>
                            <td>{{ $pr->name }}</td>
                            <td>{{ $pr->price }}</td>
                            <td>{{ $pr->sale }}</td>
                            <td style="text-align: center;">
                                <input type="checkbox" class="changeProductStatus" data-id="{{ $pr->id }}"
                                    data-toggle="toggle" data-on=" " data-off=" " data-onstyle="success"
                                    data-offstyle="danger" data-style="ios" data-size="xs"
                                    {{ $pr->active == true ? 'checked' : '' }}>
                            </td>
                            <td style="text-align: center">
                                <a href="/quan-li/san-pham/cap-nhat/{{ $pr->id }}-{{ Str::slug($pr->name, '-') }}"
                                    title="Chỉnh sửa sản phẩm">
                                    <i class="fa-solid fa-user-pen"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="paginate">
                {!! $products->links() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('.changeProductStatus').on('change', function() {
            var active = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type: 'get',
                dataType: 'JSON',
                url: '{{ route('changeActive') }}',
                data: {
                    'active': active,
                    'id': id
                },
                success: function(data) {
                    if (active == 1) {
                        alert("Sản phẩm đã hiển thị lại!")
                    } else {
                        alert("Sản phẩm đã được ẩn!")
                    }
                }
            });
            location.reload();
        });
    </script>
@endpush
