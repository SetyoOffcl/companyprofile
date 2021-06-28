@extends('layouts.landingpage')

@push('after-style')
  <style>
    .loading{
      font-weight: bold !important;
      font-size: 76px;
      text-transform: uppercase;
      /* background-color: red; */
    }
  </style>
@endpush

@section('content')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="index.html">Home</a></li>
        <li>Blog</li>
      </ol>
      <h2>Blog</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-4">

          <div class="sidebar">

            <h3 class="sidebar-title">Search</h3>
            <div class="sidebar-item search-form">
              <form action="">
                <input type="text" v-model="title">
                <button type="button" @click="search(title , category, tags)">
                  <i class="bi bi-search"></i>
                </button>
              </form>
            </div><!-- End sidebar search formn-->

            <h3 class="sidebar-title">Categories</h3>
            <div class="sidebar-item categories">
              <ul>
                @foreach ($category as $cat)
                <li>
                  <a href="#" @click="search(title , '{{ $cat->category }}', tags)">
                    {{ $cat->category }} <span>({{ $cat->total }})</span>
                  </a>
                </li>
                @endforeach
              </ul>
            </div><!-- End sidebar categories-->

            <h3 class="sidebar-title">Recent Posts</h3>
            <div class="sidebar-item recent-posts">
              @foreach ($limit as $i)
              <div class="post-item clearfix">
                <img src="{{ Storage::url($i->image) }}" alt="">
                <h4><a href="{{ route('blog.show',$i->slug) }}">{{ Str::limit($i->title, 20, '...') }}</a></h4>
                <time datetime="2020-01-01">{{ $i->created_at }}</time>
              </div>
              @endforeach

            </div><!-- End sidebar recent posts-->

            <h3 class="sidebar-title">Tags</h3>
            <div class="sidebar-item tags">
              <ul>
                @foreach ($tags as $tag)
                <li>
                    <a href="#" @click="search(title , category , '{{ $tag->name }}')">
                      {{ $tag->name }}
                    </a>
                  </li>
                @endforeach
              </ul>
            </div><!-- End sidebar tags-->
            <h3 class="sidebar-title">Tags</h3>
            <div class="sidebar-item tags">
              <button type="button" class="btn btn-primary" @click="reset()">reset</button>
            </div><!-- End sidebar tags-->

          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->
        <div class="col-lg-8 entries" 
          v-infinite-scroll="getData" 
          infinite-scroll-disabled="busy" 
          spinner="spiral"
          ref="getData"
          infinite-scroll-distance="limit">

          <article class="entry" v-for="(blog, index) in blogs" :key="index">

            <div class="entry-img">
              <img :src="'/storage/'+ blog.image" alt="" class="img-fluid">
            </div>

            <h2 class="entry-title">
              <a href="javascript:void(0)" @click="link(blog.slug)">@{{ blog.title }}</a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> @{{ blog.created_at }}</a></li>
              </ul>
            </div>

            <div class="entry-content">
              <p v-html="blog.desc.substring(0,500)+'..'">
                @{{ blog.desc }}
              </p>
              <div class="read-more">
                <a href="javascript:void(0)" @click="link(blog.slug)">Read More</a>
              </div>
            </div>
            <br>
            <div class="entry-footer">
              <i class="bi bi-folder"></i>
              <ul class="cats">
                <li><a href="#">@{{ blog.category }}</a></li>
              </ul>

              <i class="bi bi-tags"></i>
              <ul class="tags" >
                <li v-for="tag in blog.tags" :key="tag.id"><a href="#">@{{ tag.tag.name }}</a></li>
              </ul>
            </div>
          </article><!-- End blog entry -->
        </div><!-- End blog entries list -->

      </div>

    </div>
  </section><!-- End Blog Section -->

</main><!-- End #main -->
@endsection

@push('after-script')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
<script src='https://unpkg.com/vue-infinite-scroll@2.0.2/vue-infinite-scroll.js'></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/vue-router"></script>
<script>
   var router = new VueRouter({
    mode: 'history',
    routes: []
  });
  var locations = new Vue({
    router,
    el: "#blog",
    mounted() {
      AOS.init();
      this.getData();
    },
    data: {
      blogs: [],
      limit: 4,
      busy: false,
      title: "",
      category: "",
      tags: "",
      length: 0,
      reload: 0,
    },
    methods: {
      search(title, category, tags){
        console.log(title, category, tags);
        this.title = title,
        this.category = category,
        this.tags = tags,
        this.reload = 1,
        this.getData();
      },
      reset(){
        this.title = '',
        this.category = '',
        this.tags = '',
        this.reload = 1,
        this.getData();
      },
      getData(title, category, tags) {
        console.log("Adding 10 more data results");
        this.busy = true;
        if(this.reload == 1){
          this.blogs = [];
          this.reload = 0;
        }
        axios.get("{{ route('api.blog') }}" + "?title=" + this.title + "&category=" + this.category + "&tags=" + this.tags).then(response => {
          console.log(response);
          this.length = response.data.data.items.length;
            if(response.data.data.items.length >= 5){
              const append = response.data.data.items.slice(
                this.blogs.length,
                this.blogs.length + this.limit
              );
              this.blogs = this.blogs.concat(append);
              this.busy = false;
            }else{
              this.blogs = response.data.data.items;
            }
        });
      },
      link(link){
        window.location.href = "{{ url('blog') }}/" + link;
      }
    },
    created() {
      if(this.length >= 5){
        this.getData();
      }
    }
  });
</script>
@endpush