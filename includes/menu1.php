<div class="menu" style="background:black">
    <div class="navbar">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <i class="fw-icon-th-list"></i>
        </a>
        <div class="nav-collapse collapse">
            <ul class="nav">
                <li class="active border-left"><a href="index.php">Home</a></li>
                <?php
          if(Session::get('admin') == true){
             echo "<li><a href=\"#\">Dashboard</a></li>";
          } 
          else if(Session::get('user') == true){ 
             echo "<li><a href=\"#\">Dashboard</a></li>";
           }
        ?>

            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
    <div class="mini-menu">
        <label>
            <select class="selectnav">
                <option value="#" selected="">Home</option>

            </select>
        </label>
    </div>
</div>
