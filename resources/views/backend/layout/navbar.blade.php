<li class="nav-item dropdown pe-3">

    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
      <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
      {{-- @foreach ($user as $users) --}}
      <span class="d-none d-md-block dropdown-toggle ps-2">{{ $users->nama }}</span>
      {{-- @endforeach --}}
    </a><!-- End Profile Iamge Icon -->

    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
      <li class="dropdown-header">
        <h6>{{ $users->nama }}</h6>
        <span>{{ $users->posisi }}</span>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>

      {{-- <li>
        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>My Profile</span>
        </a>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>

      <li>
        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
          <i class="bi bi-gear"></i>
          <span>Account Settings</span>
        </a>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li> --}}

      <li>
        <a class="dropdown-item d-flex align-items-center" href="https://wa.me/+6281268477296" target="_blank">
          <i class="bi bi-question-circle"></i>
          <span>Need Help?</span>
        </a>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>

      <li>
        <a class="dropdown-item d-flex align-items-center" href="/logout">
          <i class="bi bi-box-arrow-right"></i>
          <span>Log Out</span>
        </a>
      </li>

    </ul><!-- End Profile Dropdown Items -->
  </li><!-- End Profile Nav -->
