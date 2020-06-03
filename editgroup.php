<?php
include 'lib/Session.php';
Session::checkadminSession();
include('includes/header1.php');
include('includes/menu.php');
   $aid = Session::get('aid');
   $adminId = Session::get('adminId');
?>
<?php 
 if(!isset($_GET['gid']) && $_GET['gid']==NULL){
     echo "<script>window.location='admindashboard.php'</script>";
  }else{
     $gid = $_GET['gid'];
  }
if(($_SERVER['REQUEST_METHOD']=='POST')){
   $msg = $gp->updategroup($_POST,$gid); 
}

?>
<div class="container bg-light-gray">
    <div class="main-content">
        <div class="featured-content">


            <div style="margin-bottom: 30px;" class="ruler"></div>

            <div class="row-fluid">
                <div class="span8 offset3">
                    <?php
      $result = $gp->editgroupbyid($gid);
      if($result){
      	while ($value=$result->fetch_assoc()) {
      ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label style="margin-right: 114px;">Level: </label>
                            <input type="text" class="form-control adgrfs" name="groupName" required="1" value="<?php echo $value['groupName'];?>">
                        </div>
                        <div class="form-group hgad">
                            <label style="margin-right: 32px;">Course code/title: </label>
                            <input type="text" class="form-control adgrfs" name="examName" required="1" value="<?php echo $value['examName'];?>">
                        </div>
                        <div class="form-group hgad">
                            <label style="margin-right: 42px;">Total Questions: </label>
                            <input type="number" class="form-control adgrfs" name="totalQuestion" placeholder="Only Number" required="1" value="<?php echo $value['totalQuestion'];?>">
                        </div>
                        <div class="form-group hgad">
                            <label style="margin-right: 10px;">Questions For Exam: </label>
                            <input type="number" class="form-control adgrfs" name="totalExamShowQues" placeholder="Only Number" required="1" value="<?php echo $value['totalExamShowQues'];?>">
                        </div>
                        <div class="form-group hgad">
                            <label style="margin-right: 44px;">Exam duriation: </label>
                            <input type="number" class="form-control adgrfs" name="examRunningTime" placeholder="" required="1" value="<?php echo $value['examRunningTime'];?>">
                        </div>
                        <div class="form-group hgad">
                            <label style="margin-right: 22px;">Time Per Question: </label>
                            <input type="number" class="form-control adgrfs" name="eachQuestionTime" placeholder="Minutes For Per Time Question" required="1" value="<?php echo $value['eachQuestionTime'];?>">
                        </div>
                        <div class="form-group hgad">
                            <label style="margin-right: 58px;">Starting Time: </label>
                            <input type="text" class="form-control adgrfs" name="startingTime" placeholder="Format: 2017-01-27 07:18:01 [Time:24 Hour Format]" required="1" value="<?php echo $value['startingTime'];?>">
                        </div>
                        <button type="submit" class="btn btn-primary agb">Update Exam Group</button>
                    </form>
                    <?php } }?>
                </div>
            </div>
            <section>
                <?php
               if(isset($msg)) { ?>
                <div style="text-align: center;background:#4CAF50;padding: 10px; width: 400px;margin-left: 480px;border-radius: 7px;color:#fff;">
                    <?php
                      $len = strlen($msg);
                      if($len !=26){
                       echo '<h4><i>'.$msg.'</i><h4>'; 
                   }
                      else
                      	echo "<script>
                         alert('Group Updated Successfully');
                         window.location='admindashboard.php'
                      </script>"
                       ?>
                </div>
                <?php } ?>
            </section>
        </div>
    </div>
</div>

<?php 
include('includes/footer.php');
?>
