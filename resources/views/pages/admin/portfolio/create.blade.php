<form action="{{ route('admin.portfolio.store') }}" method="post" enctype="multipart/form-data">
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
    <label for="">Category</label>
    <select name="category" class="form-control" id="" required>
      @foreach ($items as $item)
        <option value="{{ $item->name }}">{{ $item->name }}</option>
      @endforeach
    </select>
    @error('title')
      <div class="text-muted">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="">Image</label>
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" required>
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