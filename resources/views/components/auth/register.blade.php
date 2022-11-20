<x-home-master>
  @section('content')
  <div class="flex justify-center">
    <div class="w-4/12 bg-zinc-800 text-white p-6 rounded-lg">
      <h1 class="text-center text-2xl mb-6">Register</h1>
      
      {{-- User register form --}}
      <form action="{{ route('user.register') }}" method="POST">
        @csrf
        {{-- Name input field --}}
        <div class="mb-4">
          <label for="name" class="sr-only">Name</label>
          <input type="text" name="name" id="name" placeholder="Your name" value="{{ old('name') }}"
            class="bg-zinc-800 border border-zinc-400 w-full p-4 rounded-lg @error('name') border-red-500 @enderror">
        
          @error('name')
          <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
          </div>
          @enderror
        </div>
        {{-- End Of Name input field --}}
        
        {{-- Nickname input field --}}
        <div class="mb-4">
          <label for="nickname" class="sr-only">Nickname</label>
          <input type="text" name="nickname" id="nickname" placeholder="Your nickname (optional)"  value="{{ old('nickname') }}"
            class="bg-zinc-800 border border-zinc-400 w-full p-4 rounded-lg @error('nickname') border-red-500 @enderror">

          @error('nickname')
          <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
          </div>
          @enderror
        </div>
        {{-- End Of Nickname input field --}}

        {{-- Email input field --}}
        <div class="mb-4">
          <label for="email" class="sr-only">Email</label>
          <input type="email" name="email" id="email" placeholder="Your email" value="{{ old('email') }}"
            class="bg-zinc-800 border border-zinc-400 w-full p-4 rounded-lg @error('email') border-red-500 @enderror">
          
          @error('email')
          <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
          </div>
          @enderror
        </div>
        {{-- End Of Email input field --}}

        {{-- Password input field --}}
        <div class="mb-4">
          <label for="password" class="sr-only">Password</label>
          <input type="password" name="password" id="password" placeholder="Choose a password"
            class="bg-zinc-800 border border-zinc-400 w-full p-4 rounded-lg @error('password') border-red-500 @enderror">

          @error('password')
          <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
          </div>
          @enderror
        </div>
        {{-- End Of Password input field --}}

        {{-- Password_confirmation input field --}}
        <div class="mb-4">
          <label for="password_confirmation" class="sr-only">Password confirmation</label>
          <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" 
            class="bg-zinc-800 border border-zinc-400 w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror">

          @error('password_confirmation')
          <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
          </div>
          @enderror
        </div>
        {{-- End Of Password_confirmation input field --}}

        {{-- Submit button --}}
        <div>
          <button type="submit" class="bg-blue-800 text-white px-4 py-3 rounded font-medium w-full hover:bg-blue-600">Register</button>
        </div>
        {{-- End Of Submit button --}}
      </form> 
      {{-- End Of User register form --}}
    </div>

  </div>
  @endsection
</x-home-master>