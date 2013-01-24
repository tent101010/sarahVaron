<?php
   // Different 140x140 photos in the header depending on the page
   $mainLt;
   $mainLtCap;
   $mainRt;
   $mainRtCap;
   if ( $pgId === "home" ) {
      $mainLt = "homeMainLt.jpg";
      $mainLtCap = "Sarah with her Grandparents";
      $mainRt = "homeMainRt.jpg";
      $mainRtCap = "The Varon Family";
   } else if ( $pgId === "anno" ) {
      $mainLt = "annoMainLt.jpg";
      $mainLtCap = "Lindsay, Sarah and Lilly";
      $mainRt = "annoMainRt.jpg";
      $mainRtCap = "Alix, Sarah and Lilly";
   } else if ( $pgId === "dona" ) {
      $mainLt = "donaMainLt.jpg";
      $mainLtCap = "Alix and Lilly give Sarah a birthday kiss";
      $mainRt = "donaMainRt.jpg";
      $mainRtCap = "Sarah wearing her birthday crown";
   } else if ( $pgId === "phot" ) {
      $mainLt = "photMainLt.jpg";
      $mainLtCap = "";
      $mainRt = "photMainRt.jpg";
      $mainRtCap = "";
   } else if ( $pgId === "pare" ) {
      $mainLt = "pareMainLt.jpg";
      $mainLtCap = "Sarah's parents - photo by Suzanne Sizer";
      $mainRt = "pareMainRt.jpg";
      $mainRtCap = "Sarah's parents";
   } else if ( $pgId === "sara" ) {
      $mainLt = "saraMainLt.jpg";
      $mainLtCap = "Sarah with her dad - Halloween";
      $mainRt = "saraMainRt.jpg";
      $mainRtCap = "Sarah and her sisters - Halloween";
   } else if ( $pgId === "wene" ) {
      $mainLt = "weneMainLt.jpg";
      $mainLtCap = "";
      $mainRt = "weneMainRt.jpg";
      $mainRtCap = "";
   } else if ( $pgId === "rett" ) {
      $mainLt = "rettMainLt.jpg";
      $mainLtCap = "";
      $mainRt = "rettMainRt.jpg";
      $mainRtCap = "";
   } else if ( $pgId === "rose" ) {
      $mainLt = "roseMainLt.jpg";
      $mainLtCap = "Alix, Sarah and Lilly at The Velveteen Rabbit";
      $mainRt = "roseMainRt.jpg";
      $mainRtCap = "Sarah and Alix at The Velveteen Rabbit";
   } else if ( $pgId === "drsm" ) {
      $mainLt = "drsmMainLt.jpg";
      $mainLtCap = "";
      $mainRt = "drsmMainRt.jpg";
      $mainRtCap = "";
   } else if ( $pgId === "irsf" ) {
      $mainLt = "irsfMainLt.jpg";
      $mainLtCap = "Sarah and Lilly using Sarah's computer - Thanksgiving";
      $mainRt = "irsfMainRt.jpg";
      $mainRtCap = "Sarah and her cousin Dan - Thanksgiving";
   } else if ( $pgId === "reso" ) {
      $mainLt = "resoMainLt.jpg";
      $mainLtCap = "";
      $mainRt = "resoMainRt.jpg";
      $mainRtCap = "";
   }
?>
<?php
   if ( $pgId !== "phot" && $pgId !== "wene" && $pgId !== "rett" && $pgId !== "drsm" && $pgId !== "reso" && $pgId !== "vide" ) {
      echo "            <div class=\"lgPhotos\">\n";
      echo "               <div class=\"lgPhotoLt\">\n";
      echo "                  <img src=\"images/$mainLt\" width=\"350\" height=\"300\" alt=\"$mainLtCap\"><br>$mainLtCap\n";
      echo "               </div>\n";
      echo "               <div class=\"lgPhotoRt\">\n";
      echo "                  <img src=\"images/$mainRt\" width=\"350\" height=\"300\" alt=\"$mainRtCap\"><br>$mainRtCap\n";
      echo "               </div>\n";
      echo "            </div>\n";
   }
?>
         </div>
         <div id="footer">
            <div class="footerLt">
               Contact us at: <a href="mailto:info@sarahvaronfoundation.org">info@sarahvaronfoundation.org</a>.
            </div>
            <div class="footerRt">
               Professional photography by <a href="http://www.suzannesizer.com/">Suzanne Sizer</a>.
            </div>
         </div>
      </div>
   </body> 
</html>

