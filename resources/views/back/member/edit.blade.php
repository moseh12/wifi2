@extends('layouts.app')

@section('title','Edit Team Member')

@section('content')
    <!-- Content area -->
    <div class="content">

        <!-- Form horizontal -->
        <div class="panel panel-info panel-bordered">
            <div class="panel-heading">
                <h5 class="panel-title">Update Team Member Information </h5>
            </div>

            <div class="panel-body" id="edit_data">
                <form class="form-horizontal" action="{{ route('teamMember.update', $teamMember->member_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <fieldset class="content-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-4">Member Name <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" name="member_name" required value="{{ $teamMember->member_name }}" class="form-control" placeholder="Enter Member Name..." />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4">Member Designation <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" name="member_degi" required value="{{ $teamMember->member_degi }}" class="form-control" placeholder="Enter Member Designation..." />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4">View Position</label>
                                <div class="col-lg-8">
                                    <input type="text" name="member_position" required value="{{ $teamMember->member_position }}" class="form-control" placeholder="Enter View Position..." />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4">Member Status <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <select name="member_status" required class="form-control">
                                        <option value="A">Active</option>
                                        <option value="I">In Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4">Member Image <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="file" name="member_image" class="file-input" data-browse-class="btn btn-primary btn-block" data-show-remove="false" data-show-caption="false" data-show-upload="false">
                                    <span class="help-block">Display the widget as a single block button.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-4">Facebook URL</label>
                                <div class="col-lg-8">
                                    <input type="text" name="facebook" value="{{ $teamMember->social_link->facebook }}" class="form-control" placeholder="Enter Facebook URL..." />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-4">Twitter URL</label>
                                <div class="col-lg-8">
                                    <input type="text" name="twitter" value="{{ $teamMember->social_link->twitter }}" class="form-control" placeholder="Enter Twitter URL..." />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-4">Google URL</label>
                                <div class="col-lg-8">
                                    <input type="text" name="google" value="{{ $teamMember->social_link->google }}" class="form-control" placeholder="Enter Google URL..." />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-4">Linkedin URL</label>
                                <div class="col-lg-8">
                                    <input type="text" name="linkedin" value="{{ $teamMember->social_link->linkedin }}" class="form-control" placeholder="Enter LinkedIn URL..." />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4">Current Image</label>
                                <div class="col-lg-8">
                                    <input type="hidden" name="old_image" value="{{ $teamMember->member_image }}">
                                    <img src="{{ asset($teamMember->member_image) }}" class="img-fluid img-responsive img-thumbnail" alt="">
                                </div>
                            </div>

                        </div>
                    </fieldset>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /form horizontal -->
    </div>
    <!-- /content area -->
@endsection

@section('custom_script')



@endsection