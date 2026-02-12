<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= site_url('/') ?>">Blog</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="<?= site_url('/') ?>">Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('loginadmin') ?>">Login</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
