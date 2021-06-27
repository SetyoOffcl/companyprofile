@extends('layouts.admin')

@section('title','Contact')

@section('content')
    <section class="section">
          <div class="section-header">
            <h1>Contact</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Contact</a></div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <form action="{{ route('admin.contact.store') }}" method="post">
                  @csrf
                  <div class="form-row">
                    <div class="col-12">
                      <label for="">Address</label>
                      <textarea name="address" class="form-control" style="min-height: 100px;" id="" cols="30" rows="10">{{ $items->address ?? '' }}</textarea>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-12">
                      <label for="">Phone</label>
                      <textarea name="phone" class="form-control" style="min-height: 100px;" id="" cols="30" rows="10">{{ $items->phone ?? '' }}</textarea>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-12">
                      <label for="">Email</label>
                      <textarea name="email" class="form-control" style="min-height: 100px;" id="" cols="30" rows="10">{{ $items->email ?? '' }}</textarea>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-12">
                      <label for="">Open</label>
                      <textarea name="open" class="form-control" style="min-height: 100px;" id="" cols="30" rows="10">{{ $items->open ?? '' }}</textarea>
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