@extends('layouts.admin')

@section('title', 'Sead Silajdzic | Contacts')

@section('content')

    <div class="col-12">
        <div class="card">
            <table class="table">
                <thead>
                <tr>
                    <th>Subject</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                        <tr>
                            <td>{{ Str::limit($contact->subject, 20) }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#contactDetails{{$contact->id}}">See details</a>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="contactDetails{{$contact->id}}" tabindex="-1" role="dialog" aria-labelledby="contactDetails" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="contactDetails">{{ $contact->subject }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row d-flex justify-content-between">
                                            <h4>Subject</h4>
                                            <h4>{{ $contact->subject }}</h4>
                                        </div>
                                        <div class="row d-flex justify-content-between">
                                            <h4>Name</h4>
                                            <h4>{{ $contact->name }}</h4>
                                        </div>
                                        <div class="row d-flex justify-content-between">
                                            <h4>Email</h4>
                                            <h4><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></h4>
                                        </div>
                                        <div class="row d-flex justify-content-between">
                                            <h4>Phone</h4>
                                            <h4>{{ $contact->phone }}</h4>
                                        </div>
                                        <hr>
                                        <div class="row d-flex flex-column">
                                            <h4>Message</h4>
                                            <p>{{ $contact->message }}</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>There are no contacts yet!</tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
