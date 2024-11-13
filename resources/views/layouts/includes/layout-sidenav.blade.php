<div class="sidebar" data-color="white" data-active-color="blue">
  <!--Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"-->
  <div class="logo">
    <a href="{{ route('home') }}" class="simple-text logo-normal">
      <div class="logo-image-big">
        <img src="{{ url('/vendor/img/logo.png') }}">
      </div>
    </a>
  </div>
  <div class="sidebar-wrapper"><br>




    <ul class="nav">
      <li>
        <a href="{{ route('logout') }}">
          <i class="nc-icon nc-button-power"></i>
          <p>Cerrar sesión</p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </div>
</div>