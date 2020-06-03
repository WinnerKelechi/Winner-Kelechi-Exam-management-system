<div class="menu" style="background:gray;">
    <div class="navbar" style="background:gray">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <i class="fw-icon-th-list"></i>
        </a>
        <div class="nav-collapse collapse">
            <ul class="nav">
                <?php
           $path = $_SERVER['SCRIPT_NAME'];
           $currenttitle = basename($path,'.php');
          ?>
                <li class="<?php if($currenttitle=='index') echo 'active';?> border-left"><a href="index.php">Home</a></li>
                <?php
          if(Session::get('admin') == true){ ?>
                <li class="<?php if($currenttitle=='admindashboard') echo 'active';?>"><a href="admindashboard.php">Dashboard</a></li>
                <?php   }  
          else if(Session::get('user') == true){  ?>
                <li class="<?php if($currenttitle=='userdashboard') echo 'active';?>"><a href="userdashboard.php">Dashboard</a></li>
                <?php }
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
