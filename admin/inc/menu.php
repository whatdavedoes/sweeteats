<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link <?php if (strtolower($page) == "dash") {echo "active";} ?>" href="/admin/dash.php">
                <span data-feather="flag"></span>
              Dashboard
            </a>
          </li>
            
          <li class="nav-item">
            <a class="nav-link <?php if (strtolower($page) == "users") {echo "active";} ?>" href="/admin/admin.php">
                <span data-feather="users"></span>
              Users
            </a>
          </li>
          </ul>
          
          
          
          <!--PAGES PAGES PAGES PAGES PAGES PAGES PAGES PAGES-->
          
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Pages</span>
          </h6>
          
          <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link <?php if (strtolower($page) == "home") {echo "active";} ?>" href="/admin/home.php">
              <span data-feather="file"></span>
              Home
            </a>
          </li>
              
              
            <li class="nav-item">
            <a class="nav-link <?php if (strtolower($page) == "story") {echo "active";} ?>" href="/admin/story.php">
              <span data-feather="file"></span>
              Our Story
            </a>
          </li>
        </ul>
        
          
        <!--POSTS POSTS POSTS POSTS POSTS POSTS POSTS POSTS --> 
          
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Posts</span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link <?php if (strtolower($page) == "testimonials") {echo "active";} ?>" href="/admin/testimonials.php">
              <span data-feather="list"></span>
              Testimonials
            </a>
          </li>
        </ul>
      </div>
    </nav>