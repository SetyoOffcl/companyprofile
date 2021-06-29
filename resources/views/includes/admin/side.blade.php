<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Admin</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Ad</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li>
                <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                    <i class="far fa-square"></i> 
                    <span>
                        Dashboard
                    </span>
                </a>
              </li>
              <li class="menu-header">Content</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Content</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('admin.title.index') }}">Title</a></li>
                  <li><a class="nav-link" href="{{ route('admin.counts') }}">Counts</a></li>
                  <li><a class="nav-link" href="{{ route('admin.about') }}">About</a></li>
                  <li><a class="nav-link" href="{{ route('admin.service.index') }}">Service</a></li>
                  <li><a class="nav-link" href="{{ route('admin.pricing.index') }}">Pricing</a></li>
                  <li><a class="nav-link" href="{{ route('admin.testimoni.index') }}">Testimoni</a></li>
                  <li><a class="nav-link" href="{{ route('admin.team.index') }}">Team</a></li>
                  <li><a class="nav-link" href="{{ route('admin.client.index') }}">Client</a></li>
                  <li><a class="nav-link" href="{{ route('admin.footer.index') }}">Footer</a></li>
                  <li><a class="nav-link" href="{{ route('admin.faq.index') }}">FAQ</a></li>
                  <li><a class="nav-link" href="{{ route('admin.contact.index') }}">Contact</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Portfolio</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('admin.category.index') }}">Category</a></li>
                  <li><a class="nav-link" href="{{ route('admin.portfolio.index') }}">Image</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Blog</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('admin.blogcategory.index') }}">Category</a></li>
                  <li><a class="nav-link" href="{{ route('admin.tags.index') }}">Tags</a></li>
                  <li><a class="nav-link" href="{{ route('admin.blog.index') }}">Blog</a></li>
                </ul>
              </li>
              <li class="menu-header">Message</li>
              <li>
                <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                    <i class="far fa-square"></i> 
                    <span>
                        Dashboard
                    </span>
                </a>
              </li>
            </ul>
        </aside>
      </div>