<x-admin-master>
  @section('content')
    <div class="container">
      <div class="col-8">
        <h1 class="text-center mb-3">Add New Recruitment</h1>
        <hr>

        {{-- Recruitment Form --}}
        <form action="{{ route('recruit.store') }}" method="POST">
        @csrf

        {{-- Playable Class Field --}}
        <div class="mb-2">
          <label class="form-label" for="playable_class_id">Select A Class <i class="fa-light fa-asterisk text-danger"></i></label>
          <select class="form-control {{ $errors->has('playable_class_id') ? 'is-invalid' : '' }}" name="playable_class_id">
            <option value="">Please Select a Class</option>
            @foreach ($classes as $class)
              <option value="{{ $class->id }}">{{ $class->name }}</option>
            @endforeach
          </select>

          {{-- Displaying the error is exists --}}
          <div>
            @error('playable_class_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          {{-- End Of Displaying the error is exists --}}
        </div>
        {{-- End Of Playable Class Field --}}

        {{-- Comments Field --}}
        <div class="mb-2">
          <label class="form-label" for="comment">Enter class spec or any comment: <i class="fa-light fa-asterisk text-danger"></i></label>
          <input class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" type="text" name="comment">

          {{-- Displaying the error is exists --}}
          <div>
            @error('comment')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          {{-- End Of Displaying the error is exists --}}
        </div>
        {{-- End Of Comments Field --}}

        {{-- Is_actice field --}}
        <div class="mb-2 form-group form-check">
          <input class="form-check-input {{ $errors->has('is_active') ? 'is-invalid' : '' }}" type="checkbox" name="is_active">
          <label class="form-check-label" for="is_active">Recruitment status (selected = active)</label>
        
          {{-- Displaying the error is exists --}}
          <div>
            @error('is_active')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          {{-- End Of Displaying the error is exists --}}
        </div>
        {{-- End Of Is_actice field --}}
        
        <div class="d-flex">
          <div class="mx-auto">
            <a class="btn btn-outline-danger" href="{{ route('recruit.adminindex') }}">Cancel</a>
            <button class="btn btn-success" type="submit">Add Recruitment</button>
          </div>
        </div>
        </form>
        {{-- End Of Recruitment Form --}}
      </div>
    </div>
  @endsection
</x-admin-master>