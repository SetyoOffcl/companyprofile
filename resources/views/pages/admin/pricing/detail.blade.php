@extends('layouts.admin')

@section('title','Details Pricing')

@section('content')
    <section class="section">
          <div class="section-header">
            <h1>Details Pricing</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Details Pricing</a></div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <form action="{{ route('admin.detailpricing.store',$items->id) }}" method="post">
                  @csrf
                  <div class="form-row">
                    <div class="col-lg-6">
                      <label for="">Nmae</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                      @error('name')
                        <div class="text-muted">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col-lg-6">
                      <label>Default</label>
                      <select name="is_default" class="form-control" id="" required>
                        <option value="0" @if(old('is_default') == 0) selected @endif>0</option>
                        <option value="1" @if(old('is_default') == 1) selected @endif>1</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-12 mt-3">
                      <button class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr class="bg-success text-white">
                      <td>Name</td>
                      <td>Is Default</td>
                      <td>Action</td>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($items->detail as $item)
                      <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->is_default }}</td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <form action="{{ route('admin.detailpricing.destroy',$item->id) }}" method="post">
                              @csrf
                              @method('delete')
                              <button class="dropdown-item text-danger" >Delete</button>
                            </form>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="4" class="text-center">Data Tidak Ditemukan</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </section>
@endsection