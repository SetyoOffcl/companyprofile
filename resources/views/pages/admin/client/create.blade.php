<form action="{{ route('admin.client.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="">Image</label>
    <input type="file" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" required>
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