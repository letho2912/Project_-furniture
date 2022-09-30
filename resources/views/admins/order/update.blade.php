<form action="{{ route('updateOrder', $order->id) }}" method="POST">
    <div class="modal fade text-left" id="ModalUpdateOrder{{ $order->id }}" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content w70">
                <div class="modal-header">
                    <h4 class="modal-title">{{ $title }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tình trạng: </label>
                        <select name="status" id="status">
                            <option value="Tiếp nhận" {{ $order->status == 'Tiếp nhận' ? 'selected' : '' }}>Tiếp
                                nhận
                            </option>
                            <option value="Vận chuyển" {{ $order->status == 'Vận chuyển' ? 'selected' : '' }}>
                                Vận chuyển
                            </option>
                            <option value="Hoàn thành" {{ $order->status == 'Hoàn thành' ? 'selected' : '' }}>
                                Hoàn thành
                            </option>
                            <option value="Hủy" {{ $order->status == 'Hủy' ? 'selected' : '' }}>Hủy
                            </option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="/quan-li/danh-muc/danh-sach" class="btn-back" title="Trở về">Trở về</a>
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
    @csrf
</form>
