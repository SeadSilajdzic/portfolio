@extends('layouts.admin')

@section('title', 'Sead Silajdzic | Contacts')

@section('content')

    <div class="col-12">
        <div class="card">
            <table class="table">
                <thead>
                <tr>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Client</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($projects as $project)
                    <tr>
                        <td>{{ $project->category->name }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->client }}</td>
                        <td>{{ $project->created_at->toFormattedDateString() }}</td>
                        <td class="d-flex">
                            <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#checkDetails{{$project->id}}"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('admin.project.store') }}" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#projectEdit{{$project->id}}">Edit</a>
                            <form action="{{ route('admin.project.trash', $project) }}" method="post">
                                @csrf

                                <button type="submit" name="btn_delete_project" onclick="return confirm('Are you sure you want to trash this project?')" class="btn btn-sm btn-danger"><i class="fas fa-ban"></i></button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="checkDetails{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="checkDetails{{$project->id}}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="contactDetails">{{ $project->title }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row d-flex justify-content-between">
                                        <h4>Title</h4>
                                        <h4>{{ $project->title }}</h4>
                                    </div>
                                    <div class="row d-flex justify-content-between">
                                        <h4>Category</h4>
                                        <h4>{{ $project->category->name }}</h4>
                                    </div>
                                    <div class="row d-flex justify-content-between">
                                        <h4>Client</h4>
                                        <h4>{{ $project->client }}</h4>
                                    </div>
                                    <div class="row d-flex justify-content-between">
                                        <h4>Project URL</h4>
                                        <h4>{{ $project->project_url }}</h4>
                                    </div>
                                    <hr>
                                    <div class="row d-flex flex-column">
                                        <h4>Description</h4>
                                        <p>{!! $project->description !!}</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="projectEdit{{$project->id}}" tabindex="-1" role="dialog" aria-labelledby="projectEdit{{$project->id}}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="contactDetails">Edit project info</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.project.update', $project) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')

                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" class="form-control" value="{{ $project->title }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="slug">Slug</label>
                                            <input type="text" name="slug" class="form-control" placeholder="Leave empty to auto generate" value="{{ $project->slug }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="category_id">Category</label>
                                            <select name="category_id" id="category_id" class="form-control">
                                                @foreach($categories as $category)

                                                    <option value="{{ $category->id }}"

                                                        @if($project->category->id == $category->id)
                                                            selected
                                                        @endif

                                                    >{{ $category->name }}</option>

                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="client">Client</label>
                                            <input type="text" name="client" class="form-control" value="{{ $project->client }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="project_url">Project URL</label>
                                            <input type="text" name="project_url" class="form-control" value="{{ $project->project_url }}">
                                        </div>

                                        <div class="form-group row">
                                            <label for="featured" class="col-form-label col-sm-2 text-sm-right">Image</label>
                                            <div class="col-sm-10">
                                                <div class="custom-file">
                                                    <input type="file" name="featured" class="custom-file-input" id="featured">
                                                    <label class="custom-file-label" for="featured">Choose file</label>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" class="form-control ckeditor" cols="30" rows="10">{!! $project->description !!}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="btn_update_project" class="btn btn-primary">Edit project</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>

                                @include('partials.errors')
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td>There are no projects yet!</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <a href="{{ route('admin.project.store') }}" data-toggle="modal" data-target="#addNewProject" class="btn btn-block btn-success col-6">Add new project</a>

            <!-- Modal -->
            <div class="modal fade" id="addNewProject" tabindex="-1" role="dialog" aria-labelledby="addNewProject" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="contactDetails">Add new project</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.project.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" class="form-control" placeholder="Leave empty to auto generate">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control ckeditor" cols="30" rows="10"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="project_url">Project URL</label>
                                    <input type="url" name="project_url" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="client">Client</label>
                                    <input type="text" name="client" class="form-control">
                                </div>

                                <div class="form-group">
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option selected disabled>Select category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label for="featured" class="col-form-label col-sm-2 text-sm-right">Image</label>
                                    <div class="col-sm-10">
                                        <div class="custom-file">
                                            <input type="file" name="featured" class="custom-file-input" id="featured">
                                            <label class="custom-file-label" for="featured">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="btn_add_new_project" class="btn btn-success">Add project</button>
                                </div>

                                @include('partials.errors')
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                        @include('partials.errors')
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
