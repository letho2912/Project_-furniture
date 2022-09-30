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
                    <div class="form-product-input">
                        <div class="form-group-product">
                            <label for="name">Tên sản phẩm: </label>
                            <input type="text" name="name" value="{{ $product->name }}" id="name"
                                placeholder="Tên sản phẩm">
                        </div>
                        <div class="form-group-product">
                            <label for="">Giá sản phẩm: </label>
                            <input type="number" name="price" value="{{ $product->price }}" id="price"
                                placeholder="Giá bán">
                        </div>
                    </div>
                    <div class="form-product-input">
                        <div class="form-group-product">
                            <label for="">Danh mục sản phẩm: </label>
                            <select name="category_id" id="category_id">
                                @foreach ($cate as $cate)
                                    <option value="{{ $cate->id }}"
                                        {{ $product->category_id == $cate->id ? 'selected' : '' }}>{{ $cate->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group-product">
                            <label for="">Giá khuyến mãi: </label>
                            <input type="number" name="sale" value="{{ $product->sale }}" id="sale"
                                placeholder="Giá khuyến mãi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Chi tiết: </label>
                        <textarea type="text" name="description" value="{{ $product->description }}" id="description">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-product-input">
                        <div class="form-group-product">
                            <label for="seo_description">Mô tả: </label>
                            <input type="text" name="seo_description" value="{{ $product->seo_description }}"
                                id="seo_description" placeholder="Mô tả ngắn">
                        </div>
                        <div class="form-group-product">
                            <label for="producer">Nhà sản xuất: </label>
                            <input type="text" name="producer" value="{{ $product->producer }}"
                                placeholder="Nhà sản xuất">
                        </div>
                    </div>
                    <div class="form-product-input">
                        <div class="form-group-product" style="margin-right: 0">
                            <label for="material">Chất liệu: </label>
                            <input type="text" name="material" value="{{ $product->material }}" placeholder="Chất liệu">
                        </div>
                        <div class="form-group-product">
                            <label for="image" style="padding-left: 20px">Hình ảnh : </label>
                            <input type="file" name="image" id="image">
                            <img src="/image/product/{{ $product->image }}" width="100px" height="100px">
                        </div>
                    </div>
                    <div class="group-btn-edit">
                        <a href="#" class="btn-back" title="Trở về">Trở về</a>
                        <button type="submit" class="btn-save" title="Lưu">Lưu</button>
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
