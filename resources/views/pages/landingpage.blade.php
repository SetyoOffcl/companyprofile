@extends('layouts.landingpage')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center">
        <h1 data-aos="fade-up">{{ $items->home_title ?? 'We offer modern solutions for growing your business' }}</h1>
        <h2 data-aos="fade-up" data-aos-delay="400">{{ $items->home_desc ?? 'We are team of talented designers making websites with Bootstrap' }}</h2>
        <div data-aos="fade-up" data-aos-delay="600">
          <div class="text-center text-lg-start">
            <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
              <span>Get Started</span>
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
        @if ($items->home_image ?? 0)
        <img src="{{ Storage::url($items->home_image) }}" class="img-fluid" alt="">
        @else
        <img src="{{ asset('assets/img/hero-img.png') }}" class="img-fluid" alt="">
        @endif
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">
  <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <div class="container" data-aos="fade-up">
      <div class="row gx-0">

        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="content">
            <h2>{{ $items->about_title ?? 'Expedita voluptas omnis cupiditate totam eveniet nobis sint iste. Dolores est repellat corrupti reprehenderit.' }}</h2>
            <p>
              {{ $items->about_desc ?? 'Quisquam vel ut sint cum eos hic dolores aperiam. Sed deserunt et. Inventore et et dolor consequatur itaque ut voluptate sed et. Magnam nam ipsum tenetur suscipit voluptatum nam et est corrupti.' }}
            </p>
          </div>
        </div>

        <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
          @if ($items->about_image ?? 0)
          <img src="{{ Storage::url($items->about_image) }}" class="img-fluid" alt="">
          @else
          <img src="{{ asset('assets/img/about.jpg') }}" class="img-fluid" alt="">            
          @endif
        </div>

      </div>
    </div>

  </section><!-- End About Section -->

  <!-- ======= Values Section ======= -->
  <section id="services" class="values">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>{{ $items->service_title ?? 'Service' }}</h2>
        <p>{{ $items->service_desc ?? 'Service' }}</p>
      </header>

      <div class="row">

        @forelse ($service as $s)
        <div class="col-lg-4">
          <div class="box" data-aos="fade-up" data-aos-delay="200">
            <img src="{{ Storage::url($s->image) }}" class="img-fluid" alt="">
            <h3>{{ $s->title }}</h3>
            <p>{{ $s->desc }}</p>
          </div>
        </div>
        @empty
        @endforelse

      </div>

    </div>

  </section><!-- End Values Section -->

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4">

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-emoji-smile"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="{{ $items->client ?? 99 }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Happy Clients</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="{{ $items->project ?? 99 }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Projects</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-headset" style="color: #15be56;"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="{{ $items->support ?? 99 }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <i class="bi bi-people" style="color: #bb0852;"></i>
            <div>
              <span data-purecounter-start="0" data-purecounter-end="{{ $items->employee ?? 99 }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hard Workers</p>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

  <!-- ======= Pricing Section ======= -->
  <section id="pricing" class="pricing">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>{{ $items->pricing_title ?? 'PRICING'}}</h2>
        <p>{{ $items->pricing_desc ?? 'Check our Pricing' }}</p>
      </header>

      <div class="row gy-4" data-aos="fade-left">

        @forelse ($pricing as $p)
        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
          <div class="box">
            @if ($p->is_default)
            <span class="featured">Featured</span>
            @endif
            <h3 style="color: #07d5c0;">{{ $p->title }}</h3>
            <div class="price"><sup>$</sup>{{ $p->price }}<span> / mo</span></div>
            <img src="{{ Storage::url($items->image) }}" class="img-fluid" alt="">
            <ul>
              @foreach ($p->detail as $pd)
                <li class="@if($pd->is_default == 0) na @endif">{{ $pd->name }}</li>
              @endforeach
            </ul>
            {{-- <a href="#" class="btn-buy">Buy Now</a> --}}
          </div>
        </div>
        @empty
        @endforelse

      </div>

    </div>

  </section><!-- End Pricing Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>{{ $items->portfolio_title ?? 'PORTFOLIO' }}</h2>
        <p>{{ $items->portfolio_desc ?? 'Check our latest work' }}</p>
      </header>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            
            <li data-filter="*" class="filter-active">All</li>
            @forelse ($category as $cat)
            <li data-filter=".{{ $cat->name }}">{{ $cat->name }}</li>
            @empty
              
            @endforelse
          </ul>
        </div>
      </div>

      <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

        @forelse ($portfolio as $pp)
          
        <div class="col-lg-4 col-md-6 portfolio-item {{ $pp->category }}">
          <div class="portfolio-wrap">
            <img src="{{ Storage::url($pp->image) }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{ $pp->category }}</h4>
              <p>{{ $pp->desc }}</p>
              <div class="portfolio-links">
                <a href="{{ Storage::url($pp->image) }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{ $pp->category }}"><i class="bi bi-plus"></i></a>
                <a href="{{ route('portfolio.show',$pp->id) }}" title="More Details"><i class="bi bi-link"></i></a>
              </div>
            </div>
          </div>
        </div>
        @empty
          
        @endforelse

      </div>

    </div>

  </section><!-- End Portfolio Section -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>{{ $items->testimonial_title ?? 'Testimonials' }}</h2>
        <p>{{ $items_testimonial_desc ?? 'What they are saying about us' }}</p>
      </header>

      <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="200">
        <div class="swiper-wrapper">

          @forelse ($testimoni as $ts)
            
          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                {{ $ts->desc }}
              </p>
              <div class="profile mt-auto">
                <img src="{{ Storage::url($ts->image) }}" class="testimonial-img" alt="">
                <h3>{{ $ts->name }}</h3>
                <h4>{{ $ts->job }}</h4>
              </div>
            </div>
          </div><!-- End testimonial item -->
          @empty
            
          @endforelse

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>

  </section><!-- End Testimonials Section -->

  <!-- ======= Team Section ======= -->
  <section id="team" class="team">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>{{ $items->team_title ?? 'Team' }}</h2>
        <p>{{ $items->team_desc ?? 'Our hard working team' }}</p>
      </header>

      <div class="row gy-4">

        @forelse ($team as $tm)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="member">
            <div class="member-img">
              <img src="{{ Storage::url($tm->image) }}" class="img-fluid" alt="">
            </div>
            <div class="member-info">
              <h4>{{ $tm->name }}</h4>
              <span>{{ $tb->job }}</span>
              <p>{{ $tm->desc }}</p>
            </div>
          </div>
        </div>
        @empty
          
        @endforelse

      </div>

    </div>

  </section><!-- End Team Section -->

  <!-- ======= Clients Section ======= -->
  <section id="clients" class="clients">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>{{ $items->client_title ?? 'Our Clients' }}</h2>
        <p>{{ $items->client_desc ?? 'Temporibus omnis officia' }}</p>
      </header>

      <div class="clients-slider swiper-container">
        <div class="swiper-wrapper align-items-center">
          @forelse ($client as $cl)
          <div class="swiper-slide"><img src="{{ Storage::url($cl->image) }}" class="img-fluid" alt=""></div>
          @empty
            
          @endforelse
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>

  </section><!-- End Clients Section -->

  <!-- ======= Recent Blog Posts Section ======= -->
  <section id="recent-blog-posts" class="recent-blog-posts">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>{{ $items->blog_title ?? 'Blog' }}</h2>
        <p>{{ $items->blog_desc ?? 'Recent posts form our Blog' }}</p>
      </header>

      <div class="row">

        @forelse ($blog as $b)
        <div class="col-lg-4">
          <div class="post-box">
            <div class="post-img"><img src="{{ Storage::url($b->image) }}" class="img-fluid" alt=""></div>
            <span class="post-date">{{ Str::limit($b->title, 20, '...') }}</span>
            <h3 class="post-title">{!! Str::limit($b->desc, 100, '...') !!}</h3>
            <a href="{{ route('blog.show',$b->slug) }}" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
        @empty
          
        @endforelse

      </div>

    </div>

  </section><!-- End Recent Blog Posts Section -->

  
  <!-- ======= F.A.Q Section ======= -->
  <section id="faq" class="faq">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>{{ $items->faq_title ?? 'F.A.Q' }}</h2>
        <p>{{ $items->faq_desc ?? 'Frequently Asked Questions' }}</p>
      </header>

      <div class="row">
        <div class="col-12">
          <!-- F.A.Q List 1-->
          <div class="accordion accordion-flush" id="faqlist1">
            @forelse ($faq as $fq)
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $fq->id }}">
                  {{ $fq->title }}
                </button>
              </h2>
              <div id="{{ $fq->id }}" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                  {{ $fq->desc }}
                </div>
              </div>
            </div>
            @empty
              
            @endforelse
          </div>
        </div>

      </div>

    </div>

  </section><!-- End F.A.Q Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>{{ $items->contact_title ?? 'Contact' }}</h2>
        <p>{{ $items->contact_desc ?? 'Contact Us' }}</p>
      </header>

      <div class="row gy-4">

        <div class="col-lg-6">

          <div class="row gy-4">
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-geo-alt"></i>
                <h3>Address</h3>
                <p>{!! $contact->address ?? 'A108 Adam Street,<br>New York, NY 535022' !!}</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-telephone"></i>
                <h3>Call Us</h3>
                <p>{!! $contact->phone ?? '+1 5589 55488 55<br>+1 6678 254445 41' !!}</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-envelope"></i>
                <h3>Email Us</h3>
                <p>{!! $contact->email ?? 'info@example.com<br>contact@example.com' !!}</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box">
                <i class="bi bi-clock"></i>
                <h3>Open Hours</h3>
                <p>{!! $contact->open ?? 'Monday - Friday<br>9:00AM - 05:00PM' !!}</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6">
          <form action="" method="post" class="php-email-form">
            <div class="row gy-4">

              <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
              </div>

              <div class="col-md-6 ">
                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
              </div>

              <div class="col-md-12">
                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
              </div>

              <div class="col-md-12">
                <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
              </div>

              <div class="col-md-12 text-center">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>

                <button type="submit">Send Message</button>
              </div>

            </div>
          </form>

        </div>

      </div>

    </div>

  </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection