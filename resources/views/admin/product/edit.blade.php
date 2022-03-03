@extends('admin.layouts.index')
@section('content')
<a href="{{ route('admin.products.index') }}" class="btn btn-success btn-sm">الكل</a>
    <div class="card">
        <div class="card-header">تعديل</div>
        <div class="card-body">
       <form id="storeForm" action="{{ route('admin.products.update',$item->id) }}" method="POST" >
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-6 form-group">
                <label for="">العنوان بالعربى</label>
                <input class="form-control" name="title_ar" value="{{ old('title_ar',$item->title_ar) }}">
            </div>
            <div class="col-6 form-group">
                <label for="">العنوان بالانجليزى</label>
                <input class="form-control" name="title_en" value="{{ old('title_en',$item->title_en) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-6 form-group">
                <label for="">القسم</label>
                <select name="category_id" class="form-control">
                    @foreach (\App\Models\Category::all() as $cat)
                        <option {{ old('category_id',$item->category_id== $cat->id ? 'selected' : '') }} value="{{ $cat->id }}">
                            {{ $cat->title_en }} - {{ $cat->title_ar }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6 form-group">
                <label for="">تاجات</label>
                <select name="tags[]" multiple class="form-control">
                    @foreach(\App\Models\Tag::all() as $tag)
                        <option  {{$item->tags->contains($tag) ? "selected" :""}} value="{{$tag->id}}">{{$tag->title_en}} - {{$tag->title_ar}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6 form-group">
                <label for="">المقاسات</label>
                <select name="sizes[]" multiple class="form-control">
                    @foreach(\App\Models\CategorySize::query()->where('category_id',$item->category_id)->get() as $size)
                        <option  {{$item->sizes->contains($size) ? "selected" :""}} value="{{$size->id}}">{{$size->value}} </option>
                    @endforeach
                </select>
            </div>
            {{-- <div class="col-6 form-group">
                <label for="">الكمية</label>
                <input class="form-control" name="quantity" value="{{ old('quantity',$item->quantity) }}">
            </div> --}}
            <div class="col-6 form-group">
                <label for="">السعر</label>
                <input class="form-control" name="price" value="{{ old('price',$item->price) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-6 form-group">
                <label for="">الوصف بالعربى</label>
                <textarea class="form-control" name="description_ar">{{ old('description_ar',$item->description_ar) }}</textarea>
            </div>
            <div class="col-6 form-group">
                <label for="">الوصف بالانجليزى</label>
                <textarea class="form-control" name="description_en">{{ old('description_en',$item->description_en) }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="">صوره اساسية</label>
                @if ($item->main_image)
                <img height="100" src="{{asset('storage/'.$item->main_image)}}">
                  @else
                  بدون صوره
                @endif
                <input class="form-control" type="File" name="main_image">
            </div>
        </div>
        <div class="row">
            <div class="col-12"><h5>خاصية جديده</h5></div>
            <div class="form-group col-3">
                <label for="">عنوان عربى</label>
                <input class="form-control" type="text" name="key_ar">
            </div>
            <div class="form-group col-3">
                <label for="">قيمة عربى</label>
                <input class="form-control" type="text" name="value_ar">
            </div>
            <div class="form-group col-3">
                <label for="">عنوان انجليزى</label>
                <input class="form-control" type="text" name="key_en">
            </div>
            <div class="form-group col-3">
                <label for="">قيمة انجليزى</label>
                <input class="form-control" type="text" name="value_en">
            </div>
        </div>

        <div class="row">
            <div class="col-12"><h5>لون جديده</h5></div>
            <div class="form-group col-3">
                <label for="">لون عربى</label>
                <input class="form-control" type="text" name="color_ar">
            </div>
            <div class="form-group col-3">
                <label for="">لون انجليزى</label>
                <input class="form-control" type="text" name="color_en">
            </div>
        </div>
            </form>
       <div class="row">
        <div class="col-12"><h5>خصائص المنتج</h5></div>
        @forelse ($item->props as $prop)
        <form class="col-8" id="updateProp{{$prop->id}}" method="POST" action="{{route('admin.product_props.update',$prop->id)}}"> 
            @csrf
            @method('PUT')  
            <div class="row">
                <div class="form-group col-3">
                    <label for="">عنوان عربى</label>
                    <input class="form-control" type="text" name="key_ar" value="{{$prop->key_ar}}">
                </div>
                <div class="form-group col-3">
                    <label for="">قيمة عربى</label>
                    <input class="form-control" type="text" name="value_ar" value="{{$prop->value_ar}}">
                </div>
                <div class="form-group col-3">
                    <label for="">عنوان انجليزى</label>
                    <input class="form-control" type="text" name="key_en" value="{{$prop->key_en}}">
                </div>
                <div class="form-group col-3">
                    <label for="">قيمة انجليزى</label>
                    <input class="form-control" type="text" name="value_en" value="{{$prop->value_en}}">
                </div>    
            </div>    
           
    </form>
 
        <div class="form-group col-4">
            <label for="">ادارة</label>
            <br>
            <button form="updateProp{{$prop->id}}" class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
            <button form="deleteprop{{$prop->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            <form id="deleteprop{{$prop->id}}" action="{{route('admin.product_props.destroy',$prop->id)}}" method="POST">@csrf @method('delete')</form>
        </div>
       @empty
       <div class="col-12">
           <h4>لايوجد</h4>
       </div>
        @endforelse
    </div>
    {{-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ --}}
    <div class="row">
        <div class="col-12"><h5>الوان المنتج</h5></div>
        @forelse ($item->colors as $color)
        <form class="col-8" id="updateColor{{$color->id}}" method="POST" action="{{route('admin.product_colors.update',$color->id)}}"> 
            @csrf
            @method('PUT')  
            <div class="row">
                <div class="form-group col-3">
                    <label for="">لون عربى</label>
                    <input class="form-control" type="text" name="color_ar" value="{{$color->color_ar}}">
                </div>
                <div class="form-group col-3">
                    <label for="">لون انجليزى</label>
                    <input class="form-control" type="text" name="color_en" value="{{$color->color_en}}">
                </div>
            </div>    
           
    </form>
 
        <div class="form-group col-4">
            <label for="">ادارة</label>
            <br>
            <button form="updateColor{{$color->id}}" class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
            <button form="deleteColor{{$color->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            <form id="deleteColor{{$color->id}}" action="{{route('admin.product_colors.destroy',$color->id)}}" method="POST">@csrf @method('delete')</form>
        </div>
       @empty
       <div class="col-12">
           <h4>لايوجد</h4>
       </div>
        @endforelse
    </div>
    {{--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\  --}}
    {{-- Images --}}
    <div class="row">
        <div class="col-12"><h5>صور المنتج</h5></div>
        <div class="col-12">
            <form action="{{route('admin.product_images.store')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{$item->id}}">
             <input type="file" name="image" class="form-control">
            <button type="submit" class="btn btn-success">اضافة</button>
        </form>
        </div>

        @forelse ($item->images as $imag)
        <div class="col-4">
            <img height="100" src="{{asset('storage/'.$imag->path)}}">
        </div>
        <div class="form-group col-8">
            <label for="">ادارة</label>
            <br>
            <button form="deleteprop{{$imag->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            <form id="deleteprop{{$imag->id}}" action="{{route('admin.product_images.destroy',$imag->id)}}" method="POST">@csrf @method('delete')</form>
        </div>
       @empty
       <div class="col-12">
           <h4>لايوجد</h4>
       </div>
        @endforelse
    </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" form="storeForm">حفظ</button>
        </div>
    </div>
@endsection
