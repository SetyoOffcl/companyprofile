@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="card ">
                <div class="card-wrap">
                  <div class="card-body">
                    Blog 
                    <div class="float-right">
                      {{ $items['blog'] ?? 0 }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="card ">
                <div class="card-wrap">
                  <div class="card-body">
                    Message
                    <div class="float-right">
                      {{ $items['feedback'] ?? 0}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card h-100">
            <h1 class="text-center">Halo Admin</h1>
          </div>
        </section>
@endsection