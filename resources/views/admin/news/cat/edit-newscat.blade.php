<x-admin-master>
  @section('content')
    <div class="container">
      <div class="col-8">
        <h1 class="text-center mb-3">Edit Category</h1>
        <hr>

        <form action="{{ route('newscat.update', $category->id) }}" method="POST">
          @csrf
          @method('PATCH')
          <!-- Name input field -->
          <div class="mb-2">
            <label class="form-label" for="name">News Category name: <i class="fa-light fa-asterisk text-danger"></i></label>
            <input class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" type="text" name="name" value="{{ $category->name }}">
            
            <!-- Displaying the error if exists -->  
            <div>
              @error('name')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <!-- ./Displaying the error if exists -->  
          </div>
          <!-- ./Name input field -->

          <div class="d-flex">
            <div class="mx-auto">
              <a href="#" class="btn btn-outline-danger">Cancel</a>
              <input type="submit" value="Update Category" class="btn btn-success">
            </div>
          </div>
        </form>
      </div>
    </div>
  @endsection
</x-admin-master>