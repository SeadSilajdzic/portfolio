@extends('layouts.admin')

@section('title', 'Sead Silajdzic | Trash')

@section('content')

    <h4>Projects</h4>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Client</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->category->name }}</td>
                    <td>{{ $project->client }}</td>
                    <td class="d-flex">
                        <form action="{{ route('admin.project.restore', $project->id) }}" method="post">
                            @csrf

                            <button type="submit" name="btn_restore_project" onclick="return confirm('Are you sure you want to restore this project?')" class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                        </form>
                        <form action="{{ route('admin.project.destroy', $project) }}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" name="btn_remove_project" onclick="return confirm('Are you sure you want to delete this project?')" class="btn btn-sm btn-danger"><i class="fas fa-ban"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>
                        There are no any projects in trash!
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <hr>

    <h4>Contacts</h4>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->subject }}</td>
                <td class="d-flex">
                    <form action="{{ route('admin.contact.restore', $contact->id) }}" method="post">
                        @csrf

                        <button type="submit" name="btn_restore_contact" onclick="return confirm('Are you sure you want to restore this contact?')" class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                    </form>
                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="post">
                        @csrf
                        @method('delete')

                        <button type="submit" name="btn_remove_contact" onclick="return confirm('Are you sure you want to delete this contact?')" class="btn btn-sm btn-danger"><i class="fas fa-ban"></i></button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td>
                    There are no any contacts in trash!
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection
