@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{route('admin.setting.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>SEO Setting</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update SEO Setting</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.seo-setting.update', 1) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SEO Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="title" value="{{$seo->title}}" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SEO Description</label>
                                  <div class="col-sm-12 col-md-7">
                                      <textarea class="form-control" value="" name="description" style="height: 100px" name="" id=""
                                          cols="30" rows="10">{!!$seo->description!!}</textarea>
                                  </div>
                              </div>
                              <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> SEO Keywords</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="keywords" value="{{$seo->keywords}}" type="text" class="form-control">
                                    <code>Keywords must be comma separated!</code>
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
