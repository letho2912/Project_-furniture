@extends('admins.include.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <div class="manager-form">
        <div class="card shadow mb-4">
            <div class="card__title">
                <p>{{ $title }}</p>
            </div>
            <div class="edit-product">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tiêu đề bài viết: </label>
                        <input type="text" name="name" id="name" placeholder="Tiêu đề bài viết...">
                    </div>
                    <div class="form-group">
                        <label for="">Chi tiết: </label>
                        <textarea type="text" name="description" id="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Vị trí : </label>
                        <select name="location" id="location">
                            <option value="dau-trang-chinh">Đầu trang trái</option>
                            <option value="dau-trang-phu">Đầu trang phải</option>
                            <option value="than-trang">Thân trang</option>
                        </select>
                    </div>
                    <input type="hidden" name="slug" id="slug">
                    <div class="form-group">
                        <label for="">Hình ảnh : </label>
                        <input type="file" name="image" id="image">
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
                    <div class="group-btn-edit">
                        <a href="/quan-li/tin-tuc/danh-sach" class="btn btn-outline-danger" title="Trở về">Trở về</a>
                        <button type="submit" class="btn-save" title="Lưu">Thêm mới</button>
                    </div>

                    @csrf
                </form>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('description')
    </script>
@endsection
