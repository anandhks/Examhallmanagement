<?php
$conn = new mysqli('localhost', 'root', '', 'mace') 
or die ('Cannot connect to db');
$del23= mysqli_query($conn, "DELETE FROM student where Course='Course' AND Branch='Branch'");
$del2= mysqli_query($conn, "DELETE FROM student where Course=' ' AND Branch=' '");
$ins1234=mysqli_query($conn,"INSERT INTO finalroom (No, room_name, capacity, status,occupy) SELECT No, room_name, capacity, status, occupy FROM `room21` ");

        $count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM room21"));
        $count1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM course"));
        $query = mysqli_query($conn,"SELECT room_name,capacity,status FROM room21");
                     
    while($row = mysqli_fetch_array($query))
    {
        $inspector [] = $row['room_name'];
        $inspector1 [] = $row['capacity'];
    }
foreach ($inspector as $select)
{
        $qu1 = mysqli_query($conn,"SELECT capacity,status,occu FROM room21 where room_name='$select' ");
        $row = mysqli_fetch_assoc($qu1);
        $se=$row['capacity'];
        $se1=$row['status'];
        $reca=$row['occu'];
        $last=$reca;
        $lst=$last-5;
        $ps=$last;
      if($se1==2)
      {
         $s=($se/2);
         $z=$s;
          $qu12= mysqli_query($conn,"SELECT No,Course,Branch,total FROM course");
          $row1 = mysqli_fetch_assoc($qu12);
          $q3=$row1['No'];
          $q3=$q3;
          $coun1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $select"));
          
          while ($coun1<=$last)
          {
              echo 'inside while';
              $qu12= mysqli_query($conn,"SELECT No,Course,Branch,total FROM course where No='$q3'");
                $row1 = mysqli_fetch_assoc($qu12);
                $q1=$row1['Course'];
                $q2=$row1['Branch'];
                $q3=$row1['No'];
                $q4=$row1['total'];
                    $ins123=mysqli_query($conn,"INSERT INTO $select (Reg_no,Course) SELECT Register,Course FROM student where Course='$q1' AND Branch='$q2' LIMIT $s");
                    $sw= mysqli_affected_rows($conn);
                    $del1= mysqli_query($conn, "DELETE FROM student where Course='$q1' AND Branch='$q2' LIMIT $sw");
                    $p=($q4-$sw);
                    $p= abs($p);
                    $ps=$ps-$sw;
                    $ps= abs($ps);
                    $up31= mysqli_query($conn, "UPDATE room21 SET capacity='$ps' WHERE room_name='$select'");
                    
                    $up1= mysqli_query($conn, "UPDATE course SET total='$p' WHERE No='$q3'");
                    $ss=0;
                    $insert1=mysqli_query($conn,"insert into roomcourse (Course,Branch,room_name,total) values('".$q1."','".$q2."','".$select."','".$sw."')");
                    $d123=mysqli_query($conn, "DELETE FROM roomcourse where total='0'");
                    $insert11=mysqli_query($conn,"insert into roomcourse1 (Course,Branch,room_name,total) values('".$q1."','".$q2."','".$select."','".$sw."')");
                    $d1234=mysqli_query($conn, "DELETE FROM roomcourse1 where total='0'");
                   
                    $up123=mysqli_query($conn, "DELETE FROM course  where Course='$q1' AND total<=$ss");
                        if($ps>=$z)
                    {
                        $s=$last/2;
                    }
                    
                    elseif ($ps<$z) {
                        $s=$ps;
                                         }                  
                    else {
                        
                    }
                    
                    $coun1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $select"));
                     $counc = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM course"));
                                  $quy12= mysqli_query($conn,"SELECT * FROM roomcourse1 WHERE room_name='$select'");
                                  $row13 = mysqli_fetch_assoc($quy12);
                                  $g1=$row13['Course'];
                                  $g2=$row13['Branch'];
                                  $g3=$row13['room_name'];
                                  $g4=$row13['total'];     
                     $co1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $select where course='$g1'"));
                      if ($coun1>=$last)
                             {
                               $roomdel=mysqli_query($conn, "DELETE FROM room21  where room_name='$select'");
                               $courdel=mysqli_query($conn, "DELETE FROM roomcourse  where room_name='$select' ");
                    echo 'delete full';
                    break;
                             }    
                    if(mysqli_query($conn,"SELECT * from course where NOT Course='$g1'"))
                    {
                        $sqle= mysqli_query($conn,"SELECT * from course where Course<>'$g1'");
                        echo 'next course';
                        $roww = mysqli_fetch_assoc($sqle);                       
                        $q3=$roww['No'];
                        echo $q3;                        
                    }
                    
                    else {
                        echo 'not execute   ';
                        break;
                             }                                                            
          }
                       
      
    
      } 
               else {
                         $sq=$se;
      $coun1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $select"));
          while ($coun1<$last)
          {
              $qu12= mysqli_query($conn,"SELECT No,Course,Branch,total FROM course");
                $row1 = mysqli_fetch_assoc($qu12);
                $q1=$row1['Course'];
                $q2=$row1['Branch'];
                $q3=$row1['No'];
                $q4=$row1['total'];
                        $ins123=mysqli_query($conn,"INSERT INTO $select (Reg_no,Course) SELECT Register,Course FROM student where Course='$q1' AND Branch='$q2' LIMIT $sq");
                        $sr= mysqli_affected_rows($conn);
                        $sq=$sq-$sr;
                        $sq= abs($sq);
                        $del1= mysqli_query($conn, "DELETE FROM student where Course='$q1' AND Branch='$q2' LIMIT $sr");
                        $insert1=mysqli_query($conn,"insert into roomcourse (Course,Branch,room_name,total) values('".$q1."','".$q2."','".$select."','".$sr."')");
                        $insert13=mysqli_query($conn,"insert into roomcourse1 (Course,Branch,room_name,total) values('".$q1."','".$q2."','".$select."','".$sr."')");
                        $d123=mysqli_query($conn, "DELETE FROM roomcourse where total='0'");
                        $d1234=mysqli_query($conn, "DELETE FROM roomcourse1 where total='0'");
                        $p=($q4-$sr);
                        $up19= mysqli_query($conn, "UPDATE course SET total='$p' WHERE No='$q3'");
                        $ss=0;
                        $up123=mysqli_query($conn, "DELETE FROM course  where total<=$ss");
                        $ps=$ps-$sr; 
                        $sq=$ps;
                        $sq= abs($sq);
                        $ps= abs($ps);
                        $up31= mysqli_query($conn, "UPDATE room21 SET capacity='$ps' WHERE room_name='$select'");
                        $coun1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $select"));
                         if ($coun1>=$last)
                           {
                               $roomdel=mysqli_query($conn, "DELETE FROM room21  where room_name='$select'");
                               $courdel=mysqli_query($conn, "DELETE FROM roomcourse  where room_name='$select' ");
                                echo 'delete full';            
                              }

               }
    
   
               }
                    
$cou1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $select"));
$set1=($se-$cou1);
$up1= mysqli_query($conn, "UPDATE room21 SET capacity='$set1' WHERE room_name='$select'");        
echo "<br>" .$select."";
               }
?>