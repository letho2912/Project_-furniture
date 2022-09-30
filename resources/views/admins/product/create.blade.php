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
                            <input type="text" name="name" value="{{ old('name') }}" id="name"
                                placeholder="Tên sản phẩm">
                        </div>
                        <div class="form-group-product">
                            <label for="">Giá sản phẩm: </label>
                            <input type="number" name="price" value="{{ old('price') }}" id="price"
                                placeholder="Giá bán">
                        </div>
                    </div>
                    <div class="form-product-input">
                        @if ($errors->has('name'))
                            <ul class="error">
                                @foreach ($errors->get('name') as $error)
                                    {{ $error }}
                                @endforeach
                            </ul>
                        @endif
                        @if ($errors->has('price'))
                            <ul class="error">
                                @foreach ($errors->get('price') as $error)
                                    {{ $error }}
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="form-product-input">
                        <div class="form-group-product">
                            <label for="">Danh mục sản phẩm: </label>
                            <select name="category_id" id="category_id">
                                @foreach ($cate as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group-product">
                            <label for="">Giá khuyến mãi: </label>
                            <input type="number" name="sale" value="{{ old('sale') }}" id="sale"
                                placeholder="Giá khuyến mãi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Chi tiết: </label>
                        <textarea type="text" name="description" value="{{ old('description') }}" id="description"></textarea>
                    </div>
                    <div class="form-product-input">
                        <div class="form-group-product">
                            <label for="seo_description">Mô tả: </label>
                            <input type="text" name="seo_description" value="{{ old('seo_description') }}"
                                id="seo_description" placeholder="Mô tả ngắn">
                        </div>
                        <div class="form-group-product">
                            <label for="producer">Nhà sản xuất: </label>
                            <input type="text" name="producer" value="{{ old('producer') }}" placeholder="Nhà sản xuất">
                        </div>
                    </div>
                    <div class="form-product-input">
                        @if ($errors->has('seo_description'))
                            <ul class="error">
                                @foreach ($errors->get('seo_description') as $error)
                                    {{ $error }}
                                @endforeach
                            </ul>
                        @endif
                        @if ($errors->has('producer'))
                            <ul class="error">
                                @foreach ($errors->get('producer') as $error)
                                    {{ $error }}
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="form-product-input">
                        <div class="form-group-product">
                            <label for="material">Chất liệu: </label>
                            <input type="text" name="material" value="{{ old('material') }}" placeholder="Chất liệu">
                        </div>
                        <div class="form-group-product">
                            <label for="image">Hình ảnh : </label>
                            <input type="file" name="image" id="image">
                        </div>
                    </div>
                    <div class="form-product-input">
                        @if ($errors->has('material'))
                            <ul class="error">
                                @foreach ($errors->get('material') as $error)
                                    {{ $error }}
                                @endforeach
                            </ul>
                        @endif
                        @if ($errors->has('image'))
                            <ul class="error">
                                @foreach ($errors->get('image') as $error)
                                    {{ $error }}
                                @endforeach
                            </ul>
                        @endif
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
                        <a href="#" class="btn btn-outline-danger" title="Trở về">Trở về</a>
                        <button type="submit" class="btn btn-success" title="Lưu">Thêm mới</button>
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
