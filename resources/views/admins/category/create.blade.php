    <form action="{{ route('saveCate') }}" method="POST">
        <div class="modal fade text-left" id="ModalCreateCate" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content w70">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ $titleAdd }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Tên danh mục: </label>
                            <input type="text" name="name" placeholder="Tên danh mục...">
                        </div>

                        <div class="form-group">
                            <label for="">Mô tả: </label>
                            <textarea type="text" name="description" id="description" placeholder="Mô tả..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Trạng thái: </label>
                            <div class="tes">
                                <input type="radio" name="active" id="active" value="1" checked=""> Hiển
                                thị
                            </div>
                            <div class="tes">
                                <input type="radio" name="active" id="active" value="0"> Không
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                            <a href="/quan-li/danh-muc/danh-sach" class="btn-back" title="Trở về">Trở về</a>
                            <button type="submit" class="btn btn-success">Thêm mới</button>
                    </div>
                </div>
            </div>
        </div>
        @csrf
    </form>