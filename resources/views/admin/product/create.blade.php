@extends('admin.layouts.index')
@section('content')
    <a href="{{ route('admin.products.index') }}" class="btn btn-success btn-sm">الكل</a>
    <div class="card">
        <div class="card-header">اضافة</div>
        <div class="card-body">
            <form id="storeForm" action="{{ route('admin.products.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6 form-group">
                        <label for="">العنوان بالعربى</label>
                        <input class="form-control" name="title_ar" value="{{ old('title_ar') }}">
                    </div>
                    <div class="col-6 form-group">
                        <label for="">العنوان بالانجليزى</label>
                        <input class="form-control" name="title_en" value="{{ old('title_en') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 form-group">
                        <label for="">القسم</label>
                        <select name="category_id" class="form-control">
                            <option style="display: none">اختر القسم</option>
                            @foreach (\App\Models\Category::all() as $cat)
                                <option {{ old('category_id' == $cat->id ? 'selected' : '') }}
                                    value="{{ $cat->id }}">
                                    {{ $cat->title_en }} - {{ $cat->title_ar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">تاجات</label>
                        <select name="tags[]" multiple class="form-control">
                            @foreach (\App\Models\Tag::all() as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->title_en }} - {{ $cat->title_ar }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="col-6 form-group">
                        <label for="">الكمية</label>
                        <input class="form-control" name="quantity" value="{{ old('quantity') }}">
                    </div> --}}
                    <div class="col-6 form-group">
                        <label for="">السعر</label>
                        <input class="form-control" name="price" value="{{ old('price') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 form-group">
                        <label for="">الوصف بالعربى</label>
                        <textarea class="form-control" name="description_ar">{{ old('description_ar') }}</textarea>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">الوصف بالانجليزى</label>
                        <textarea class="form-control" name="description_en">{{ old('description_en') }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">صوره اساسية</label>
                    <input class="form-control" type="File" name="main_image">
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" form="storeForm">ارسال</button>
        </div>
    </div>
@endsection


{{-- ///////////////////////////////////////// --}}
