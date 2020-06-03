<?php
include 'lib/Session.php';
Session::checkadminSession();
include('includes/header1.php');
include('includes/menu.php');
   $aid = Session::get('aid');
   $adminId = Session::get('adminId');
   $rows = 0; 
   $tgtq ="";
?>
<?php 
 if(!isset($_GET['resid'],$_GET['regpid'])){
     echo "<script>window.location='admindashboard.php'</script>";
  }else{
     $resid = $_GET['resid'];
     $regpid = $_GET['regpid'];
     $tgtq = $_GET['tgtq'];
  }
?>
<div class="container bg-light-gray" style="background:url('images.jpeg') no-repeat fixed; background-size:cover;">
    <div class="main-content">
        <div class="featured-content">
            <section>
                <div class="row-fluid">
                    <div class="span8 offset1 fn">
                        <?php
            $results = $as->getusersrightanswer($resid,$regpid);
            if($results){
              $rows = mysqli_num_rows($results);       
            } 
        ?>
                        <button style="font-weight: bold;font-size: 17px; word-spacing: 12px;" class="btn btn-primary btn-block">You Got
                            <?php echo '('. $rows.')'; ?> Out of
                            <?php echo '('.$tgtq.') -- '; ?>
                            <?php if($rows< 40){
    echo "Grade is F";
}else if($rows > 39 && $rows < 46){
    echo "Grade is E";
}else if($rows > 44 && $rows < 51){
    echo "Grade is D";
}else if($rows > 49 && $rows < 60){
    echo "Grade is C";
}else if($rows > 59 && $rows < 70){
    echo "Grade is B";
}else{
    echo "Grade is A";
}
                        ?>
                        </button><br><br>

                    </div>
                </div>
            </section>
            <section>
                <div class="row-fluid">
                    <div class="span8 offset1 fn">

                        <h3>
                            <pre>Your Right Answers</pre>
                        </h3>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="warning">
                                    <th width="10%">Ques. Id</th>
                                    <th width="30%">Question</th>
                                    <th width="30%">Right Ans.</th>
                                    <th width="30%">Your Ans.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
            $results = $as->getusersrightanswer($resid,$regpid);
            if($results){
              while ($store = $results->fetch_assoc()) {
                 $quesid = $store['qid'];
                 $group_id = $store['gid'];
                 $stud_id = $store['sid'];
                 $msg = $as->storerightans($quesid,$group_id,$stud_id);
              }
            } 
            $results = $as->getusersrightanswer($resid,$regpid);
            if($results){
              while ($value = $results->fetch_assoc())  {
              ?>

                                <tr class="info">
                                    <td>
                                        <?php echo $value['qid'];?>
                                    </td>
                                    <td>
                                        <?php echo  $value['questionTitle'];?>
                                    </td>
                                    <td>
                                        <?php
                 if(!empty($value['mulcs']))
                  echo $value['mulcs'];
                 else
                  echo $value['tfcs'];
                  echo $value['thcs'];
               ?>
                                    </td>
                                    <td>
                                        <?php echo $value['ans'];?>
                                    </td>
                                </tr>
                                <?php } } else{ ?>
                                <tr>
                                    <td colspan="4" style="text-align: center;">You failed every question!</td>
                                </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <section>
                <div class="row-fluid">
                    <div class="span8 offset1 fn">
                        <h3>
                            <pre>Your Wrong Answers</pre>
                        </h3>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="warning">
                                    <th width="10%">Ques. Id</th>
                                    <th width="30%">Question</th>
                                    <th width="30%">Right Ans.</th>
                                    <th width="30%">Your Ans.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
            $results = $as->getuserswronganswer($resid,$regpid);
            if($results){
              while ($value = $results->fetch_assoc())  {
              ?>
                                <tr class="info">
                                    <td>
                                        <?php echo $value['qid'];?>
                                    </td>
                                    <td>
                                        <?php echo  $value['questionTitle'];?>
                                    </td>
                                    <td>
                                        <?php
                 if(!empty($value['mulcs']))
                  echo $value['mulcs'];
                 else
                  echo $value['tfcs'];
               ?>
                                    </td>
                                    <td>
                                        <?php echo $value['ans'];?>
                                    </td>
                                </tr>
                                <?php } } else{ ?>
                                <tr>
                                    <td colspan="4" style="text-align: center;">No Failed question. Good!</td>
                                </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php 
include('includes/footer.php');
?>
