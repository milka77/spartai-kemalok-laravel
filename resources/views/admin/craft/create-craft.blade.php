<x-admin-master>
  @section('content')
    <div class="container">
      <div class="col-8">
        <h1 class="text-center mb-3">Add New Craft Recipe</h1>
        <hr>

        <form action="{{ route('craft.store') }}" method="POST">
          @csrf
          {{-- Name input field --}}
          <div class="mb-3">
            <label class="form-label" for="name">Recipe name: <i class="fa-light fa-asterisk text-danger"></i></label>
            <input class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" type="text" name="name" value="{{ old('name')}}">
            
            {{-- Displaying the error if exists --}}
            <div>
              @error('name')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            {{-- ./Displaying the error if exists --}}
          </div>
          {{-- End of Name input field --}}

          {{-- Profession Select Input --}}
          <div class="mb-3">
            <label for="profession_id">Select a Profession: <i class="fa-light fa-asterisk text-danger"></i></label>
            <select class="form-control {{ $errors->has('profession_id') ? 'is-invalid' : '' }}" name="profession_id">
              <option disabled selected>Please Select a Profession</option>
              @foreach($professions as $prof)
              <option value="{{ $prof->id }}" {{ old('profession_id') == $prof->id ? 'selected' : '' }}>{{ $prof->name }}</option>
              @endforeach
            </select>

            {{-- Displaying the error if exists --}}
            <div>
              @error('profession_id')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            {{-- ./Displaying the error if exists --}}
          </div>
          {{-- End of Profession Select Input --}}

          {{-- Wowhead link input field --}}
          <div class="mb-3">
            <label class="form-label" for="wowhead_link">Wowhead link: <i class="fa-light fa-asterisk text-danger"></i>
              etc: "https://www.wowhead.com/spell=370677/alacritous-alchemist-stone"
            </label>
            <input class="form-control {{$errors->has('wowhead_link') ? 'is-invalid' : ''}}" type="text" name="wowhead_link" value="{{ old('wowhead_link')}}">
            
            {{-- Displaying the error if exists --}}
            <div>
              @error('wowhead_link')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            {{-- ./Displaying the error if exists --}}
          </div>
          {{-- End of Wowhead link input field --}}

          {{-- Quality input field --}}
          <div class="mb-3">
            <label class="form-label" for="quality">Quality: <i class="fa-light fa-asterisk text-danger"></i></label>
            <select class="form-control {{$errors->has('quality') ? 'is-invalid' : ''}}" type="text" name="quality">
              <option disabled selected>Select Quality</option>
              <option value="1" {{ old('quality') == 1 ? 'selected' : '' }}>1 Star</option>
              <option value="2" {{ old('quality') == 2 ? 'selected' : '' }}>2 Star</option>
              <option value="3" {{ old('quality') == 3 ? 'selected' : '' }}>3 Star</option>
              <option value="4" {{ old('quality') == 4 ? 'selected' : '' }}>4 Star</option>
              <option value="5" {{ old('quality') == 5 ? 'selected' : '' }}>5 Star</option>
            </select>
            
            {{-- Displaying the error if exists --}}
            <div>
              @error('quality')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            {{-- ./Displaying the error if exists --}}
          </div>
          {{-- End of Quality input field --}}

          {{-- Comment input field --}}
          <div class="mb-3">
            <label class="form-label" for="comment">Crafter's comment <small>(optional)</small>: </label>
            <input class="form-control {{$errors->has('comment') ? 'is-invalid' : ''}}" type="text" name="comment" value="{{ old('comment')}}">
            
            {{-- Displaying the error if exists --}}
            <div>
              @error('comment')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            {{-- ./Displaying the error if exists --}}
          </div>
          {{-- End of Comment input field --}}

          {{-- Form Buttons --}}
          <div class="d-flex">
            <div class="mx-auto">
              <a href="#" class="btn btn-outline-danger">Cancel</a>
              <input type="submit" value="Add Craft Recipe" class="btn btn-success">
            </div>
          </div>
          {{-- End of Form Buttons --}}
        </form>
      </div>
    </div>
  @endsection
</x-admin-master>