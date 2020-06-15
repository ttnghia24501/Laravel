@extends('components.layout')
@section('content')
    <div class="col-md-12">
        <div class="content-panel">
            <h4><i class="fa fa-angle-right"></i> Basic Table</h4>
            <hr>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Created at</th>
                    <th>Update at</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->__get("id")}}</td>
                        <td>{{$product->__get("product_name")}}</td>
                        <td>{{$product->__get("product_desc")}}</td>
                        <td>{{$product->__get("price")}}</td>
                        <td>{{$product->__get("qty")}}</td>
                        <td>{{$product->__get("category_id")}}</td>
                        <td>{{$product->__get("brand_id")}}</td>
                        <td>{{$product->__get("created_at")}}</td>
                        <td>{{$product->__get("updated_at")}}</td>
                        <td>
                            <a href="{{url("/edit-category/{$product->__get("id")}")}}" class="btn btn-outline btn-warning ">Edit</a>
                            <form action="{{url("/delete-category/{$product->__get("id")}")}}"method="post">
                                @method("DELETE")
                                @csrf
                                <button type="submit" onclick="return confirm('Are you sure?');"class="btn btn-warning">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $products ->links() !!}
        </div>
    </div>
@endsection

