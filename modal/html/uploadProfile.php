<div id="uploadModal" class="uploadModal">
     <div class="uploadmodal-content">
     <span class="close_uploadmodal_edit">
          <div class="close-info">
               <label for="">Update profile picture</label>
          </div>
          <button>
               &times;
          </button>
     </span>
          <div class="uploadmodal-content-wrapper">
               <!-- Update part-->
               <form action="" method="post" enctype="multipart/form-data">
                    <label for="">Choose a Photo</label>
                    <img id="preview" src="../views/default.png" alt="Preview">
                    <br>
                    <input class="upload-c" type="file" name="image" accept="image/*" onchange="previewImage(event)">
                    <br>
                    <input class="upload-btn" type="submit" value="Upload">
               </form>
               <!-- Update part-->

               </form>
          </div>
     </div>
</div>
