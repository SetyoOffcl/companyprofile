@extends('layouts.admin')

@section('title','Image')

@section('content')
    <section class="section">
          <div class="section-header">
            <h1>Image</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Image</a></div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <form action="{{ route('admin.image.store') }}" method="post" enctype="multipart/form-data">   
                  @csrf
                  <div class="form-group">
                    <label for="">Image</label><br>
                    @if ($items->image)
                    <img src="{{ '/storage/'.$items->image }}" width="200" alt=""><br>
                    @endif
                    <input type="file" name="about_image" class="form-control">
                  </div>         
                  <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
                  </div>    
                </form>
              </div>
            </div>
          </div>
    </section>
@endsection
