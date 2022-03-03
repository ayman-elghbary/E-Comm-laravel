@extends('admin.layouts.index')
@section('content')
<a href="{{route('admin.admins.create')}}" class="btn btn-success btn-lg">اضافة</a>
    <div>
        <table class="table text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">كود</th>
                <th scope="col">الاسم</th>
                <th scope="col">التحكم</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->code}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{route('admin.admins.edit',$item->id)}}"><i class="fa fa-edit"></i></a>
                    <button form="delete{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    <form id="delete{{$item->id}}" action="{{route('admin.admins.destroy',$item->id)}}" method="POST">@csrf @method('delete')</form>
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