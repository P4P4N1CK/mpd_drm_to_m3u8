
<nav class="bg-black h-16 flex justify-between items-center">
  <div class="pl-6">
    <a class="text-white text-lg font-bold" href="#">myapp</a>
  </div>
  <ul class="navbar-nav mr-auto flex px-12">
    <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/') ? 'active' : ''; ?> mr-6">
      <a class="nav-link text-white" href="/">Home</a>
    </li>
    <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/controlStream.php') ? 'active' : ''; ?> mr-6">
      <a class="nav-link text-white" href="controlStream.php#">Control</a>
    </li>
    <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/allStream.php') ? 'active' : ''; ?> mr-6">
      <a class="nav-link text-white pl-4" href="allStream.php">All Streams</a>
    </li>
    <li class="nav-item disabled ml-auto pl-16">
      <a class="nav-link text-white" href="#" tabindex="-1" aria-disabled="true">Bienvenido <?php echo  $username; ?> </a>
    </li>
  </ul>
</nav>




