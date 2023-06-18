<header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <?php 
                if(isset($_SESSION['username'])){
                  echo '<a class="navbar-brand" href="../Pages/dashboard.php">
                          <span>
                            Tulsi Restaurant
                          </span>
                        </a>';
                }
                else{
                    echo '<a class="navbar-brand" href="../Pages/index.php">
                          <span>
                            Tulsi Restaurant
                          </span>
                        </a>';
                }
            ?>
          

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto">
              <li class="nav-item">
                <?php  
                    if(isset($_SESSION['username'])){
                      echo '<a class="nav-link" href="../Pages/dashboard.php">Home <span class="sr-only">(current)</span></a>
                      ';
                    }
                    else{
                      echo '<a class="nav-link" href="../Pages/index.php">Home <span class="sr-only">(current)</span></a>
                      ';
                    }
                ?>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Pages/menu.php">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Pages/about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Pages/book.php" style="width: 136px;">Book Table</a>
              </li>
              <?php 
                if(isset($_SESSION['username'])){
                  echo '<li class="nav-item">
                        <a class="nav-link" href="../Pages/product.php">Product</a>
                        </li>';
                }
              ?>
            </ul>
            <div class="user_option">
                <?php 
                  if(!isset($_SESSION['username'])){
                    echo '<div class="dropdown">
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-user" aria-hidden="true"></i>         
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item bg-color" href="../Pages/signup.php">Sign Up</a>
                              <a class="dropdown-item bgcolor" href="../Pages/login.php">Log In</a>
                            </div>
                          </div>';
                  }
                  else{
                    echo '<div class="dropdown">
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-user" aria-hidden="true"></i>         
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item bg-color" href="../Pages/profile.php">Profile</a>
                              <a class="dropdown-item bgcolor" href="../Pages/showorder.php">My Orders</a>
                              <a class="dropdown-item bgcolor" href="../Pages/booknow.php">My Tables</a>
                              <a class="dropdown-item bgcolor" href="../Pages/logout.php">logout</a>
                            </div>
                          </div>';
                  }
                ?>
                  
              <a href="../Pages/menu.php" class="order_online" style="width:158px;">
                Order Online
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>