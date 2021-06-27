@extends('layouts.landingpage')

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
                <input type="text">
                <button type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div><!-- End sidebar search formn-->

            <h3 class="sidebar-title">Categories</h3>
            <div class="sidebar-item categories">
              <ul>
                <li><a href="#">General <span>(25)</span></a></li>
                <li><a href="#">Lifestyle <span>(12)</span></a></li>
                <li><a href="#">Travel <span>(5)</span></a></li>
                <li><a href="#">Design <span>(22)</span></a></li>
                <li><a href="#">Creative <span>(8)</span></a></li>
                <li><a href="#">Educaion <span>(14)</span></a></li>
              </ul>
            </div><!-- End sidebar categories-->

            <h3 class="sidebar-title">Recent Posts</h3>
            <div class="sidebar-item recent-posts">
              <div class="post-item clearfix">
                <img src="assets/img/blog/blog-recent-1.jpg" alt="">
                <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/blog/blog-recent-2.jpg" alt="">
                <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/blog/blog-recent-3.jpg" alt="">
                <h4><a href="blog-single.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/blog/blog-recent-4.jpg" alt="">
                <h4><a href="blog-single.html">Laborum corporis quo dara net para</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/blog/blog-recent-5.jpg" alt="">
                <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
                <time datetime="2020-01-01">Jan 1, 2020</time>
              </div>

            </div><!-- End sidebar recent posts-->

            <h3 class="sidebar-title">Tags</h3>
            <div class="sidebar-item tags">
              <ul>
                <li><a href="#">App</a></li>
                <li><a href="#" @click="tes('Llewellyn')">IT</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Mac</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Office</a></li>
                <li><a href="#">Creative</a></li>
                <li><a href="#">Studio</a></li>
                <li><a href="#">Smart</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
              </ul>
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
              <a href="blog-single.html">@{{ blog.title }}</a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> @{{ blog.created_at }}</a></li>
              </ul>
            </div>

            <div class="entry-content">
              <p>
                @{{ blog.desc.substring(0,500)+".." }}
              </p>
              <div class="read-more">
                <a href="blog-single.html">Read More</a>
              </div>
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
      this.title = this.$route.query.title ?? '';
      this.kategori = this.$route.query.kategori ?? '';
      this.tags = this.$route.query.tags ?? '';
      this.getData();
    },
    data: {
      blogs: [],
      limit: 4,
      busy: false,
      title: '',
      kategori: '',
      tags: '',
      length: 0,
    },
    methods: {
      search(title, search, category){
        this.getData(id);
        console.log(id);
      },
      getData(title, tags, category) {
        console.log("Adding 10 more data results");
        this.busy = true;
        axios.get("{{ route('api.blog') }}" + "?title=" + (title ?? '') + "&kategori=" + (category ?? '') + "&tags=" + (tags ?? '')).then(response => {
          this.length = response.data.data.items.length;
          if(response.data.data.items.length >= 5){
            const append = response.data.data.items.slice(
              this.blogs.length,
              this.blogs.length + this.limit
            );
            console.log(append);
            this.blogs = this.blogs.concat(append);
            this.busy = false;
          }else{
            this.blogs = response.data.data.items;
          }
        });
      },
    },
    created() {
      if(this.length >= 20){
        this.getData();
      }
    }
  });
</script>
@endpush