<style>
    .nav-link:hover{
        background-color: white
    }

</style>
<div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px; height: 135vh; background-color: orange; ">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-black text-decoration-none text-bold" style="position: fixed">
      <span class="fs-4">CleanTrack</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mt-5" style="position: fixed">
      <li class="nav-item">
        <a href="employee" class="nav-link text-black"> Officers </a>
      </li>
      <li>
        <a href="schedules" class="nav-link text-black">
          Schedules
        </a>
      </li>
      <li>
        <a href="{{url('/location/create')}}" class="nav-link text-black">
          Locations
        </a>
      </li>
      <li>
        <a href="role" class="nav-link text-black">
          Role
        </a>
      </li>
    </ul>
  </div>
