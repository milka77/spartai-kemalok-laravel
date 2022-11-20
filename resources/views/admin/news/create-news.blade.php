<x-admin-master>
  @section('content')
    <div class="container">
      <div class="row">
        <div class="col-10">
          <h1 class="text-center">Add News</h1>
          <hr>

          <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- News Title --}}
            <div class="mb-2">
              <label class="form-label" for="title">News title: <i class="fa-light fa-asterisk text-danger"></i></label>
              <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" value="{{ old('title')}}">
              
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
              <label for="category">Select News Category: <i class="fa-light fa-asterisk text-danger"></i></label>
              <select class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category">
                <option disabled selected>Choose a category</option>
                @foreach ($categories as $category)
                  <option value="<?= $category->id; ?>"><?= $category->name; ?></option>
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
              <label class="form-label" for="body">News body: (ProTip!, Ha új bekezdést szeretnél a hírben akkor tegyél egy "pontosvesszőt ; " az új bekezdés elé, vagyis a két bekezdés közé, 
                lehet írni folyamatosan is. Pl Bekezdés 1. ; Bekezdés 2.)
                <i class="fa-light fa-asterisk text-danger"></i>
              </label>
              
              <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="8" name='body'></textarea>
              
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
                  <button class="btn btn-primary" type="submit">Add News</button>
                </div>
              </div>
            </div>
            {{-- End Of Submit Button --}}
          </form>
        </div>
      </div>
    </div>
  @endsection
</x-admin-master>