@extends('layouts.admin')

@section('title','Service')

@section('content')
    <section class="section">
          <div class="section-header">
            <h1>Edit</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('admin.service.index') }}">Service</a></div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <form action="{{ route('admin.service.update',$items->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                  <label for="">Title</label>
                  <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $items->title }}" required>
                  @error('title')
                    <div class="text-muted">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Image</label>
                  <br>
                  <img src="{{ Storage::url($items->image) }}" alt="" width="200px">
                  <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ $items->image }}">
                  @error('image')
                    <div class="text-muted">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Desc</label>
                  <textarea  class="form-control @error('desc') is-invalid @enderror" style="min-height: 200px;" name="desc" id="" cols="30" rows="10" required>{{ $items->desc }}</textarea>
                  @error('desc')
                    <div class="text-muted">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <button class="btn btn-primary">Edit</button>
                </div>
              </form>
            </div>
          </div>
    </section>
@endsection