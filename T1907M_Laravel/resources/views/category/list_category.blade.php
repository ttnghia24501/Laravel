@extends('components.layout')
@section('content')
    <div class="col-md-12">
        <div class="content-panel">
            <h4><i class="fa fa-angle-right"></i> Basic Table</h4>
            <hr>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Time Created</th>
                    <th>Time Updated</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categoriess as $categories)
                <tr>
                    <td>{{$categories->id}}</td>
                    <td>{{$categories->category_name}}</td>
                    <td>{{$categories->created_at}}</td>
                    <td>{{$categories->updated_at}}</td>
                    <td>
                        <a href="{{url("/edit-category/{$categories->__get("id")}")}}" class="btn btn-outline btn-warning ">Edit</a>
                        <form action="{{url("/delete-category/{$categories->__get("id")}")}}"method="post">
                            @method("DELETE")
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure?');"class="btn btn-warning">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {!! $categoriess ->links() !!}
        </div>
    </div>
@endsection

