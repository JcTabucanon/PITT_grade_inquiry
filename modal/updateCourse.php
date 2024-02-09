<div id="updateCourse" class="updateCourse">
     <div class="updateCourse-content">
          <span class="close_updateCourse">
               <div class="close-info">
                    <label for="">Update course listing</label>
               </div>
               <button>
                    &times;
               </button>
          </span>
          <div class="updateCourse-content-wrapper">
               <!-- Update part-->
               <label for="">UPDATE COURSE LISTING BY IMPORTING EXCEL</label>
               <form action="../include/UploadGrade.inc.php" method="post" enctype="multipart/form-data">
                    <div class=uploadListing-can>
                         <input type="text" name="AY" id="AY" placeholder="yyyy-yyyy" required>
                         <label>Academic Year</label>
                    </div>
                    <div class=uploadListing-can>
                         <input class="imp" type="file" name="excel" id="excel" required>
                         <label for="excel">Excel file</label>
                    </div>
                    <div class=uploadListing-can>
                         <input class="upload-btn" type="submit" name="UploadGrade" value="Submit">
                    </div>
               </form>
               <!-- Update part-->

               </form>
          </div>
     </div>
</div>
