<form action="{{ route('admin.testimoni.update',$items->id) }}" method="post" enctype="multipart/form-data">
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
    <label for="">Job</label>
    <input type="text" name="job" class="form-control @error('job') is-invalid @enderror" value="{{ $items->job }}" required>
    @error('job')
      <div class="text-muted">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="">Desc</label>
    <textarea name="desc" class="form-control" style="min-height: 100px" id="" cols="30" rows="10">{{ $items->desc }}</textarea>
    @error('desc')
      <div class="text-muted">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="">Image</label><br>
    <img src="{{ Storage::url($items->image) }}" width="200px;" alt="">
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