@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6"><h4>Edit Category</h4></div>
        <div class="col-md-6 text-right">
            <a href="{{ route('category.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>

   <div class="row">
       <div class="col-md-4 col-md-offset-4">
            <form action="{{ route('category.update', [$category->id])}}" method="POST">
                    <input type="hidden" name="_method" value="put">
                {{ csrf_field() }}
                @include('category.form')
            </form>
       </div>
   </div>


</div>
@endsection