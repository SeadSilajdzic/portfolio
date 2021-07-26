@extends('layouts.admin')

@section('title', 'Sead Silajdzic | Categories')

@section('content')



    <div class="row">
        <div class="col-6">
            <h3>Categories</h3>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="d-flex">
                            <a href="#" data-toggle="modal" data-target="#editCategory{{ $category->id }}" class="btn-info btn-sm mr-3">Edit</a>
                            <form action="{{ route('admin.category.destroy', $category) }}" method="post">
                                @csrf
                                @method('delete')

                                <button type="submit" name="btn_delete_category" class="btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="editCategory{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="editCategory{{ $category->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ $category->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.category.update', $category) }}" method="post">
                                        @csrf
                                        @method('put')

                                        <div class="form-group">
                                            <label for="name">Change category name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary rounded-3" name="btn_edit_category">Edit Category</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td>We don't have any categories to display :(</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <h3>New Category</h3>
            <form action="{{ route('admin.category.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="name">Category</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary rounded-3" name="btn_create_category">Add Category</button>
                </div>
            </form>
        </div>
    </div>


@endsection
