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
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->message }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td style="text-align: center;">
                                <input type="checkbox" class="changeContactStatuss" data-id="{{ $item->id }}"
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
@endsection
@push('scripts')
    <script>
        $('.changeContactStatuss').on('change', function() {
            var active = $(this).prop('checked') == true ? 0 : 1;
            var id = $(this).data('id');
            $.ajax({
                type: 'get',
                dataType: 'JSON',
                url: '{{ route('changeActiveContacts') }}',
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
