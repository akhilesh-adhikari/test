@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="text-rignt">
            <a href="products/create" class="btn btn-primary btn-dark mt-2">New Products</a>
        </div>
        

        <table class="table table-hover mt-3">
            <thead>
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
            <tr>
                <td>{{$loop->index +1}}</td>
                <td>
                    <a href="products/{{$product->id}}/view" class="text-dark">{{$product->name}}</a>
                </td>
                <td>
                    <img src="{{asset('images/'.$product->image)}}" class="rounded-circle" width="50px" height="50px">
                    <!-- <img src="images/{{$product->image}}" class="rounded-circle" width="50px" height="50px"/> -->
                </td>
                <td>
                    <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-dark">edit</a>
                    <a href="products/{{$product->id}}/edit_by_id" class="btn btn-primary btn-sm">EDIT</a>
                    <a href="products/{{$product->id}}/delete" class="btn btn-danger btn-sm">DELETE</a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    
@endsection	