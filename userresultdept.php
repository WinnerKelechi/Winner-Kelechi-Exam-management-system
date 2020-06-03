<?php
include 'lib/Session.php';
Session::checkuserSession();
include('includes/header.php');
include('includes/menu.php');
?>
<?php
   $userid = Session::get('uid');
   $msg = $us->checkuserhasgroup($userid);
   $rows = 0; 
   $tgtq ="";
?>

<div class="container bg-light-gray">
    <div class="main-content">
        <div class="featured-content">
            <section>
                <div class="row-fluid">
                    <div class="span8 offset1 fn">

                        <button style="font-weight: bold;font-size: 17px; word-spacing: 12px; padding:10px 0px;" class="btn btn-success btn-block">Results of Courses offered <br>by <div style="color:black">
                                <?php echo Session::get('userusername')?>
                            </div></button>

                        <?php
                            
   $con=mysqli_connect("localhost", "root", "", "myexam");                  

    $query="select * from usersforexamgroups where usersforexamgroups.student_id='$userid'";
    $result=mysqli_query($con,$query);
    
    while($row=mysqli_fetch_array($result)){
        $roll=$row['roll'];
    $name=$row['name'];
    $department=$row['department'];
   
        ?>
                        <table style="color:red">

                            <tr>
                                <td>
                                    <?php  echo 'Matric No.: '. $roll?>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo 'Student name: '. $name?>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo 'Department: '. $department?>
                                    <br>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <?php echo 'Score: '. $rows ?>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td>
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
                                    <br>
                                </td>
                            </tr>

                            <hr>

                            <?php
                      }
        
                        ?>

                        </table>
                        <br>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<?php 
include('includes/footer.php');
?>
