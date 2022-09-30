@extends('admins.include.main')

@section('content')
    {{-- <div class="card shadow mb-4"> --}}
    {{-- <div class="card-title py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách</h6>
        </div> --}}
    <div class="card-body">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Đơn hàng mới</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $amountOrder }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Tổng doanh thu</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ number_format($sumOrder) }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Liên hệ mới</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $amountContact }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Khách hàng
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $amountUser }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card__title">
                        <p>Đơn hàng mới</p>
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
                                        <a href="#" data-toggle="modal"
                                            data-target="#ModalUpdateOrder{{ $order->id }}" title="Chỉnh sửa đơn hàng">
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
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card__title">
                        <p>Liên hệ mới</p>
                    </div>
                    <table cellspacing="0" cellpadding="5">
                        <thead>
                            <tr>
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Lời nhắn</th>
                                <th>Ngày gửi</th>
                                <th>Phản hồi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact as $key => $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->message }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td style="text-align: center;">
                                        <input type="checkbox" class="changeContactStatus" data-id="{{ $item->id }}"
                                            data-toggle="toggle" data-on=" " data-off=" " data-onstyle="success"
                                            data-offstyle="danger" data-style="ios" data-size="xs"
                                            {{ $item->active == false ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('.changeContactStatus').on('change', function() {
            var active = $(this).prop('checked') == true ? 0 : 1;
            var id = $(this).data('id');
            $.ajax({
                type: 'get',
                dataType: 'JSON',
                url: '{{ route('changeActiveContact') }}',
                data: {
                    'active': active,
                    'id': id
                },
                success: function(data) {
                    if (active == 0) {
                        alert("Bạn đã phản hồi khách hàng!")
                    } else {
                        alert("Bạn chưa phản hồi khách hàng!")
                    }
                }
            });
            // location.reload();
        });
    </script>
@endpush
