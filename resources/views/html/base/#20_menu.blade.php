@section('menu')
  <header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 nav-style">
      <div class="container">
        <div class="nav-gear">
          <div class="nav-gear01" id="nav-gear01"></div>
          <div class="nav-gear02" id="nav-gear02"></div>
          <div class="nav-gear03" id="nav-gear03"></div>
          <a class="navbar-brand nav-gear-text" href="#page-top">www.sighon-system.jp</a>
        </div>
        <button type="button" id="navbar-toggler" class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" data-toggle="modal" data-target="#notices">Notices</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
@endsection
