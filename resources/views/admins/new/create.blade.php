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
                        <input type="text" name="title" id="title" placeholder="Tiêu đề bài viết...">
                    </div>
                    <div class="form-group">
                        <label for="">Chi tiết bài viết: </label>
                        <textarea type="text" name="description" id="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả: </label>
                        <textarea type="text" name="seo_description" id="seo_description" placeholder="Mô tả..."></textarea>
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
