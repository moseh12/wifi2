@extends('layouts.app')

@section('title','Company Profile Information')

@section('content')
    <!-- Content area -->
    <div class="content">

        <!-- Form horizontal -->
        <div class="panel panel-info panel-bordered">
            <div class="panel-heading">
                <h5 class="panel-title">Company Profile Information </h5>
            </div>

            <div class="panel-body" id="edit_data">
                <form class="form-horizontal" action="{{ route('general.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="content-group row">
                        <input type="hidden" name="type" value="CompanyProfile">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Company Profile<span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <textarea name="details"  class="form-control summernote"  cols="30" rows="40">{{ (isset($profile->details))?$profile->details:old('details') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-1">Image <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="file" name="image_path" class="file-input" data-browse-class="btn btn-primary btn-block" data-show-remove="false" data-show-caption="false" data-show-upload="false">
                                    <span class="help-block">Recommended Image Height Width (405*237).</span>
                                </div>
                                <input type="hidden" name="old_image" value="{{ (isset($profile))?$profile->image_path:'' }}">
                                @if($profile)
                                <div class="col-md-5">
                                    <img src="{{ asset($profile->image_path) }}" alt="">
                                </div>
                                @endif
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

@section('script')



@endsection