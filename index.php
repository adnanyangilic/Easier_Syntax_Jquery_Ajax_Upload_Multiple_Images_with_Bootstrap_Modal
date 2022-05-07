<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Upload Multiple Images by Using PHP Ajax Easier Syntax Jquery with Bootstrap Modal</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container">  
                <h3 align="center">Upload Multiple Image by Using PHP Ajax Jquery with Bootstrap Modal</h3><br />  
                <br />  
                <br />  
                <div align="center">  
                     <button type="button" data-toggle="modal" data-target="#uploadModal" class="btn btn-info btn-lg">Upload Images</button>  
                </div>  
                <br /><br />  
                <div id="gallery">  
                <?php  
                $images = glob("upload/*.*");  
                foreach($images as $image)  
                {  
                     echo '<div class="col-md-1" align="center" ><img src="' . $image .'" width="100px" height="100px" style="margin-top:15px; padding:8px; border:1px solid #ccc;" /></div>';  
                }  
                ?>  
                </div>  
                <br />  
                <br />  
           </div>  
           <br />  
      </body>  
 </html>  
 <div id="uploadModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Upload Multiple Files</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="upload_form">  
                          <label>Select Multiple Image</label>  
                          <input type="file" name="images[]" id="select_image" multiple />  
                     </form>  
                </div>  
           </div>  
      </div>  
 </div>  
 <script>  
 $(document).ready(function(){  
      $('#select_image').change(function(){3  
           $('#upload_form').submit();  
      });  
      $('#upload_form').on('submit', function(e){  
           e.preventDefault(); 
           var options={};
           options.url="upload.php";
           options.method="POST";
           options.data=new FormData(this);
           options.contentType=false;
           options.processData=false;
           options.success=function(data){  
                     $('#select_image').val('');  
                     $('#uploadModal').modal('hide');  
                     $('#gallery').html(data); };
          $.ajax(options);        

           /*
           $.ajax({  
                url :"upload.php",  
                method:"POST",  
                data:new FormData(this),  
                contentType:false,  
                processData:false,  
                success:function(data){  
                     $('#select_image').val('');  
                     $('#uploadModal').modal('hide');  
                     $('#gallery').html(data);  
               }  
           })
           
           */  
      });  
 });  
 </script>  