@extends('layouts.landingpage')

@section('content')
<style>
  @media screen and (min-width: 900px) {
    .entry-img {
      min-height: 600px;
    }
  }
</style>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{ route('/') }}">Home</a></li>
          <li><a href="{{ route('blog.index') }}">Blog</a></li>
          <li>{{ $items->title }}</li>
        </ol>
        <h2>{{ $items->title }}</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-12 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="{{ Storage::url($items->image) }}" alt="" class="img-fluid" width="auto" style="display: block;
                width: 100vw;
                min-height: 200px;
                height: 100%;
                object-fit: cover;">
              </div>

              <h2 class="entry-title">
                {{ $items->title }}
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> {{ $items->created_at }}</li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                  {!! $items->desc !!}
                </p>

              </div>

              <div class="entry-footer">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li>{{ $items->category }}</li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  @foreach ($items->tags as $tag)
                  <li>{{ $tag->tag->name }}</li>
                  @endforeach
                </ul>
              </div>

            </article><!-- End blog entry -->


          </div><!-- End blog entries list -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->
@endsection