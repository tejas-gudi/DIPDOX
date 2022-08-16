<html>
    <head>
        <link rel="stylesheet" type="text/css" href="upstyle.css">  
    </head>
<body>
<p>
    <div class = "box1">
       <div class="image">
       <img src="up1wallpaper.png">
       </div>
    <form action="upload.php" method="post" enctype="multipart/form-data">
    <br/><br/>
        Teacher Name : </br><input type="text" name="t_name" placeholder="Enter your name"/><br/>

        Subject :    </br><input type="text" name="sub" placeholder="Enter subject"/><br/>

        File Display Name :</br><input type="text" name="dis_name" placeholder="Enter file name"/><br/>

</div>
<div class = "box2"> 
        <br/>
       
        <h1>Select file to upload!</h1>
        
        
            <div class="button">
            <label>
                choose file
                <input id="file"  type="file" name="file" onchange="Filevalidation()"/> 
            </label> 
            </div> 
</br>
            <div class="submit">
            <label>
                submit
                <input type="submit" value="Upload File" name="submit" id="submit"> 
            </label> 
            </div> 
       
      
        
    </form>
    
    </div>
    
    
</p>
<p id="size"></p>
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
                    alert(
                        "File must be less than 10MB greater than 2MB");
                        // document.getElementById('submit').disabled = true;//edited
                        window.location.reload(true);
                } 
                // else if (file < 2048) {//edited
                //     alert("File too small, please select a file greater than 2mb");//edited
                // }//edited
                else {
                    document.getElementById('size').innerHTML = '<b>'
                    + file + '</b> KB';
                }
            }
        }
    }
</script>
</html>