@extends('admin.admin')
@section('title', 'Show Category')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Show Category</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Category</label>
                        <input class="form-control" type="text" readonly value="{{ $category->name }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input class="form-control" type="text" readonly value="{{ $category->status }}">
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url('admin/category') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection