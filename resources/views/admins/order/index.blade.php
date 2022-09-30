@extends('admins.include.main')

@section('content')
    <div class="product-search">
        <div class="form-search">
            <form action="{{ route('simple_search') }}" style="margin-block-end: 0;" method="GET">
                <input type="text" placeholder="Từ khóa..." name="search">
                <button type="submit" class="btn btn-warning">Tìm kiếm</button>
            </form>
        </div>
        <div>
            <a href="/quan-li/don-hang/danh-sach" class="btn btn-secondary">Làm mới</a>
        </div>
        <form method="get" action="" name="productForm">
            <select name="order_by" onchange="document.productForm.submit ()" class="form-control">
                <option value="">----</option>
                <option value="Tiepnhan">Tiếp nhận</option>
                <option value="Vanchuyen">Vận chuyển</option>
                <option value="Thanhcong">Thành công</option>
                <option value="Huy">Hủy</option>
            </select>
        </form>
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
                        <th>Tên</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Lời nhắn</th>
                        <th>Trạng thái</th>
                        <th>Ngày đặt</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listOrder as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->note }}</td>
                            @if ($order->status == 'Tiếp nhận')
                                <td class="receive">{{ $order->status }}</td>
                            @elseif ($order->status == 'Vận chuyển')
                                <td class="transport">{{ $order->status }}</td>
                            @elseif ($order->status == 'Hoàn thành')
                                <td class="confirm">{{ $order->status }}</td>
                            @elseif ($order->status == 'Hủy')
                                <td class="cancel">{{ $order->status }}</td>
                            @endif
                            <td>{{ $order->created_at }}</td>
                            <td>
                                <a
                                    href="/quan-li/don-hang/chi-tiet-don-hang/{{ $order->id }}-{{ Str::slug($order->name, '-') }}">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                            </td>
                            <td style="text-align: center">
                                <a href="#" data-toggle="modal" data-target="#ModalUpdateOrder{{ $order->id }}"
                                    title="Chỉnh sửa đơn hàng">
                                    <i class="fa-solid fa-user-pen"></i>
                                </a>
                            </td>
                        </tr>
                        @include('admins.order.update')
                    @endforeach
                </tbody>
            </table>
            <div class="paginate">
                {!! $listOrder->links() !!}
            </div>
        </div>

    </div>
@endsection
@push('scripts')
    {{-- <script>
        $('select').on('change', function() {
            var status = $("select option:selected").val();
            var id = $(this).data('id');
            $.ajax({
                url: '{{ route('changeStatus') }}',
                type: 'GET',
                dataType: 'JSON',
                data: {
                    'id': id,
                     'status': status,
                },
                success: function(data) {
                    alert("Đơn hàng đã được cập nhật!");
                }
            });

        })
    </script> --}}
@endpush
