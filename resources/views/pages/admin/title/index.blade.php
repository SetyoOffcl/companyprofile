@extends('layouts.admin')

@section('title','Title')

@section('content')
    <section class="section">
          <div class="section-header">
            <h1>Title</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Title</a></div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <form action="{{ route('admin.title.store') }}" method="post">
                  @csrf
                  <div class="form-row">
                    <div class="col-12">
                      <h6 class="text-uppercase">Title Landingpage</h6>
                    </div>
                    <div class="col-lg-6">
                      <label for="">Title</label>
                      <input type="text" name="title" value="{{ $items->title ?? '' }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-row mt-2">
                    <div class="col-12">
                      <h6 class="text-uppercase">About Title</h6>
                    </div>
                    <div class="col-lg-6">
                      <label for="">About Title</label>
                      <input type="text" name="home_title" value="{{ $items->about ?? '' }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-row mt-2">
                    <div class="col-12">
                      <h6 class="text-uppercase">Hero Title</h6>
                    </div>
                    <div class="col-lg-6">
                      <label for="">Hero Title</label>
                      <input type="text" name="home_title" value="{{ $items->home_title ?? '' }}" class="form-control">
                    </div>
                    <div class="col-lg-6">
                      <label for="">Hero Description</label>
                      <input type="text" name="home_desc" value="{{ $items->home_desc ?? '' }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-row mt-2">
                    <div class="col-12">
                      <h6 class="text-uppercase">Service Title</h6>
                    </div>
                    <div class="col-lg-6">
                      <label for="">Service Title</label>
                      <input type="text" name="service_title" value="{{ $items->service_title ?? '' }}" class="form-control">
                    </div>
                    <div class="col-lg-6">
                      <label for="">Service Description</label>
                      <input type="text" name="service_desc" value="{{ $items->service_desc ?? '' }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-row mt-2">
                    <div class="col-12">
                      <h6 class="text-uppercase">Pricing Title</h6>
                    </div>
                    <div class="col-lg-6">
                      <label for="">Pricing Title</label>
                      <input type="text" name="pricing_title" value="{{ $items->pricing_title ?? '' }}" class="form-control">
                    </div>
                    <div class="col-lg-6">
                      <label for="">Pricing Description</label>
                      <input type="text" name="pricing_desc" value="{{ $items->pricing_desc ?? '' }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-row mt-2">
                    <div class="col-12">
                      <h6 class="text-uppercase">Portfolio Title</h6>
                    </div>
                    <div class="col-lg-6">
                      <label for="">Portfolio Title</label>
                      <input type="text" name="portfolio_title" value="{{ $items->portfolio_title ?? '' }}" class="form-control">
                    </div>
                    <div class="col-lg-6">
                      <label for="">Portfolio Description</label>
                      <input type="text" name="portfolio_desc" value="{{ $items->portfolio_desc ?? '' }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-row mt-2">
                    <div class="col-12">
                      <h6 class="text-uppercase">Testimonial Title</h6>
                    </div>
                    <div class="col-lg-6">
                      <label for="">Testimonial Title</label>
                      <input type="text" name="testimonial_title" value="{{ $items->testimonial_title ?? '' }}" class="form-control">
                    </div>
                    <div class="col-lg-6">
                      <label for="">Testimonial Description</label>
                      <input type="text" name="testimonial_desc" value="{{ $items->testimonial_desc ?? '' }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-row mt-2">
                    <div class="col-12">
                      <h6 class="text-uppercase">Team Title</h6>
                    </div>
                    <div class="col-lg-6">
                      <label for="">Team Title</label>
                      <input type="text" name="team_title" value="{{ $items->team_title ?? '' }}" class="form-control">
                    </div>
                    <div class="col-lg-6">
                      <label for="">Team Description</label>
                      <input type="text" name="team_desc" value="{{ $items->team_desc ?? '' }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-row mt-2">
                    <div class="col-12">
                      <h6 class="text-uppercase">Client Title</h6>
                    </div>
                    <div class="col-lg-6">
                      <label for="">Client Title</label>
                      <input type="text" name="client_title" value="{{ $items->client_title ?? '' }}" class="form-control">
                    </div>
                    <div class="col-lg-6">
                      <label for="">Client Description</label>
                      <input type="text" name="client_desc" value="{{ $items->client_desc ?? '' }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-row mt-2">
                    <div class="col-12">
                      <h6 class="text-uppercase">Blog Title</h6>
                    </div>
                    <div class="col-lg-6">
                      <label for="">Blog Title</label>
                      <input type="text" name="blog_title" value="{{ $items->blog_title ?? '' }}" class="form-control">
                    </div>
                    <div class="col-lg-6">
                      <label for="">Blog Description</label>
                      <input type="text" name="blog_desc" value="{{ $items->blog_desc ?? '' }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-row mt-2">
                    <div class="col-12">
                      <h6 class="text-uppercase">faq Title</h6>
                    </div>
                    <div class="col-lg-6">
                      <label for="">faq Title</label>
                      <input type="text" name="faq_title" value="{{ $items->faq_title ?? '' }}" class="form-control">
                    </div>
                    <div class="col-lg-6">
                      <label for="">faq Description</label>
                      <input type="text" name="faq_desc" value="{{ $items->faq_desc ?? '' }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-row mt-2">
                    <div class="col-12">
                      <h6 class="text-uppercase">Contact Title</h6>
                    </div>
                    <div class="col-lg-6">
                      <label for="">Contact Title</label>
                      <input type="text" name="contact_title" value="{{ $items->contact_title ?? '' }}" class="form-control">
                    </div>
                    <div class="col-lg-6">
                      <label for="">Contact Description</label>
                      <input type="text" name="contact_desc" value="{{ $items->contact_desc ?? '' }}" class="form-control">
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