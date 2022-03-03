@extends('admin.layouts.index')
@section('content')

    <div class="row">
        <table class="table text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">بياانات العميل</th>
                <th scope="col">يانات الاتصال</th>
                <th scope="col">اجمالى الطلب</th>
                <th scope="col">حالة الطلب</th>
                <th scope="col">ادارة</th>

              </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->full_name}} <br> {{$item->full_address}} </td>
                <td>{{$item->name}}  - {{$item->email}} </td>
                <td>{{$item->total}}</td>
                <td>{{$item->status}}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{route('admin.orders.show',$item->id)}}"><i class="fa fa-eye"></i></a>
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