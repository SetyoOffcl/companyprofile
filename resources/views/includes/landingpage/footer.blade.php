@php
$items = \App\Models\Company::select('image','title')->first();
$footer = \App\Models\Company::first();
$contact = \App\Models\Contact::first();
@endphp
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">


    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="{{ route('/') }}" class="logo d-flex align-items-center">
              @if ($items->image ?? 0)
              <img src="{{ Storage::url($items->image) }}" alt="">
              @else
              <img src="{{ asset('assets/img/logo.png') }}" alt="">
              @endif
              <span>{{ $items->title ?? ''}}</span>
            </a>
            <p>{{ $footer->desc ?? 'Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.' }}</p>
            <div class="social-links mt-3">
              <a href="{{ $footer->twitter ?? '#' }}" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="{{ $footer->fb ?? '#' }}" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="{{ $footer->ig ?? '#' }}" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
              <a href="{{ $footer->linkedin ?? '#' }}" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
              @if ($contact->address ?? 0)
                {{ $contact->address ?? '' }}
              @else
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              @endif
              <strong>Phone:</strong> {{ $contact->phone ?? '+1 5589 55488 55' }}<br>
              <strong>Email:</strong> {{ $cintact->email ?? 'info@example.com' }}<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>{{ $items->title ?? '' }}</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->