@extends('admins.include.main')

@section('content')
    <div class="product-search">
        <div>
            <a href="/quan-li/tin-tuc/them-moi" class="btn btn-success">Thêm mới</a>
        </div>
        <div class="form-search">
            <form action="" style="margin-block-end: 0;">
                <input type="text" placeholder="Tên bài viết cần tìm...">
                <button type="submit" class="btn-search">Tìm kiếm</button>
            </form>
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
                        <th>Tiêu đề bài viết</th>
                        <th>Ngày cập nhật</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($new as $key => $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td><img src="/image/new/{{ $item->image }}" alt=""></td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->updated_at->format('d/m/Y') }}</td>
                            <td style="text-align: center">
                                <input type="checkbox" class="changeNews" name="active" id="" data-toggle="toggle"
                                    data-on=" " data-off=" " data-id="{{ $item->id }}" data-onstyle="success"
                                    data-offstyle="danger" data-style="ios" data-size="xs"
                                    {{ $item->active == true ? 'checked' : '' }}>
                            </td>
                            <td>
                                <a href="/quan-li/tin-tuc/cap-nhat/{{ $item->id }}-{{ Str::slug($item->title, '-') }}"
                                    title="Chỉnh sửa sản phẩm">
                                    <i class="fa-solid fa-user-pen"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="paginate">
                {!! $new->links() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('.changeNews').on('change', function() {
            var active = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type: 'get',
                dataType: 'JSON',
                url: '{{ route('changeActiveNew') }}',
                data: {
                    'active': active,
                    'id': id
                },
                success: function(data) {
                    if (active == 1) {
                        alert("Bài viết đã được hiển thị!")
                    } else {
                        alert("Bài viết đã được ẩn đi!")
                    }
                }
            });
            location.reload();
        });
    </script>
@endpush
