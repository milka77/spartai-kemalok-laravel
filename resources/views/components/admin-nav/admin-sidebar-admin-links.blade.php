@if (auth()->user()->userHasRole('Admin'))
  {{-- Recipe Admin links --}}
  {{-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-receipt"></i>
      <span>Recipe Settings</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Recipe Categories:</h6>
        <a class="collapse-item" href="#">Show All</a>
        <a class="collapse-item" href="#">Add New</a>
        <hr>
        <h6 class="collapse-header">Recipe Difficulties:</h6>
        <a class="collapse-item" href="#">Show All</a>
        <a class="collapse-item" href="#">Add New</a>
      </div>
    </div>
  </li> --}}
  {{-- End of Recipe Admin links --}}

  {{-- News Admin links --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNews" aria-expanded="true" aria-controls="collapseNews">
      <i class="far fa-newspaper"></i>
      <span>News Settings</span>
    </a>
    <div id="collapseNews" class="collapse" aria-labelledby="headingNews" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
      
        <h6 class="collapse-header">News</h6>
        <a class="collapse-item" href="{{ route('news.index') }}"><i class="fas fa-folder-open"></i> Show All News</a>
        <a class="collapse-item" href="{{ route('news.create') }}"><i class="fas fa-folder-plus"></i> Add News</a>
        <hr>
        <h6 class="collapse-header">News Categories</h6>
        <a class="collapse-item" href="{{ route('newscat.index') }}"><i class="fas fa-folder-open"></i> Show All Categories</a>
        <a class="collapse-item" href="{{ route('newscat.create') }}"><i class="fas fa-folder-plus"></i> Add New Category</a>
      
      </div>
    </div>
  </li>
  {{-- End Of News Admin links --}}

  {{-- Raid Tax links --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRaidTax" aria-expanded="true" aria-controls="collapseNews">
      <i class="far fa-newspaper"></i>
      <span>Raid Tactics Settings</span>
    </a>
    <div id="collapseRaidTax" class="collapse" aria-labelledby="headingNews" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
      
        <h6 class="collapse-header">Raid Tactics</h6>
        <a class="collapse-item" href="{{ route('raidtax.adminindex') }}"><i class="fas fa-folder-open"></i> Show All Raid Tactics</a>
        <a class="collapse-item" href="{{ route('raidtax.create') }}"><i class="fas fa-folder-plus"></i> Add Raid Tactic</a>
        <hr>
        <h6 class="collapse-header">Raid Tactics Categories</h6>
        <a class="collapse-item" href="{{ route('raidtaxcat.index') }}"><i class="fas fa-folder-open"></i> Show All Categories</a>
        <a class="collapse-item" href="{{ route('raidtaxcat.create') }}"><i class="fas fa-folder-plus"></i> Add New Category</a>
        <hr>
        <h6 class="collapse-header">Raid Tactics Difficulties</h6>
        <a class="collapse-item" href="{{ route('raidtaxdiff.index') }}"><i class="fas fa-folder-open"></i> Show All Difficulties</a>
        <a class="collapse-item" href="{{ route('raidtaxdiff.create') }}"><i class="fas fa-folder-plus"></i> Add New Difficulty</a>
      
      </div>
    </div>
  </li>
  {{-- End Of Raid Tax links --}}


  {{-- Recruitment links --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRecruitment" aria-expanded="true" aria-controls="collapseRecruitment">
      <i class="fas fa-user-plus"></i>
      <span>Recruitment Settings</span>
    </a>
    <div id="collapseRecruitment" class="collapse" aria-labelledby="headingRecruitment" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
      
        <h6 class="collapse-header">Recruitment</h6>
        <a class="collapse-item" href="{{ route('raidtax.adminindex') }}"><i class="fas fa-folder-open"></i> Show All Raid Tactics</a>
        <a class="collapse-item" href="{{ route('raidtax.create') }}"><i class="fas fa-folder-plus"></i> Add Raid Tactic</a>
        <hr>
        <h6 class="collapse-header">Recruitment Classes</h6>
        <a class="collapse-item" href="{{ route('class.index') }}"><i class="fas fa-folder-open"></i> Show All Classes</a>
        <a class="collapse-item" href="{{ route('class.create') }}"><i class="fas fa-folder-plus"></i> Add New Class</a>
        <hr>
        <h6 class="collapse-header">Recruitment Specs</h6>
        <a class="collapse-item" href="{{ route('raidtaxdiff.index') }}"><i class="fas fa-folder-open"></i> Show All Difficulties</a>
        <a class="collapse-item" href="{{ route('raidtaxdiff.create') }}"><i class="fas fa-folder-plus"></i> Add New Difficulty</a>
      
      </div>
    </div>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
  </li>
  {{-- End Of Recruitment links --}}

  {{-- User Admin links --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
      <i class="fas fa-users"></i>
      <span>User Settings</span>
    </a>
    <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
      
        <h6 class="collapse-header">Users</h6>
        <a class="collapse-item" href="{{ route('user.index') }}"><i class="fas fa-folder-open"></i> Show All User</a>
      
      </div>
    </div>
  </li>
  {{-- End Of User Admin links --}}
      
  {{-- Role Admin Links --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRole" aria-expanded="true" aria-controls="collapseRole">
      <i class="fa-solid fa-user-gear"></i>
      <span>Role Settings</span>
    </a>
    <div id="collapseRole" class="collapse" aria-labelledby="headingRole" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        
        <h6 class="collapse-header">Roles</h6>
        <a class="collapse-item" href="{{ route('roles.index') }}"><i class="fas fa-folder-open"></i> Show Roles</a>
        <a class="collapse-item" href="{{ route('roles.create') }}"><i class="fas fa-folder-plus"></i> Add New Role</a>

      </div>
    </div>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  {{-- End Of Role Admin Links --}}
@endif