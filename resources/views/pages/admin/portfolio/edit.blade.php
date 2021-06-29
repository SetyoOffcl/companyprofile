<form action="{{ route('admin.portfolio.update',$items->id) }}" method="post" enctype="multipart/form-data">
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
    <label for="">Category</label>
    <select name="category" class="form-control" id="" >
      @foreach ($category as $cat)
        <option value="{{ $cat->name }}" @if($items->category == $cat->name) selected @endif>{{ $cat->name }}</option>
      @endforeach
    </select>
    @error('title')
      <div class="text-muted">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="">Image</label><br>
    <img src="{{ Storage::url($items->image) }}" width="200px" alt="">
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ $items->image }}" >
    @error('image')
      <div class="text-muted">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="">Desc</label>
    <textarea name="desc" id="" cols="30" rows="10" class="form-control" style="min-height: 100px">{{ $items->desc }}</textarea>
    @error('desc')
      <div class="text-muted">
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <button class="btn btn-primary">Edit</button>
  </div>
</form>