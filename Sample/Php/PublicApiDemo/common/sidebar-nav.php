<nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="<?php if(str_contains($_SERVER['REQUEST_URI'], 'first')) { echo 'nav-link active'; } else { echo 'nav-link'; } ?>" href="scenario-first.php">
                  <span data-feather="file"></span>
                  Scenario First
                </a>
              </li>
              <li class="nav-item">
                <a class="<?php if(str_contains($_SERVER['REQUEST_URI'], 'second')) { echo 'nav-link active'; } else { echo 'nav-link'; } ?>" href="scenario-second.php">
                  <span data-feather="shopping-cart"></span>
                  Scenario Second
                </a>
              </li>
              <li class="nav-item">
                <a class="<?php if(str_contains($_SERVER['REQUEST_URI'], 'third')) { echo 'nav-link active'; } else { echo 'nav-link'; } ?>" href="scenario-third.php">
                  <span data-feather="users"></span>
                  Scenario Third
                </a>
              </li>
              <li class="nav-item">
                <a class="<?php if(str_contains($_SERVER['REQUEST_URI'], 'fourth')) { echo 'nav-link active'; } else { echo 'nav-link'; } ?>" href="scenario-fourth.php">
                  <span data-feather="bar-chart-2"></span>
                  Scenario Fourth
                </a>
              </li>
            </ul>
          </div>
        </nav>