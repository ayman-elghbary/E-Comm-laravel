@extends('admin.layouts.index')
@section('content')
<a href="{{route('admin.sliders.create')}}" class="btn btn-success btn-lg">اضافة</a>
    <div>
        <table class="table text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">العنوان  عربى</th>
                <th scope="col">العنوان  انجليزى</th>
                <th scope="col">العنوان كبير  عربى</th>
                <th scope="col">العنوان كبير  انجليزى</th>
                <th scope="col">صوره</th>
                <th scope="col">التحكم</th>
              </tr>
            </thead>
            <tbody>
                @forelse (\App\Models\Slider::all() as $item)
                    
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->small_title_ar}}</td>
                <td>{{$item->small_title_en}}</td>
                <td>{{$item->big_title_ar}}</td>
                <td>{{$item->big_title_en}}</td>
                <td>
                  @if ($item->image)
                  <img height="100" src="{{asset('storage/'.$item->image)}}">
                    @else
                    بدون صوره
                  @endif
                  </td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{route('admin.sliders.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
                    <button form="delete{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    <form id="delete{{$item->id}}" action="{{route('admin.sliders.destroy',$item->id)}}" method="POST">@csrf @method('delete')</form>
                </td>
              </tr>
              @empty
              <tr>
                <th colspan="12">لايوجد بيانات</th>
              
              </tr>
             
              @endforelse
            </tbody>
          </table>
          
         
    </div>
@endsection