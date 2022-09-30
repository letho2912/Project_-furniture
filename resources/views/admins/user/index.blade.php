@extends('admins.include.main')
@section('content')
    <div class="manager-cate">
        <div class="card shadow mb-4">
            <div class="card__title">
                <p>{{ $title }}</p>
            </div>
            <table cellspacing="0" cellpadding="5">
                <thead>
                    <tr>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Ngày đăng kí</th>
                        <th>Kích hoạt</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td style="text-align: center;">
                                <input type="checkbox" class="changeActiveUserAdmin" data-id="{{ $item->id }}"
                                    data-toggle="toggle" data-on=" " data-off=" " data-onstyle="success"
                                    data-offstyle="danger" data-style="ios" data-size="xs"
                                    {{ $item->active == true ? 'checked' : '' }}>
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
        $('.changeActiveUserAdmin').on('change', function() {
            var active = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            $.ajax({
                type: 'get',
                dataType: 'JSON',
                url: '{{ route('changeActiveUserAdmin') }}',
                data: {
                    'active': active,
                    'id': id
                },
                success: function(data) {
                    if (active == 1) {
                        alert("Bạn đã kích hoạt tài khoản thành công!")
                    } else {
                        alert("Bạn đã vô hiệu hóa tài khoản này!")
                    }
                }
            });
            // location.reload();
        });
    </script>
@endpush
