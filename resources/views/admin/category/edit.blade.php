@extends('admin.layouts.index')
@section('content')
<a href="{{ route('admin.categories.index') }}" class="btn btn-success btn-sm">الكل</a>
    <div class="card">
        <div class="card-header">تعديل</div>
        <div class="card-body">
       <form id="storeForm" action="{{ route('admin.categories.update',$item->id) }}" method="POST" >
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">العنوان بالعربى</label>
            <input class="form-control" name="title_ar" value="{{old('title_ar',$item->title_ar)}}">
        </div>
        <div class="form-group">
            <label for="">العنوان بالانجليزى</label>
            <input class="form-control" name="title_en" value="{{old('title_en',$item->title_en)}}">
        </div>
        <div class="form-group">
            <label for="">الصوره</label>
            <input class="form-control" type="File" name="logo" >
        </div>
       </form>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" form="storeForm">ارسال</button>
        </div>
    </div>
@endsection
