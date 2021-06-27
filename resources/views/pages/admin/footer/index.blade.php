@extends('layouts.admin')

@section('title','Footer')

@section('content')
    <section class="section">
          <div class="section-header">
            <h1>Footer</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Footer</a></div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <form action="{{ route('admin.footer.store') }}" method="post">
                  @csrf
                  <div class="form-row">
                    <div class="col-12">
                      <label for="">Desc</label>
                      <textarea name="desc" class="form-control" style="min-height: 200px;" id="" cols="30" rows="10">{{ $items->desc ?? '' }}</textarea>
                    </div>
                  </div>
                  <div class="form-row mt-2">
                    <div class="col-lg-6">
                      <label for="">Twitter</label>
                      <input type="text" name="twitter" value="{{ $items->twitter ?? '' }}" class="form-control">
                    </div>
                    <div class="col-lg-6">
                      <label for="">Facebook</label>
                      <input type="text" name="fb" value="{{ $items->fb ?? '' }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-row mt-2">
                    <div class="col-lg-6">
                      <label for="">Instagram</label>
                      <input type="text" name="ig" value="{{ $items->ig ?? '' }}" class="form-control">
                    </div>
                    <div class="col-lg-6">
                      <label for="">Linkedin</label>
                      <input type="text" name="linkedin" value="{{ $items->linkedin ?? '' }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-row mt-2">
                    <div class="col-12">
                      <button class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
    </section>
@endsection