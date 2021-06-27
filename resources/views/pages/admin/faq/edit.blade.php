<form action="{{ route('admin.faq.update',$items->id) }}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="form-group">
    <label for="">Name</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $items->title }}" required>
    @error('title')
      <div class="text-muted">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="">Desc</label>
    <textarea name="desc" class="form-control" style="min-height: 100px;" id="" cols="30" rows="10">{{ $items->desc }}</textarea>
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