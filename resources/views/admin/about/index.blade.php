@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.about.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>About Section</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update About Section</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.about.update', 1) }}" method="POST"
                                enctype="multipart/form-data">

                                @csrf
                                @method('PUT')


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="image" id="image-upload" value="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="title" value="{{ $about->title }}" type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="description" class="summernote">{!! $about->description !!}</textarea>
                                    </div>
                                </div>

                                @if ($about->resume)
                                    <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Resume
                                        Upload</label>
                                    <div class="custom-file col-sm-12 col-md-7">
                                        <div> <i class="fa-solid fa-file" style="font-size: 20px"></i></div>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Resume
                                        Upload</label>
                                    <div class="custom-file col-sm-12 col-md-7">
                                        <input name="resume" type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('#image-preview').css( {
                'background-image': 'url("{{ asset($about->image) }}")',
                'background-size': 'cover',
                'background-position': 'center center',
            })
            // $('#image-preview').attr('value', '{{ asset($about->image) }}');
        })
    </script>
@endpush
