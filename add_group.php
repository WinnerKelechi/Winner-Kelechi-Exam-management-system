<?php
include 'lib/Session.php';
Session::checkadminSession();
include('includes/header1.php');
include('includes/menu.php');
   $aid = Session::get('aid');
   $adminId = Session::get('adminId');
?>
<?php 
if(($_SERVER['REQUEST_METHOD']=='POST')){
   $msg = $gp->insertgroup($_POST,$aid,$adminId); 
}

?>
<div class="container bg-light-gray">
    <div class="main-content">
        <div class="featured-content">
            <section>
                <div class="row-fluid">
                    <div class="span8 offset3">
                        <h2 style="margin-bottom: 5px;">Some Rulus:</h2>
                        <p><strong>1. </strong>All field Must Be Filled Up.</p>
                        <p><strong>2. </strong>Exam duriation & Time Per Question Count in Miniutes & Seconds Time Format Respectively.</p>
                        <p><strong>3. </strong>Starting Time Format Must Be [YYYY-MM-DD hh:mm:ss] & Time Is 24 Hour Format,If These Condition Is Not True,the System Will Not Work.</p>
                    </div>
                </div>
            </section>

            <div style="margin-bottom: 30px;" class="ruler"></div>

            <div class="row-fluid">
                <div class="span8 offset3">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label style="margin-right: 110px;">Level: </label>
                            <input type="text" class="form-control adgrfs" name="groupName" placeholder="e.g. year 1, year 2..." required="1">
                        </div>
                        <div class="form-group hgad">
                            <label style="margin-right: 40px;">Course code/title: </label>
                            <input type="text" class="form-control adgrfs" name="examName" placeholder="e.g. CSC101, Phy222, GSS122..." required="1">
                        </div>
                        <div class="form-group hgad">
                            <label style="margin-right: 42px;">Total Questions: </label>
                            <input type="number" class="form-control adgrfs" name="totalQuestion" placeholder="Only Number" required="1">
                        </div>
                        <div class="form-group hgad">
                            <label style="margin-right: 10px;">Questions For Exam: </label>
                            <input type="number" class="form-control adgrfs" name="totalExamShowQues" placeholder="Only Number" required="1">
                        </div>
                        <div class="form-group hgad">
                            <label style="margin-right: 34px;">Exam Duriation: </label>
                            <input type="number" class="form-control adgrfs" name="examRunningTime" placeholder="Exam duriation in MINUTES" required="1">
                        </div>
                        <hr>
                        <div class="form-group hgad">
                            <label style="margin-right: 22px;">Time Per Question: </label>
                            <input type="number" class="form-control adgrfs" name="eachQuestionTime" placeholder="Seconds Per Time Question" required="1">
                        </div>
                        <div class="form-group hgad">
                            <label style="margin-right: 58px;">Starting Time: </label>
                            <input type="text" class="form-control adgrfs" name="startingTime" placeholder="Format: 2017-01-27 07:18:01 [Time:24 Hour Format]" required="1">
                        </div>
                        <button type="submit" class="btn btn-primary agb">Add Exam</button>
                    </form>
                </div>
            </div>
            <section>
                <?php
               if(isset($msg)) { ?>
                <div style="text-align: center;background:#4CAF50;padding: 10px; width: 400px;margin-left: 480px;border-radius: 7px;color:#fff;">
                    <?php
                      $len = strlen($msg);
                      if($len !=24)
                       echo '<h4><i>'.$msg.'</i><h4>'; 
                      else
                      	echo "<script>
                         alert('Exam group Added Successfully');
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
