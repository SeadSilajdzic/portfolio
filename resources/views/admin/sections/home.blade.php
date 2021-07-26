@extends('layouts.admin')

@section('title', 'Sead Silajdzic | Home')

@section('content')

    <div class="col-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.home_store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="main_title" class="col-form-label col-sm-2 text-sm-right">Main title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Main title" name="main_title" value="{{ $info->main_title }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="facebook" class="col-form-label col-sm-2 text-sm-right">Facebook</label>
                        <div class="col-sm-10">
                            <input type="url" class="form-control" placeholder="Facebook" name="facebook" value="{{ $info->facebook }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="behance" class="col-form-label col-sm-2 text-sm-right">Behance</label>
                        <div class="col-sm-10">
                            <input type="url" class="form-control" placeholder="Behance" name="behance" value="{{ $info->behance }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="twitter" class="col-form-label col-sm-2 text-sm-right">Twitter</label>
                        <div class="col-sm-10">
                            <input type="url" class="form-control" placeholder="Twitter" name="twitter" value="{{ $info->twitter }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="instagram" class="col-form-label col-sm-2 text-sm-right">Instagram</label>
                        <div class="col-sm-10">
                            <input type="url" class="form-control" placeholder="Instagram" name="instagram" value="{{ $info->instagram }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="skype" class="col-form-label col-sm-2 text-sm-right">Skype</label>
                        <div class="col-sm-10">
                            <input type="url" class="form-control" placeholder="Skype" name="skype" value="{{ $info->skype }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="m_teams" class="col-form-label col-sm-2 text-sm-right">Microsoft Teams</label>
                        <div class="col-sm-10">
                            <input type="url" class="form-control" placeholder="Microsoft Teams" name="m_teams" value="{{ $info->m_teams }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="linkedin" class="col-form-label col-sm-2 text-sm-right">Linkedin</label>
                        <div class="col-sm-10">
                            <input type="url" class="form-control" placeholder="Linkedin" name="linkedin" value="{{ $info->linkedin }}">
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <label for="aboutDesc" class="col-form-label col-sm-2 text-sm-right">Intro</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="aboutDesc" placeholder="Intro" id="aboutDesc" rows="3">{{ $info->aboutDesc }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role_title" class="col-form-label col-sm-2 text-sm-right">Role title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Role title" name="role_title" value="{{ $info->role_title }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="short_note" class="col-form-label col-sm-2 text-sm-right">Short note</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="short_note" placeholder="Intro" id="aboutShortNote" rows="3">{{ $info->short_note }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birthday" class="col-form-label col-sm-2 text-sm-right">Birthday</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" placeholder="Birthday" name="birthday" value="{{ $info->birthday->toDateString() }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="website" class="col-form-label col-sm-2 text-sm-right">Website</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Website" name="website" value="{{ $info->website }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-form-label col-sm-2 text-sm-right">Phone</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" placeholder="Phone" name="phone" value="{{ $info->phone }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="city" class="col-form-label col-sm-2 text-sm-right">City</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="City" name="city" value="{{ $info->city }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="age" class="col-form-label col-sm-2 text-sm-right">Age</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Age" name="age" value="{{ $info->age }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="education" class="col-form-label col-sm-2 text-sm-right">Education</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Education" name="education" value="{{ $info->education }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mail" class="col-form-label col-sm-2 text-sm-right">Mail</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" placeholder="Mail" name="mail" value="{{ $info->mail }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-form-label col-sm-2 text-sm-right">Status</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Status" name="status" value="{{ $info->status }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="aboutme" class="col-form-label col-sm-2 text-sm-right">About me</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="aboutme" placeholder="Intro" id="aboutme" rows="3">{{ $info->aboutme }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="featured" class="col-form-label col-sm-2 text-sm-right">Featured image</label>
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input type="file" name="featured" class="custom-file-input" id="featured">
                                <label class="custom-file-label" for="featured" for="featured">Choose file</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cv" class="col-form-label col-sm-2 text-sm-right">Curriculum Vitae</label>
                        <div class="col-sm-10">
                            <input type="url" class="form-control" placeholder="Curriculum Vitae" name="cv" value="{{ $info->cv }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                            <button type="submit" name="btn_save_home_changes" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                    @include('partials.errors')
                </form>
            </div>
        </div>
    </div>

@endsection
