<?php
include 'lib/Session.php';
Session::checkadminSession();
include('includes/header1.php');
include('includes/menu.php');

   $aid = Session::get('aid');
   $adminId = Session::get('adminId');
?>
<?php 
$con=mysqli_connect("localhost", "root", "", "myexam");

  if(isset($_POST['submit_theory'])){
  	  		
	  		$thqtitle  = mysqli_real_escape_string($con, $_POST['thqtitle']);	
	  		$thcs    = mysqli_real_escape_string($con, $_POST['thcs']);	        
	        if(empty($thqtitle) ||  empty($thcs)){
	  			 $msg = "Field  Must Not Be Empty..";
	  			 return $msg;
	  		}else{
	        	$query = "INSERT into groupquestions(questionTitle,thcs) VALUES ('$thqtitle','$thcs')";
					$result=mysqli_query($con,$query);
	                   if($result){
	             		echo "<script> alert('Question Added Successfully...')</script>";

                           
	             	}else
	             	 return false;
	        }
  }
$id=Session::get('adminId');
?>
<div class="container bg-light-gray">
    <div class="main-content">
        <div class="featured-content">
            <section>
                <div class="row-fluid">
                    <div class="span8 offset3">
                        <form action="theoryquestion.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group hgad" style="margin-top: 0px;">
                                <label style="margin-right: 56px;">Question: </label>

                                <textarea class="form-control" rows="5" name="thqtitle" required="1" placeholder="Question "></textarea>
                            </div>


                            <div class="form-group hgad">
                                <label style="margin-right: 43px;">Mark: </label>
                                <input type="number" class="form-control adgrfs" name="thcs" placeholder="score e.g. 12, 20, 10..." required="1">
                            </div>
                            <input type="submit" class="btn btn-primary agb" name="submit_theory" value="Submit">
                        </form>
                    </div>
                </div>
            </section>
            <!--<section>
                <div class="row-fluid">
                    <div class="span12">
                        <h2>Question List: </h2><br>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="warning">
                                    <th width="8%">No.</th>
                                    <th width="12%">Question</th>


                                    <th width="12%">Mark</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
              /*if( $id){
                                global $con;
    $query="select * from groupquestions where group_id='$id'";
                  echo $id;
    $result=mysqli_query($con,$query);
             if($result){
              $i = 0;
               while($value=mysqli_fetch_array($result)){
                $i++;
          ?>
                                <tr class="info cta">
                                    <td>
                                        <?php echo $i;?>
                                    </td>
                                    <td>
                                        <?php echo $value['questionTitle']; ?>
                                    </td>

                                    <td>
                                        <?php echo $value['thcs']; ?>
                                    </td>


                                </tr>
                                <?php }} 
  }*/
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>-->
        </div>
    </div>
</div>
<?php 
include('includes/footer.php');
?>
