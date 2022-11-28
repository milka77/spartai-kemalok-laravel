<x-home-master>
  @section('content')
  <div class="container mx-auto">
    <div class="w-full lg:w-1/2 mx-auto bg-zinc-800 text-white p-6 rounded-xl">
      <h1 class="text-center text-2xl mb-6">Login</h1>
      
      @if (session('status'))
        <div class="p-4 text-red-500 border-2 border-red-500 rounded-lg mb-3 text-center">{{ session('status') }}</div>
      @endif
      {{-- User register form --}}
      <form action="{{ route('user.login') }}" method="POST">
        @csrf
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

        {{-- Submit button --}}
        <div>
          <button type="submit" class="bg-blue-800 text-white px-4 py-3 rounded font-medium w-full hover:bg-blue-600">Login</button>
        </div>
        {{-- End Of Submit button --}}
      </form> 
      {{-- End Of User register form --}}
    </div>

  </div>
  @endsection
</x-home-master>