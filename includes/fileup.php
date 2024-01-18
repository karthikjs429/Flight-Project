
     $dd=date('ymd');
     $img=$_FILE['txtpic']['name'];
     
     $temp=$_FILE['txtpic']['tmp_name'];
     $ext=pathinfo($img,PATHINFO_EXTENSION);
     $ra=rand(10000,10000000);
     $img1=basename($img,$ext);
     $image=$dd.$ra.".".$ext;
      move_uploaded_file($temp,"packageimage/".$image);
      echo"$image";
     



 <img src="../organizer/packageimage/<?php echo $img?>">