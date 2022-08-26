<?php
$file=$_FILES['file'];
$file_tmp_name=$file['tmp_name'];

$t_name=$_POST['t_name'];
$sub=$_POST['sub'];
$dis_name=$_POST['dis_name'];


$file_orig_name = $file['name'];        //stores orignal fime name to store in database
$file_name = $file['name'];

$ext_seperator = explode(".",$file_name);
$ext = end($ext_seperator);

$file_name = $ext_seperator[0];

$conn=mysqli_connect("localhost","root","","test");


if($file['error']!=0){                  // checks for error while uploading.
    echo 'error in uploading the file'; 
}
else{
    if($file['size'] > 11000){          // if loop executes when file size is less than 50 MB 
        $file_id=uniqid("$file_name-",true).".".$ext;       //creates a unique ID for each file and attaches the orignal name to the unique id.
        $file_dest = "C:\wamp64\www\project\upload\uploaded_files\\".$file_id;
        move_uploaded_file($file_tmp_name,$file_dest);
        $query="INSERT INTO uploaded_files(file_disp_name, location, uname, subject) VALUES('$dis_name', '$file_dest', '$t_name', '$sub')";
              //INSERT INTO uploaded_files(file_disp_name, location, uname, subject) VALUES('$dis_name', '$file_dest', '$t_name', '$sub');  
        if(mysqli_query($conn,$query)){
            echo "success";
        }
        else{
            echo "failed";
        }
        echo "<br><br>";
        echo $query;
        echo "<br><br>";
        echo $file_dest;
        print "<br/>";
        print "<a href='/project/upload/uploaded_files/$file_id'>file</a>";
    }
    else{echo 'File size too big, please upload something less than 10 Megabytes.';}
}



?>