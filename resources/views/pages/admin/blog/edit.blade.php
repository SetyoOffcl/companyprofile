@extends('layouts.admin')

@section('title','Blog')

@section('content')
    <section class="section">
          <div class="section-header">
            <h1>Edit</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('admin.blog.index') }}">Blog</a></div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <form action="{{ route('admin.blog.update',$items->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                  <label for="">Title</label>
                  <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $items->title }}" >
                  @error('title')
                    <div class="text-muted">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">category</label>
                  <select name="category" class="js-example-basic-multiple-category" id="">
                    @foreach ($category as $cat)
                    <option value="{{ $cat->name }}" @if($items->category == $cat->name) selected @endif>{{ $cat->name }}</option>
                    @endforeach
                  </select>
                  @error('category')
                    <div class="text-muted">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Tags</label>
                  <select class="js-example-basic-multiple" name="tag[]" multiple="multiple">
                    @foreach ($tags as $index => $tag)
                      <option value="{{ $tag->id }}" @if($items->tags[$index]->tags_id == $cat->id) selected @endif>{{ $tag->name }}</option>
                    @endforeach
                  </select>
                  @error('tag')
                    <div class="text-muted">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Image</label>
                  <br>
                  <img src="{{ Storage::url($items->image) }}" width="200px" alt="">
                  <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" >
                  @error('image')
                    <div class="text-muted">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Desc</label>
                  <textarea name="desc" id="" cols="30" rows="10">{{ $items->desc }}</textarea>
                  @error('image')
                    <div class="text-muted">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <button class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
    </section>
@endsection
@push('after-script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
      $('.js-example-basic-multiple').select2();
      $('.js-example-basic-multiple-category').select2();
  });
  var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
  tinymce.init({
    selector: 'textarea',
    convert_urls: false,
      statusbar: false,  
      type: 'panel',
      menubar: true,
      content_style:
          "@import url('https://fonts.googleapis.com/css2?family=Parisienne&display=swap');",
      font_formats:
      "Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats;",

      plugins: 'print preview importcss searchreplace autolink autosave save directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap  quickbars emoticons',
      mobile: {
          plugins: 'print preview importcss searchreplace autolink autosave save directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount textpattern noneditable help charmap quickbars emoticons'
      },
      menu: {
          tc: {
          title: '',
          items: 'addcomment showcomments deleteallconversations'
          }
      },
      image_class_list: [
          {title: 'fluid', value: 'img-fluid'},
      ],
      file_picker_types: 'image',
      file_picker_callback: function(cb, value, meta) {
          var input = document.createElement('input');
          input.setAttribute('type', 'file');
          input.setAttribute('accept', 'image/*');
          input.onchange = function() {
              var file = this.files[0];

              var reader = new FileReader();
              reader.readAsDataURL(file);
              reader.onload = function () {
                  var id = 'blobid' + (new Date()).getTime();
                  var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                  var base64 = reader.result.split(',')[1];
                  var blobInfo = blobCache.create(id, file, base64);
                  blobCache.add(blobInfo);
                  cb(blobInfo.blobUri(), { title: file.name });
              };
          };
          input.click();
      },
      menubar: 'file edit view insert format tools table tc help',
      toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
      autosave_ask_before_unload: true,
      autosave_interval: '30s',
      autosave_prefix: '{path}{query}-{id}-',
      autosave_restore_when_empty: false,
      autosave_retention: '2m',
      importcss_append: true,
      templates: [
              { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
          { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
          { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
      ],
      template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
      template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
      height: 450,
      image_caption: true,
      quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
      noneditable_noneditable_class: 'mceNonEditable',
      toolbar_mode: 'sliding',
      spellchecker_ignore_list: ['Ephox', 'Moxiecode'],
      _mode: 'embedded',
      content_style: '.mymention{ color: gray; }',
      contextmenu: 'link image imagetools table configur',
      a11y_advanced_options: true,
      skin: useDarkMode ? 'oxide-dark' : 'oxide',
      content_css: useDarkMode ? 'dark' : 'default',
      });

</script>
@endpush