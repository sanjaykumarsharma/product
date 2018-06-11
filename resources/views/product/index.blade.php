@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6"><h4>Products</h4></div>
        <div class="col-md-6 text-right">
            <a href="{{ route('product.create') }}" class="btn btn-primary">Add New Product</a>
        </div>
    </div>

    <div class="row">
        <table class="table table-sm table-hover">
            <thead>
                <tr>
                    <th style="width:50px">Sl</th>
                    <th>Image</th>
                    <th>Product</th>
                    <th></th>
                </tr>
            </thead>
            <tboday>

             @foreach($products as $p)

                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td><img src="{{asset('images/'.$p->image)}}" class="img-responsive" style="max-width:25px"></td>
                    <td>{{ $p->product_name }}</td>
                    <td class="text-right">

                        <a href="{{ route('product.edit', [$p->id]) }}" class="btn btn-sm btn-default">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger"
                            onclick="
                            var result = confirm('Are you sure you wish to delete this Product?');
                                if( result ){
                                        event.preventDefault();
                                        document.getElementById('delete-form{{$p->id}}').submit();
                                }
                                    "
                        >Delete</a>

                        <form id="delete-form{{$p->id}}" action="{{ route('product.destroy',[$p->id]) }}"
                            method="POST" style="display: none;">
                                    <input type="hidden" name="_method" value="delete">
                                    {{ csrf_field() }}
                        </form>
                    </td>
                </tr>

             @endforeach

            </tboday>
        </table>

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                    {{ $products->links() }}
            </div>
        </div>

    </div>

</div>
@endsection