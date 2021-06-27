<form action="{{ route('admin.blogcategory.update',$items->id) }}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="form-group">
    <label for="">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $items->name }}" required>
    @error('name')
      <div class="text-muted">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <button class="btn btn-primary">Edit</button>
  </div>
</form>