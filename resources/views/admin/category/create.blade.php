@extends('admin.layouts.index')
@section('content')
<a href="{{route('admin.categories.index')}}" class="btn btn-success btn-sm">الكل</a>
    <div class="card">
        <div class="card-header">اضافة</div>
        <div class="card-body">
       <form id="storeForm" action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">العنوان بالعربى</label>
            <input class="form-control" name="title_ar" value="{{old('title_ar')}}">
        </div>
        <div class="form-group">
            <label for="">العنوان بالانجليزى</label>
            <input class="form-control" name="title_en" value="{{old('title_en')}}">
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


{{-- ///////////////////////////////////////// --}}

{{-- @extends('admin.layouts.index')
@section('content')
    <a href="{{route('admin.admins.index')}}" class="btn btn-success btn-sm">الكل</a>
    <div class="card">
        <div class="card-header">
            اضافة
        </div>
        <div class="card-body">
            <form id="storeForm" action="{{route('admin.admins.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">الاسم</label>
                    <input class="form-control" name="name" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="">الكود</label>
                    <input class="form-control" name="code" value="{{old('code')}}">
                </div>
                <div class="form-group">
                    <label for="">باسوورد</label>
                    <input class="form-control" name="password" type="password" value="{{old('password')}}">
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" form="storeForm">ارسال</button>
        </div>

    </div>
@endsection
 --}}
