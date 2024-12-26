@extends('backend.layouts.app')
@section('title', config('app.name') . ' - Add university')

@section('content')
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Edit</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">university</li>
                              <li class="breadcrumb-item active" aria-current="page">Edit</li>
                          </ol>
                      </nav>
                  </div>
              </div>

          </div>
      </div>

      <section class="content">

          <div class="row">
            <div class="col-12">
              <div class="box">
                  <div class="box-header with-border">
                    <h4 class="box-title">About University</h4>
                  </div>
                <div class="box-body">
                  <form action="#">
                      <div class="form-body">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label class="font-weight-700 font-size-16">University Name</label>
                                    <input type="text" class="form-control" placeholder="Input University Name">
                                  </div>
                              </div>
                              <!--/span-->
                              <div class="col-md-6">
                                  <div class="form-group">
                                     <label class="font-weight-700 font-size-16">Short Name</label>
                                     <input type="text" class="form-control" placeholder="Input short name...">
                                  </div>
                              </div>
                              <!--/span-->
                          </div>
                          <!--/row-->
                          <!--/row-->
                          <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-700 font-size-16">Address</label>
                                    <input type="text" class="form-control" placeholder="input address...">
                                 </div>
                              </div>
                              <!--/span-->
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="font-weight-700 font-size-16">Status</label>
                                      <div class="radio-list">
                                          <label class="radio-inline p-0 mr-10">
                                              <div class="radio radio-info">
                                                  <input type="radio" name="radio" id="radio1" value="option1">
                                                  <label for="radio1">Active</label>
                                              </div>
                                          </label>
                                          <label class="radio-inline">
                                              <div class="radio radio-info">
                                                  <input type="radio" name="radio" id="radio2" value="option2">
                                                  <label for="radio2">Inactive</label>
                                              </div>
                                          </label>
                                      </div>
                                  </div>
                              </div>
                              <!--/span-->
                          </div>
                          <!--/row-->
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label class="font-weight-700 font-size-16">University Description</label>
                                      <textarea class="form-control p-20" rows="4">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</textarea>
                                  </div>
                              </div>
                          </div>
                          <!--/row-->
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="font-weight-700 font-size-16">Meta Title</label>
                                      <input type="text" class="form-control"> </div>
                              </div>
                              <!--/span-->
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="font-weight-700 font-size-16">Meta Keyword</label>
                                      <input type="text" class="form-control"> </div>
                              </div>
                              <!--/span-->
                              <div class="col-md-3">
                                  <h4 class="box-title mt-20">Logo</h4>
                                  <div class="University-img text-left">
                                      <img src="{{ asset('backend/images/avatar2.png')}}" alt="">
                                      <div class="btn btn-info mb-20">
                                          <span>Upload Anonther Image</span>
                                          <input type="file" class="upload">
                                      </div>
                                      <button class="btn btn-danger">Delete</button>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                <h4 class="box-title mt-20">Upload Cover Photo</h4>
                                <div class="University-img text-left">
                                    <img src="{{ asset('backend/images/avatar2.png')}}" alt="">
                                    <div class="btn btn-info mb-20">
                                        <span>Upload Anonther Image</span>
                                        <input type="file" class="upload">
                                    </div>
                                    <button class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                          </div>
                      </div>

                        <div class="box mt-20">
                            <div class="box-header">
                                <h4 class="box-title">Gellary Image</h4>
                                <h6 class="box-subtitle">For multiple file upload put class <code>.dropzone</code> to form.</h6>
                            </div>
                            <div class="box-body">
                                <div action="#" class="dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </div>
                            </div>
                        </div>

                      <div class="form-actions mt-10">
                          <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Save</button>
                          <button type="button" class="btn btn-danger">Cancel</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
        </div>

      </section>

@endsection
