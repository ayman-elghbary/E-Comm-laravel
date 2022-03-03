@extends('admin.layouts.index')
@section('content')
<a href="{{route('admin.categories.create')}}" class="btn btn-success btn-lg">اضافة</a>
    <div>
        <table class="table text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">العنوان عربى</th>
                <th scope="col">العنوان انجليزى</th>
                <th scope="col">صوره</th>
                <th scope="col">التحكم</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->title_ar}}</td>
                <td>{{$item->title_en}}</td>
                <td>
                  @if ($item->logo)
                  <img height="100" src="{{asset('storage/'.$item->logo)}}">
                    @else
                    بدون صوره
                  @endif
                  </td>
                <td>
                  <a class="btn btn-primary btn-sm" href="{{route('admin.categories.sizes',$item->id)}}">المقاسات</a>
                    <a class="btn btn-info btn-sm" href="{{route('admin.categories.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
                    <button form="delete{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    <form id="delete{{$item->id}}" action="{{route('admin.categories.destroy',$item->id)}}" method="POST">@csrf @method('delete')</form>
                </td>
              </tr>
              @empty
              <tr>
                <th colspan="4">لايوجد بيانات</th>
              
              </tr>
             
              @endforelse
            </tbody>
          </table>
          
         
    </div>
@endsection