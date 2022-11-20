<x-admin-master>
  @section('content')
    <div class="container">
      <div class="col-8">
        <h1 class="text-center mb-3">Edit Class</h1>
        <hr>

        <form action="{{ route('class.update', $class->id) }}" method="POST">
          @csrf
          @method('PATCH')
          <!-- Name input field -->
          <div class="mb-2">
            <label class="form-label" for="name">Class name: <i class="fa-light fa-asterisk text-danger"></i></label>
            <input class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" type="text" name="name" value="{{ $class->name }}">
            
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
              <a href="{{ route('class.index') }}" class="btn btn-outline-danger">Cancel</a>
              <input type="submit" value="Update Class" class="btn btn-success">
            </div>
          </div>
        </form>
      </div>
    </div>
  @endsection
</x-admin-master>