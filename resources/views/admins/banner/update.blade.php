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
                        <input type="text" name="name" value="{{ $banner->name }}" id="title"
                            placeholder="Tiêu đề bài viết">
                    </div>
                    <div class="form-group">
                        <label for="">Chi tiết: </label>
                        <textarea type="text" name="description" id="description">{{ $banner->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Hình ảnh : </label>
                        <input type="file" name="image" id="image">
                        <img src="/image/banner/{{ $banner->image }}" width="100px" height="100px">
                    </div>
                    <div class="group-btn-edit">
                        <a href="/quan-li/quang-cao/danh-sach" class="btn btn-outline-warning" title="Trở về">Trở về</a>
                        <button type="submit" class="btn btn-success" title="Lưu">Cập nhật</button>
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
