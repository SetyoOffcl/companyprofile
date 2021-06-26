@extends('layouts.admin')

@section('title','About')

@section('content')
    <section class="section">
          <div class="section-header">
            <h1>About</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">About</a></div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <form action="{{ route('admin.about.store') }}" method="post" enctype="multipart/form-data">   
                  @csrf
                  <div class="form-group">
                    <label for="">About Image</label><br>
                    @if ($items->about_image)
                    <img src="{{ '/storage/'.$items->about_image }}" alt="" width="200px"><br>
                    @endif
                    <input type="file" name="about_image" class="form-control">
                  </div>             
                  <div class="form-group">
                    <label for="">About</label>
                    <textarea name="about" id="" cols="30" rows="10">{{ $items->about ?? '' }}</textarea>
                  </div>         
                  <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
                  </div>    
                </form>
              </div>
            </div>
          </div>
    </section>
@endsection

@push('after-script')
<script>
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