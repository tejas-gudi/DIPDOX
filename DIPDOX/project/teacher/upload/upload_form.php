<html>
    <head>
        <link rel="stylesheet" type="text/css" href="up.css">  
    </head>
    <body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <!-- <input list = "sem" placeholder = "select sem">
        <datalist id = "semm"> -->
    <div class = "box1">
        <?php session_start();
        $sem = $_POST['select_sem'];
        echo "<h3>Select subject</h3>";
        //$sem_post = $_POST['select_sem'];
        $con=mysqli_connect("localhost","root","", "test");
        $sem=mysqli_query($con,"select subject from sem_subs where sem = '$sem';");
        echo"<select name = 'sub' id='sub'>";
        
        while(($row=mysqli_fetch_array($sem))!=NULL){
            echo"<option>".$row['subject']."</option>";
        }
        
        
        if(($uname = $_SESSION['username'])==null){
            header( "refresh:1; url = /DIPDOX/project/teacher/login/login_form.php");
        }
        echo"</select>";
        
        ?>

        
            <!-- <input type="text" name="sub" placeholder="Subject name"/><br/> -->
            <h3>Enter file display name</h3>
            <input type="text" name="dis_name" placeholder="File Display name"/><br/>
    
        <h3>Select file to upload!</h3></br>
            <div class="button">
            <label>
                choose file
                <input type="file" value="select file" name="file" id="file" onchange="Filevalidation()" />
            </label>
            
            </div> <br/>
            <div class="submit">
            
                    <label>
                        submit
                        <input type="submit" value="Upload File" name="submit" id="submit"> 
                    </label> 
            </div> 
    </form>
    <img src="uppp.png">
    </div>
    
    <p class="size"></p>
    <section class="footer">
    <div class="box-container">

        <p1>"<b>Diploma documents</b>" provides you all the essential learning resources.<br>
            This website is to provide syllabus copies, notes, question papers, link to
            educational videos, media, text-books for all semesters in a PDF format.</p1>
        </br>

    </div>

</section>
    </body>
    <script>
        Filevalidation = () => {
            const fi = document.getElementById('file');
            // Check if any file is selected.
            if (fi.files.length > 0) {
                for (const i = 0; i <= fi.files.length - 1; i++) {
                    
                    const fsize = fi.files.item(i).size;
                    const file = Math.round((fsize / 1024));
                    // The size of the file.
                    if (file >= 11264) {
                        alert("File too Big, please select a file less than 10mb");
                            //document.getElementById('submit').disabled = true;
                            window.location.reload(true);
                    } 
                    // else if (file < 2048) {
                    //     alert("File too small, please select a file greater than 2mb");
                    // }
                    else {
                        document.getElementById('size').innerHTML = '<b>' + file + '</b> KB';
                    }
                }
            }
        }
    </script>
</html>