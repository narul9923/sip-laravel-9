@extends('admin.admin')
@section('title', 'Category')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Categories</h3>
                    <a href="{{ route('category.create') }}">
                        <i class="fa fa-plus float-right"></i>
                    </a>
                </div>
                <div class="card-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <form method="post" action="{{ url('admin/category/'. $item->id) }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <a class="btn btn-info" href="{{ url('admin/category/'. $item->id) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-primary" href="{{ url('admin/category/'. $item->id .'/edit') }}"><i class="fa fa-edit"></i></a>
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection