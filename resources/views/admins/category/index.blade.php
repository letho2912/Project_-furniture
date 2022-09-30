@extends('admins.include.main')
@section('content')
    <div class="product-search">
        <div>
            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#ModalCreateCate">Thêm mới</a>
        </div>
    </div>
    <div class="manager-cate">
        <div class="card shadow mb-4">
            <div class="card__title">
                <p>{{ $title }}</p>
            </div>
            <table cellspacing="0" cellpadding="5">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Tên danh mục</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $cate)
                        <tr>
                            <td>{{ $cate->id }}</td>
                            <td>{{ $cate->name }}</td>
                            <td>{{ $cate->description }}</td>
                            <td style="text-align: center;">
                                <input type="checkbox" class="changeCateStatus" data-id="{{ $cate->id }}"
                                    data-toggle="toggle" data-on=" " data-off=" " data-onstyle="success"
                                    data-offstyle="danger" data-style="ios" data-size="xs"
                                    {{ $cate->active == true ? 'checked' : '' }}>
                            </td>
                            <td style="text-align: center;">
                                <a href="#" title="Chỉnh sửa sản phẩm" data-toggle="modal"
                                    data-target="#ModalUpdateCate{{ $cate->id }}">
                                    <i class="fa-solid fa-user-pen"></i>
                                </a>
                            </td>
                            @include('admins.category.update')
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('admins.category.create')
@endsection
@push('scripts')
    <script>
        $('.changeCateStatus').on('change', function() {
            var active = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type: 'get',
                dataType: 'JSON',
                url: '{{ route('changeStatusCate') }}',
                data: {
                    'active': active,
                    'id': id
                },
                success: function(data) {
                    if (active == 1) {
                        alert("Danh mục sản phẩm đã được hiển thị!")
                    } else {
                        alert("Đã ẩn danh mục sản phẩm thành công!")
                    }
                }
            });
            // location.reload();
        });
    </script>
@endpush
