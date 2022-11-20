<x-admin-master>
  @section('content')
    <div class="container">
      <div class="col-8">
        <h1 class="text-center mb-3">Add New Role</h1>
        <hr>

        <form action="{{ route('roles.store') }}" method="POST">
          @csrf
          <!-- Name input field -->
          <div class="mb-2">
            <label class="form-label" for="name">Role name: <i class="fa-light fa-asterisk text-danger"></i></label>
            <input class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" type="text" name="name" value="{{ old('name')}}">
            
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
              <input type="submit" value="Add Role" class="btn btn-success">
            </div>
          </div>
        </form>
      </div>
    </div>
  @endsection
</x-admin-master>