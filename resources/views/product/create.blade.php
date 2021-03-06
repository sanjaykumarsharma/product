@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6"><h4>Add New Product</h4></div>
        <div class="col-md-6 text-right">
            <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>

   <div class="row">
       <div class="col-md-4">
            <form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('product.form')
            </form>
       </div>
   </div>


</div>
@endsection