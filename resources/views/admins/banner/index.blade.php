@extends('admins.include.main')

@section('content')
    <div class="product-search">
        <div>
            <a href="/quan-li/quang-cao/them-moi" class="btn btn-success">Thêm mới</a>
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
                        <th>Tiêu đề quảng cáo</th>
                        <th>Ngày cập nhật</th>
                        <th>Hiển thị</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listBanner as $key => $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td><img src="/image/banner/{{ $item->image }}" alt=""></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td style="text-align: center">
                                <input type="checkbox" class="changeBanner" name="active" id="" data-toggle="toggle"
                                    data-on=" " data-off=" " data-id="{{ $item->id }}" data-onstyle="success"
                                    data-offstyle="danger" data-style="ios" data-size="xs"
                                    {{ $item->active == true ? 'checked' : '' }}>
                            </td>
                            <td>
                                <a href="/quan-li/quang-cao/xoa/{{ $item->id }}" class="dltBanner" title="Xóa quảng cáo">
                                    <i class="hide fa-solid fa-trash"></i>
                                </a>
                            </td>
                            <td>
                                <a href="/quan-li/quang-cao/cap-nhat/{{ $item->id }}" title="Chỉnh sửa sản phẩm">
                                    <i class="edit fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="paginate">
                {!! $listBanner->links() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('.changeBanner').on('change', function() {
            var active = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type: 'get',
                dataType: 'JSON',
                url: '{{ route('changeStatusBanner') }}',
                data: {
                    'active': active,
                    'id': id
                },
                success: function(data) {
                    if (active == 1) {
                        alert("Quảng cáo đã được hiển thị!")
                    } else {
                        alert("Quảng cáo đã được ẩn đi!")
                    }
                }
            });
            location.reload();
        });
    </script>
@endpush
