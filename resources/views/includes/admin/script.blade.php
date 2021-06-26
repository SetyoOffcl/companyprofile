<!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  {{-- <script src="{{ asset('admin/js/stisla.js') }}"></script> --}}

  <!-- JS Libraies -->
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  {{-- <script src="../node_modules/jquery-sparkline/jquery.sparkline.min.js"></script> --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script> --}}
  {{-- <script src="../node_modules/chart.js/dist/Chart.min.js"></script>--}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> --}}

  {{-- <script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  {{-- <script src="../node_modules/summernote/dist/summernote-bs4.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}
  {{-- <script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script> --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/chocolat/1.0.4/js/chocolat.cjs.js"></script> --}}
  <!-- Template JS File -->
  <script src="{{ asset('admin/js/scripts.js') }}"></script>
  <script src="{{ asset('admin/js/custom.js') }}"></script>

  <!-- Page Specific JS File -->
  {{-- <script src="{{ asset('admin/js/page/index.js') }}"></script> --}}
  
<script>
  $(window).on('load', function(){ 
    $('#loading').hide();
  });
</script>

{{-- modal --}}
<script>
    jQuery(document).ready(function($){
        $('#mymodal').on('show.bs.modal', function(e){
            var button = $(e.relatedTarget); //mengambil data yang sudah di lempar di file show
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote")); //data yang di ambil akan di tampilkan di class modal body
            modal.find('.modal-title').html(button.data("title")); //modal titel untuk menampilkan nama titel yang sudah di berikan di halaman index tadi
        });
    });
</script>
<div class="modal" id="mymodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
              <h5 class="modal-title"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i> <!-- jika data kosong maka akan menampilkan spinner -->
            </div>
        </div>
    </div>
</div>