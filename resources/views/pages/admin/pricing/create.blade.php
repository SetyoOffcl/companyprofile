@extends('layouts.admin')

@section('title','Pricing')

@section('content')
    <section class="section">
          <div class="section-header">
            <h1>Create</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('admin.pricing.index') }}">Pricing</a></div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <form action="{{ route('admin.pricing.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="">Title</label>
                  <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                  @error('title')
                    <div class="text-muted">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Price</label>
                  <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required>
                  @error('price')
                    <div class="text-muted">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Image</label>
                  <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" required>
                  @error('image')
                    <div class="text-muted">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Default</label>
                  <select name="is_default" class="form-control" id="" required>
                    <option value="0" @if(old('is_default') == 0) selected @endif>0</option>
                    <option value="1" @if(old('is_default') == 1) selected @endif>1</option>
                  </select>
                  @error('title')
                    <div class="text-muted">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <button class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
    </section>
@endsection