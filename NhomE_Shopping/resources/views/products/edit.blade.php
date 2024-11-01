@extends('layouts.admin')
@section('title')
<title>Trang quản trị</title>
@endsection
@section('content')
<div class="content-wrapper">
   
    <div class="content">
        <div class="container-fluid">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="font-size: 24px; font-weight: bold;">Cập nhật sản phẩm</h3> <!-- Phóng to và bôi đậm -->
            </div>

                @if (session('status'))
                <p class="text-warning" style="margin:0px;padding:0px">
                    {{ session('status') }}
                </p>
                @endif
                <div class="card-body">
                    <form role="form" action="{{ route('products.saveedit',['id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body" style="padding: 0px;">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control" value="{{ $item -> name }}" placeholder="Nhập tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label>Mô tả ngắn</label>
                                <input type="text" name="description" class="form-control" value="{{ $item -> description }}" placeholder="Nhập giới thiệu sản phẩm">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Đơn giá</label>
                                            <input type="int" name="price" value="{{ $item -> price }}" class="form-control" placeholder="Nhập đơn giá sản phẩm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Giá khuyến mãi(nếu có)</label>
                                            <input type="int" name="discount" value="{{ $item -> discount }}" class="form-control" placeholder="Nhập đơn giá sản phẩm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Số lượng</label>
                                            <input type="int" name="quatity" value="{{ $item -> quatity }}" class="form-control" placeholder="Nhập đơn giá sản phẩm">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <input type="file" name="images" class="form-control" placeholder="Chọn hình ảnh">
                                            <img src="/images/{{ $item->images }}" style="width:100px;height:80px" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nhà cung cấp</label>
                                            <select class="form-control" name="ownerId">
                                                <option value="0">Chọn danh mục</option>
                                                {!! $htmlOwner !!}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Loại sản phẩm</label>
                                            <select class="form-control" name="categoryId">
                                                <option value="0">Chọn danh mục</option>
                                                {!! $htmlCategory !!}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="textarea" id="myTextarea" name="content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!! $item->description !!}</textarea>
                            </div>
                            
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
                            <a href="{{ route('products.index') }}" class="btn btn-default">Quay lại</a>
                        </div>
                    </form>

                </div>
           
            </div>
        </div>
    </div>

</div>
@endsection