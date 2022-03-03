@extends('admin.layouts.index')
@section('content')

    <div>
        <table class="table text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">المقاس</th>
                <th scope="col">التحكم</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($sizes   as $item)
                    
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->value}}</td>
              
                <td>
                 
                    <button form="delete{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    <form id="delete{{$item->id}}" action="{{route('admin.categories.sizes.delete',$item->id)}}" method="POST">@csrf @method('delete')</form>
                </td>
              </tr>
              @empty
              <tr>
                <th colspan="4">لايوجد مقاسات</th>
              
              </tr>
             
              @endforelse
              <tr>
                <td colspan="2">
                    <form id="createForm"  action="{{route('admin.categories.sizes.store',$category->id)}}" method="post">
                        @csrf
                        <input class="form-control" name="value" value="{{old('value')}}">
                    </form>
                </td>
                <th>
                    <button form="createForm" type="submit" class="btn btn-success">اضافة</button>
                </th>
            </tr>
            </tbody>
          </table>
          
         
    </div>
@endsection