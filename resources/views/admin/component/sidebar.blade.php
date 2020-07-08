<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <span data-feather="home"></span>
                            Dashboard 
                        <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.user.index') }}">
                        <span data-feather="home"></span>
                            User
                        <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.category.index') }}">
                        <span data-feather="home"></span>
                            Category
                        <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.product.index') }}">
                        <span data-feather="home"></span>
                            Product
                        <span class="sr-only">(current)</span>
                </a>
            </li>
      </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>
                Saved reports
            </span> 
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>

            <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span data-feather="file-text"></span>
                            Report
                    </a>
                </li>
            </ul>
        
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>
                    Log
                </span> 
                <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                    <span data-feather="plus-circle"></span>
                </a>
            </h6>
    
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file-text"></span>
                                User Log
                        </a>
                    </li>
                </ul>

    </div>
</nav>

@push('script')
  <script>
    $(document).ready(function () {
      let menu = $('nav li');

      $.each(menu, function (index, value) { 
        href = menu.eq(index).find('a').attr('href');

        if (href == `{{Request::url()}}`) {
          menu.eq(index).find('a').addClass('active');
        }
      });

    });
  </script>
@endpush