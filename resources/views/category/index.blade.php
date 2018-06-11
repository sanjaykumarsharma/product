@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6"><h4>Category</h4></div>
        <div class="col-md-6 text-right">
        <a href="{{ route('category.create') }}" class="btn btn-primary">Add New Category</a>
        </div>
    </div>

    <div class="row">
        <table class="table table-sm table-hover">
            <thead>
                <tr>
                    <th style="width:50px">Sl</th>
                    <th>Category</th>
                    <th></th>
                </tr>
            </thead>
            <tboday>

             @foreach($category as $c)

                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $c->category }}</td>
                    <td class="text-right">

                        <a href="{{ route('category.edit', [$c->id]) }}" class="btn btn-sm btn-default">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger"
                            onclick="
                            var result = confirm('Are you sure you wish to delete this Category?');
                                if( result ){
                                        event.preventDefault();
                                        document.getElementById('delete-form{{$c->id}}').submit();
                                }
                                    "
                        >Delete</a>

                        <form id="delete-form{{$c->id}}" action="{{ route('category.destroy',[$c->id]) }}"
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
                    {{ $category->links() }}
            </div>
        </div>

    </div>

</div>
@endsection