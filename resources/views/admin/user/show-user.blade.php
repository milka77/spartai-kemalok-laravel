<x-admin-master>
  @section('content')
    <div class="container">
      <h1 class="text-center">User Profile</h1>
     
      @if(auth()->user()->id === $user->id || auth()->user()->userHasRole('admin'))
      <div class="row">
        <div class="col-sm-12 col-md-5">
          <h4 class="text-center">Profile of {{$user->name}}</h4>
          <table class="table table-sm table-borderless">
            <tr>
              <th scope="row">ID</th>
              <td class="text-right">{{$user->id}}</td>
            </tr>
            <tr>
              <th scope="row">Name</th>
              <td class="text-right">{{$user->name}}</td>
            </tr>
            <tr>
              <th scope="row">Nickname</th>
              <td class="text-right">{{$user->nickname}}</td>
            </tr>
            <tr>
              <th scope="row">Email</th>
              <td class="text-right">{{$user->email}}</td>
            </tr>            
            <tr>
              <th scope="row">Role</th>
              <td class="text-right">
                @foreach ($user->roles as $role)
                  
                    {{$role->name}}, 
                 
                @endforeach
              </td>
            </tr>            
            <tr>
              <th scope="row">Registered</th>
              <td class="text-right">{{$user->created_at}}</td>
            </tr><tr>
              <th scope="row">Last Updated</th>
              <td class="text-right">{{$user->updated_at}}</td>
            </tr>
            
             
            
          </table>
        </div>
        <div class="col-sm-12 col-md-2"></div>
        <div class="col-sm-12 col-md-5">
          <h4 class="text-center">Update User Profile</h4>

          <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PATCH')
  
            <div class="mb-3">
              <label class="form-label" for="name">Name</label>
              <input class="form-control form-control-sm" type="text" name="name" value="{{ $user->name }}">
            </div>

            <div class="mb-3">
              <label class="form-label" for="last_name">Nickame</label>
              <input class="form-control form-control-sm" type="text" name="nickname" value="{{ $user->nickname }}">
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email address</label>
              <input type="email" class="form-control form-control-sm" name="email" value="{{ $user->email }}">
            </div>

            <div class="d-flex flex-row-reverse">
              <button class="btn btn-success" type="submit">Update</button>
              @if(auth()->user()->userHasRole('admin'))
                <a class="btn btn-danger text-white mr-2" href="{{ route('user.index') }}">Back</a>
              @else
                <a class="btn btn-danger text-white mr-2" href="{{ route('admin.index') }}">Back</a>
              @endif
            </div>

          </form>
        </div>
      </div>
      @else
      <div class="row">
        <div class="alert alert-danger text-center">
          You are not authorised to visit this page!!
        </div>
      </div>
      @endif
      <hr>

      @if(auth()->user()->userHasRole('Admin'))
        <div class="row mt-3">
          <div class="col-sm-12">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-center">Manage Roles</h6>
              </div>
      
              <div class="card-body">
                <div class="table-responsive">
                  @if (!empty($roles))
                  <table class="table table-bordered" id="usersTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                      <tr>
                        <th>Options</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Attach</th>
                        <th>Detach</th>
                      </tr>
                    </thead>
      
                    <tfoot class="text-center">
                      <tr>
                        <th>Options</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Attach</th>
                        <th>Detach</th>
                      </tr>
                    </tfoot>
      
                    <tbody>
                      @foreach ($roles as $role)
                        <tr class="text-center">
                          <td><input type="checkbox"
                                    name=""
                                    @foreach ($user->roles as $user_role)
                                        @if($user_role->slug == $role->slug)
                                            checked
                                        @endif
                                    @endforeach
                          ></td>
                          <td>{{$role->id}}</td>
                          <td>{{$role->name}}</td>
                          <td>{{$role->slug}}</td>
                          <td>
                            {{-- Attaching a role for the user --}}
                            <form action="{{route('user.role.attach', $user)}}" method="POST">
                              @csrf
                              @method('PUT')
                              <input type="hidden" name="role" value="{{$role->id}}">
                              <button type="submit"
                                      class="btn btn-success"
                                      @if($user->roles->contains($role))
                                        disabled
                                      @endif
                                      >Attach
                              </button>
                            </form>
                          </td>

                          <td>
                            {{-- Detaching a role for the user --}}
                            <form action="{{route('user.role.detach', $user)}}" method="POST">
                              @csrf
                              @method('PUT')
                              <input type="hidden" name="role" value="{{$role->id}}">
                              <button type="submit"
                                      class="btn btn-outline-danger"
                                      @if(!$user->roles->contains($role))
                                        disabled
                                      @endif
                                      >Detach
                              </button>
                            </form>
                          </td>
                          
                        </tr>
                      @endforeach
                    </tbody>
      
                  </table>
                  @else
                      <div class="alert alert-info text-center"><h5>No Roles found in the database.</h5></div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  @endsection
</x-admin-master>