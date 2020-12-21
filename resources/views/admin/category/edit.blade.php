@extends('admin.admin')
@section('title', 'Edit Category')
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ url('admin/category/' . $category->id) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Category</h3>
                    </div>
                    <div class="card-body">
                        @if(!empty($errors->all()))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="name">Category</label>
                            <input type="text" value="{{ $category->name }}" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option {{ $category->status == "active" ? 'selected' : '' }} value="active">Active</option>
                                <option {{ $category->status == "inactive" ? 'selected' : '' }} value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-outline-secondary" href="{{ url('admin/category') }}">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection