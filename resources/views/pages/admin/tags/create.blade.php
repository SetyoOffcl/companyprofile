<form action="{{ route('admin.tags.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
    @error('name')
      <div class="text-muted">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <button class="btn btn-primary">Submit</button>
  </div>
</form>