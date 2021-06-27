@extends('layouts.admin')

@section('title','FAQ')

@section('content')
    <section class="section">
          <div class="section-header">
            <h1>FAQ</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">FAQ</a></div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div>
                <a href="#mymodal"
                  data-remote="{{ route('admin.faq.create') }}"
                  data-toggle="modal"
                  data-target="#mymodal"
                  data-title="Create Data" 
                  class="btn btn-primary mb-3">Create</a>
              </div>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr class="bg-success text-white">
                      <td>Title</td>
                      <td>Desc</td>
                      <td>Action</td>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($items as $item)
                      <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->desc }}</td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                              
                            <a href="#mymodal"
                              data-remote="{{ route('admin.faq.edit', $item->id) }}"
                              data-toggle="modal"
                              data-target="#mymodal"
                              data-title="Edit" 
                              class="dropdown-item text-warning">Edit</a>
                            <form action="{{ route('admin.faq.destroy',$item->id) }}" method="post">
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
                {{ $items->links() }}
              </div>
            </div>
          </div>
    </section>
@endsection