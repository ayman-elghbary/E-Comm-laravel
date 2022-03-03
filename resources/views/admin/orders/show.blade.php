@extends('admin.layouts.index')
@section('content')
<h3>البيانات الاساسية</h3>
    <div class="row">
        <table class="table text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">بياانات العميل</th>
                <th scope="col">يانات الاتصال</th>
                <th scope="col">اجمالى الطلب</th>
                <th scope="col">حالة الطلب</th>


              </tr>
            </thead>
            <tbody>
               
               
            <tr>
              <td>{{$order->id}}</td>
              <td>{{$order->full_name}} <br> {{$order->full_address}} </td>
              <td>{{$order->name}}  - {{$order->email}} </td>
              <td>{{$order->total}}</td>
              <td>
                <form action="{{route('admin.orders.update',$order)}}" method="post">
                    @csrf
                    @method('put')
                    <select name="status">
                        @php($status = ['pending' =>'معلق',
                            'shipping'=>'في الطريق',
                            'rejected'=>'مرفوض',
                            'delivered'=>'وصل',
                            'closed'=>'طلب مغلق',])
                        @foreach($status as $statue => $title)
                            <option {{$statue == $order->status  ? "selected":""}} value="{{$statue}}">{{$title}}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-success" type="submit">save</button>
                </form>
            </td>
              
            </tr>
             
            </tbody>
          </table>
          
         
    </div>

    <h4>بيانات الطلب</h4>
    <div class="row">
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>اسم المنتج</th>
                <th>سعر المنتج</th>
                <th>اللون</th>
                <th>المقاس</th>
                <th>الكمية المطلوبة</th>
                <th>اجمالي</th>
            </tr>
            </thead>
            <tbody >
            @foreach($order->items as $item)
            <tr>
                <th>{{$item->id}}</th>
                <th>{{$item->product_name}}</th>
                <th>{{$item->product_price}}</th>
                <th>{{$item->chosen_color ?? "لم يحدد"}}</th>
                <th>{{$item->chosen_size ?? "لم يحدد"}}</th>
                <th>{{$item->quantity}}</th>
                <th>{{$item->sub_total}}</th>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection