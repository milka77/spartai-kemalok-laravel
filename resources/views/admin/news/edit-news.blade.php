<x-admin-master>
  @section('content')
    <div class="container">
      <div class="row">
        <div class="col-10">
          <h1 class="text-center">Hír szerkesztése</h1>
          <hr>

          <form action="{{ route('news.update', $news->id ) }}" method="POST">
            @csrf
            @method('PATCH')
            {{-- News Title --}}
            <div class="mb-2">
              <label class="form-label" for="title">Hír címe: <i class="fa-light fa-asterisk text-danger"></i></label>
              <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" value="{{ $news->title }}">
              
              {{-- Displaying the error of exists --}}
              <div>
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              {{-- End Of Displaying the error of exists --}}
            </div>
            {{-- End Of News Title --}}

            {{-- Select News Category --}}
            <div class="mb-2">
              <label for="category">Válassz hír kategóriát: <i class="fa-light fa-asterisk text-danger"></i></label>
              <select class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category">
                <option disabled selected>Choose a category</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ $news->category->id === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
              </select>

              {{-- Displaying the error of exists --}}
              <div>
                @error('category')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              {{-- End Of Displaying the error of exists --}}
            </div>
            {{-- End Of Select News Category --}}

            {{-- News Body --}}
            <div class="mb-2">
              <label class="form-label" for="body">News body: (ProTip! Sajnos nem minden funcioja mukodik az editornak de az alap funkciok mennek. (pl: Bold Italic stb.))
                <i class="fa-light fa-asterisk text-danger"></i>
              </label>
              
              <textarea id="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="12" name='body'>{{ $news->body }}</textarea>
              
              {{-- Displaying the error of exists --}}
              <div>
                @error('body')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              {{-- End Of Displaying the error of exists --}}
            </div>
            {{-- End Of News Body --}}


            {{-- File path for image --}}
            <div class="mb-2">
              <label class="form-label" for="file_path">Image: <span >(optional but recommended for Guild Progress 'kill shot' )</span></label>
              <input class="form-control {{ $errors->has('file_path') ? 'is-invalid' : '' }}" type="file" name="file_path" value="{{ old('file_path')}}">

              {{-- Displaying the error of exists --}}
              <div>
                @error('file_path')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              {{-- End Of Displaying the error of exists --}}

            </div>
            {{-- End Of File path for image --}}

            {{-- Submit Button --}}
            <div class="mb-2">
              <div class="d-flex">
                <div class="mx-auto">
                  <a href="{{ route('news.index') }}" class="btn btn-outline-danger">Cancel</a>
                  <button class="btn btn-primary" type="submit">Update</button>
                </div>
              </div>
            </div>
            {{-- End Of Submit Button --}}
          </form>
        </div>
      </div>
    </div>
  @endsection

  @section('extra-script')  
  <script>
          CKEDITOR.replace( 'body' );
  </script>
  @endsection
</x-admin-master>