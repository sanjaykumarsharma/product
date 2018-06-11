@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6"><h4>Product details</h4></div>
        <div class="col-md-6 text-right">
            <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>

   <div class="row">
       <div class="col-md-6">
         <img src="{{ asset('images/'.$product->image)}}" alt="" style="max-width:250px" class="img-responsive">
       </div>
       <div class="col-md-6">
         <h4>{{ $product->product_name }}</h4>
         <br>
         <p>
           {{ $product->description }}
         </p>
       </div>
   </div>
  
   <br>
   <br>
   <div class="row">
     @foreach($products as $p)
        
       <div class="col-md-2">
         <a href="{{ route('product.show', [$p->id]) }}">
           <img src="{{ asset('images/'.$p->image) }}" alt="" style="max-width:100px" class="img-responsive">
           <br>
           <p>{{ $p->product_name}}</p>
         </a>  
       </div>

     @endforeach
   </div>


</div>
@endsection