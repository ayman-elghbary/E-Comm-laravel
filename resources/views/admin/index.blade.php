<?php 
// use \App\Models\Admin; can i write this in code like under now
use \App\Models\User;
use \App\Models\Order;
use \App\Models\Product;

?>
@extends('admin.layouts.index')
@section('content')
<div class="row">
    {{-- Admin --}}
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{\App\Models\Admin::query()->count()}}</h3>
          <p>المشرفين</p>
        </div>
        <div class="icon">
          <i class="fa fa-user"></i>
        </div>
        <a href="#" class="small-box-footer">المزيد<i class="fa fa-arrow-circle-left"></i></a>
      </div>
    </div>

     {{-- User --}}
     <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{User::query()->count()}}</h3>
            <p>العملاء</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="#" class="small-box-footer">المزيد<i class="fa fa-arrow-circle-left"></i></a>
        </div>
      </div>

      {{-- Order --}}
     <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{Order::query()->count()}}</h3>
            <p>الطلبات</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="#" class="small-box-footer">المزيد<i class="fa fa-arrow-circle-left"></i></a>
        </div>
      </div>
      {{-- Products --}}
     <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{Product::query()->count()}}</h3>
            <p>المنتاجات</p>
          </div>
          <div class="icon">
            <i class="fa fa-product-hunt"></i>
          </div>
          <a href="#" class="small-box-footer">المزيد<i class="fa fa-arrow-circle-left"></i></a>
        </div>
      </div>
</div>
@endsection