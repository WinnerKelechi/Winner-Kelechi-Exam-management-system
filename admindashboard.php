<?php
include 'lib/Session.php';
Session::checkadminSession();
include('includes/header.php');
include('includes/menu.php');
?>
<?php
   $adminid = Session::get('aid');
   $regid = Session::get('adminId');
   $msg = $gp->checkadminhasgroup($adminid,$regid);
?>
<div class="container bg-light-gray">
    <div class="main-content" style="background:url('images.jpeg') no-repeat fixed; background-size:cover;">
        <section>
            <div class="featured-content">
                <div class="row-fluid">
                    <div class="addashmain" style="background:gray">
                        <h2>Welcome To Admin Dashboard</h2>
                        <h3>Hi,
                            <?php echo Session::get('adminusername')?>
                        </h3>
                        <h4>Your Registration Id : <span style="color:#ffbba9;text-transform: none;">
                                <?php echo $regid; ?></span> </h4>
                        <?php
            if(!$msg)
              echo "<p><i>You Have No Courses yet. Please Create a Course group.</i></p>";
            else{
            	$i=0;
            	while ($value = $msg->fetch_assoc()) {
            		$i++;
            	}
            	echo "<p><i>You Have ".$i." Courses Registered for exam</i></p>";
            }
	      ?>
                        <span style="margin-left: 850px;">

                            <a href="add_group.php"><input type="submit" name="cg" value="Create Exam" name=""></a>
                            <?php
     if(isset($_GET['adaction']) && $_GET['adaction']=='adlogout')              
               Session::destroy(); 
    ?>
                            <a href="?adaction=adlogout"><input type="submit" name="lg" value="Log Out" name=""></span></a>
                        <br>
                        <hr>
                        <center><a href="register_twice.php"><input type="submit" name="cg" value="Add lecturer"></a></center>
                        <hr>
                    </div>
                </div>

            </div>
        </section>
        <div class="ruler"></div>
        <!-- Section Two -->
        <section>
            <div class="featured-content">

                <?php
    $dt = new DateTime('now', new DateTimeZone('CAT'));
    $st =  $dt->format('Y-m-d H:i:s'); 
    $result = $gp->checkadminhasgroup($adminid,$regid);
        if($result){
        	while ($value = $result->fetch_assoc()) {
         $ck='f';
         $grid = $value['id'];
         $totalsetqs = $qs->totalsetquestionbygroup($grid);
         $totalext = $value['examRunningTime'];
         $datatime1 = $value['startingTime'];
         $datatime = new DateTime($datatime1, new DateTimeZone('CAT'));
         $dt = new DateTime($datatime1, new DateTimeZone('CAT'));
         $dt1 =  $dt->format('Y-m-d H:i:s');
         $datatime->add(new DateInterval('P0M0DT0H'.$totalext.'M0S'));
         $newtime =  $datatime->format('Y-m-d H:i:s');
         if($dt1>$st){
         	$examcon = "Exam is yet to Start";
         }elseif($dt1<$st && $newtime>$st){
         	$examcon = "Exam is Ongoing";
         	$ck = '';
         }elseif($st>$newtime){
         	$examcon = "Exam has Finished";
         	$ck = '';
         }else{
         	$examcon = "";
         }
    ?>
                <div class="row-fluid eachgr" style="background:orange">
                    <div class="span7">
                        <h2>
                            <?php echo $value['groupName'];?>
                        </h2>
                        <p style="font-size: 25px;margin-left: 30px;">
                            <?php echo $value['examName'];?>
                        </p>
                        <p style="font-size: 20px; margin-top: -8px;margin-left: 30px;"><strong>Course ID: </strong><span style="color:mintcream">
                                <?php echo $value['groupToken'];?></span></p>
                    </div>
                    <div class="span5">
                        <p><strong>Exam Time: </strong><span style="color:mintcream">
                                <?php echo $fm->DateFormat($dt1);?></span></p>
                        <p style="margin-top: -12px;"><strong>Current Time: </strong><span style="color:mintcream">
                                <?php echo $fm->DateFormat($st);?></span></p>
                        <p style="margin-top: -12px;">
                            <i><strong>Exam Condition: </strong><span style="color:#ffbba9;font-weight: bold;font-size: 17px;">
                                    <?php echo $examcon; ?></span></i></p>
                        <p style="margin-top: -12px;">
                            <i><strong>Questin Limit: </strong><span style="color:mintcream">
                                    <?php echo $value['totalQuestion']; ?></span></i>
                            <i><strong> Show Ques: </strong><span style="color:mintcream">
                                    <?php echo $value['totalExamShowQues']; ?></span></i>
                            <i><strong> Set Question: </strong><span style="color:mintcream">
                                    <?php  if(isset($totalsetqs)) echo $totalsetqs;?></span></i>
                        </p>
                        <?php
                 if($ck=='f') {?>
                        <a href="addquestion.php?aqgid=<?php echo $value['id'];?>"><input type="submit" name="addquestion" value="Add Questions" name=""></a>
                        <?php  }
	          ?>
                        <a href="viewgroup.php?vgid=<?php echo $value['id'];?>"><input type="submit" name="viewgrp" value="View"></a>
                        <?php
                 if($ck=='f') {?>
                        <a href="editgroup.php?gid=<?php echo $value['id'];?>"><input type="submit" name="editgr" value="Edit"></a>
                        <?php  }
	          ?>
                        <a href="deletegroup.php?dgid=<?php echo $value['id'];?>"><input onclick=" return confirm('Are You Sure You want To Delete?')" type="submit" name="delegr" value="Delete"></a>
                    </div>
                </div>
                <br>
                <?php } }?>

            </div>
        </section>
        <!-- Section Two End -->
    </div>
</div>


<?php 
include('includes/footer.php');
?>
