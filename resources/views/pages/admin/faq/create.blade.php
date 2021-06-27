<form action="{{ route('admin.faq.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="">Title</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
    @error('title')
      <div class="text-muted">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="">Desc</label>
    <textarea name="desc" class="form-control" style="min-height: 100px;" id="" cols="30" rows="10"></textarea>
    @error('desc')
      <div class="text-muted">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <button class="btn btn-primary">Submit</button>
  </div>
</form>