<?php
$pgId = "phot";
   /*
   Overview: photosAdmin should be used whenever a change is made to the 
   gallery. It generates/updates photos.php and gallery.js. This way, the
   backend work needed when where is a change to the gallery only happens
   when it needs to.
   
   Goals:
   1. minimize maintenance on the gallery - as of this version, to add/remove photos
      from the gallery:
      * Add -  process the photos in ImageReady or Photoshop or whatever, compressing
               them and cropping them to the correct sizes:
               440x300 for horizontals full size
               40x 27 for horizontal thumbs
               400x600 for vertical full size
               27x41 for vertical thumbs
            -  add the photos to the correct directory 
               (sarah, sarahThumbs, familyGal, familyThumbs), following the naming 
               convention. The oldest photot is 99998
            -  add a caption to the appropriate file ( sarahCaps.txt or familyCaps.txt)
            -  Shift-reload photosAdmin.php
      * Remove - I hope, based on the Add instructions that this is obvious...
   2. update a javascript file depending on the contents of several directories 
      and files on the server. Shift-reloading photosAdmin.php will cause gallery.js to be updated
      and reloaded for use on the page.
   3. update photos.php.
     
      =======================
        
   1. On initial page load:
      a. "Sarah" link is inactive, "Family" link is active.
      b. Use php to read sarahCaps.txt and familyCaps.txt into local arrays.
         Spin through the local arrays to write array literals to the gallery.js
         file. Use js and the DOM to create alt attributes and captions for the photos.
         -  There should be exactly as many items in sarahCaps.txt as there are 
            items in sarahArr and sarahThumbsArr so that indexing matches up
      b. Thumbs are from the Sarah collection (sarahThumbs)
         -  init function scans the sarahThumbs, familyThumbs directories, loading the 
            file names into local arrays. The local arrays are used to write array 
            literals into the gallery.js file so we can use DOM manipulation to make the 
            gallery work.
         -  on the same pass through the sarahThumbs and familyThumbs directories, use 
            getimagesize() to collect the width and height for each image. Use this info 
            to write another dimension into the javascript arrays. 
         -  image is sarahThumbs[0][0]
         -  width is sarahThunbs[0][1]
         -  height is sarahThumbs[0][2]
         -  alt attribute is sarahCaps[0] + 'thumbnail'
         -  <a href> on the thumb should include a var string (?cur=x) to be used 
            as an index into the js arrays.
      c. Large image is first full size image from the Sarah collection
         -  init function scans the sarah and family directoris, loading the file names
            into local arrays. The local arrays are used to write array literals into
            the gallery.js file we so we can use DOM manipulation to make the gallery
            work.
         -  on the same pass through the "sarah" and "family" directories, use 
            getimagesize() to collect the width and height for each image. Use this info 
            to write another dimension into the javascript arrays. 
         -  js init function loads sarahPics[0][0].
         -  alt attribute comes from sarahCaps[0]
      d. Insert caption
         -  <div id="cap"> get sarahCaps[0].
   2. When "Family" link is clicked:
      a. "Sarah" link becomes active, "Family" link becomes inactive
         -  use DOM functions to manipulate the hrefs on "Sarah" and "Family"
      b. Thumbs are from the Family collection
         -  Empty <div id="thumbs"> (assume number of photos in each catagory will be 
            diffent so we can't just overwrite the <img src> attributes.)
         -  Spin through familyThumbs[], building the elements that hold the thumbnails 
            and links for the Family collection
            * alt attribute is famCaps[i] + 'thumbnail'
      c. Large image is familyPics[0][0]
         -  Caption is familyCaps[0]
      d. On click of a thumb, call a javascript function to load the correct large pic from 
         famPics[n][0], using the DOM to change <img src> attribute for the full size image.
         -  use the DOM to change the contents of the caps div to familyCaps[var].
         -  width comes from famPics[n][1].
         -  height comes from famPics[n][2].
   */
      
   /* Get and process the contents of a directory of photos (could be full size or thumbs). */
   function procDir( $dirName, $galArr, &$jsArr, $regEx, $rStringA, $rStringB ) { 
      /* 1. Read the contents of the directory into an array ($galArr). */ 
         if ( $dirHan = opendir( $dirName ) ) {
            /* Ignoring "." and "..", fill galArr with file names.
               This is the correct way to loop over the directory. 
               Must test for "identical to false" 
               ( !==, TRUE if $a is not equal to $b, or they are not of the same type.) 
               Otherwise, any item in the directory list that evaluates to FALSE 
               (a file named "0", for example) will terminate the loop. */
            while ( false !== ( $file = readdir( $dirHan ) ) ) {
               if ( $file != "." && $file != ".." && $file !=".DS_Store" ) {
                  $galArr[] = $file;
               }
            }
            closedir( $dirHan );
         } else {
            echo "Unable to access $dirName.";
         } 
         /* 2. Spin through $galArr, writing it's contents into the correct element of 
               another local array holding the contents of gallery.js */
         $rString = "";
         echo( "jsArr is: $jsArr" );
         foreach ( $jsArr as $line_num => $line ) {
            if ( ereg( $regEx, $line ) ) {
               // replace the matched line with $galArr
               foreach ( $galArr as $i => $value ) {
                  //get the image size info array
                  $wh = getimagesize( $dirName."/".$value );
                  //get the width and the height
                  $w = $wh[0];
                  $h = $wh[1];
                  $rString = $rString."[\"".$value."\",\"".$w."\",\"".$h."\"],";
               }
               //echo "string b4 removing comma: ".$rString."<br/>";
               //There's an exta comma after the final item. Remove it
               $rString = rtrim( $rString, "," );
               //echo "string after removing comma:".$rString."<br/>";
               $line = ereg_replace( $regEx, $rStringA.$rString.$rStringB, $line );
               $jsArr[$line_num] = $line;
            } 
            //echo print_r( $jsArr )."<br />";
         }
      }

      function procCapsFile( $pathToFile, $capsArr, &$jsArr, $regEx, $rStringA, $rStringB ) {
         $rString = "";
         foreach ( $jsArr as $line_num => $line ) {
            if ( ereg( $regEx, $line ) ) {
               //echo "Found a match<br />";
               $rString = implode( ",", $capsArr );
               //echo "rString: ".$rString."<br /><br />";
               $line = ereg_replace( $regEx, $rStringA.$rString, $line );
               $jsArr[$line_num] = $line;
            }     
         }
      }
     
      function writePhotosPhp() {
         $photosPhpFile = "photos.php";
         $fileString = "<?php\n\$pgId = \"phot\";\nrequire_once( 'headerInc.php' );\nrequire_once( 'navInc.php' );\n?>\n<div id=\"mainContent\">\n<div id=\"gallery\">\n<h4 id=\"galLinks\"></h4>\n<div id=\"shotDiv\">\n<!-- contents updated dynamically -->\n<img id=\"shot\" src=\"\" alt=\"\">\n</div>\n<div id=\"cap\"></div>\n<div id=\"thumbs\">\n<!-- contents created dynamically -->\n</div>\n</div>\n<?php require_once( 'footerInc.php' ); ?>" . PHP_EOL;
         if ( is_writable( $photosPhpFile ) ) {
            if ( !$file = fopen( $photosPhpFile, 'w+' ) ) {
               echo "Can't open $photosPhpFile.";
               exit;
            }
            echo( $fileString );
            fwrite( $file, $fileString );
            fclose( $file );
         } else {
            echo "$photosPhpFile not writeable.";
         }
      }
      
      function loadGallery( $string, &$jsArr ) {
         global $js;
         $js = "gallery.js"; //the javascript file
         global $galJSArr; 
         $galJSArr = file( $js ); //read gallery.js into a local array
         $sarah = "images/gallery/sarah"; //Sarah Gallery path
         $sarahArr = array(); //local array that will hold the file names found in $sarah

         $sarahThumbs = "images/gallery/sarahThumbs"; //Sarah Gallery Thumbs path
         $sarahThumbsArr = array(); //local array to hold file names in $sarahThumbs

         $sarahCaps = "images/gallery/sarahCaps.txt"; //Sarah Gallery captions file
         $sarahCapsArr = file( $sarahCaps ); //local array that will hold the contents of $sarahCaps

         $family = "images/gallery/family"; //Family Gallery path
         $familyArr = array(); //local array that will gold the file names found in $family

         $familyThumbs = "images/gallery/familyThumbs";
         $familyThumbsArr = array();

         $familyCaps = "images/gallery/familyCaps.txt"; //Family Gallery captions file
         $familyCapsArr = file( $familyCaps ); //local array the will hold the content of $fCaps

         $sarahRegex = "(^sarahPics =.*$)";
         $sarahRStringA = "sarahPics = [";

         $sarahTRegex = "(^sarahThumbs =.*$)";
         $sarahTRStringA = "sarahThumbs = [";

         $sarahCapsRegex = "(^sarahCaps =.*$)";
         $sarahCapsRStringA = "sarahCaps =";

         $familyRegex = "(^familyPics =.*$)";
         $familyRStringA = "familyPics = [";

         $familyTRegex = "(^familyThumbs =.*$)";
         $familyTRStringA = "familyThumbs = [";

         $familyCapsRegex = "(^familyCaps =.*$)";
         $familyCapsRStringA = "familyCaps =";

         $jsArrSuff = "];\n";

         // process the captions for the Sarah gallery
         procCapsFile( $sarahCaps, $sarahCapsArr, $jsArr, $sarahCapsRegex, $sarahCapsRStringA, $jsArrSuff );

         // process the captions for the Family gallery
         procCapsFile( $familyCaps, $familyCapsArr, $jsArr, $familyCapsRegex, $familyCapsRStringA, $jsArrSuff );
         procDir( $sarah, $sarahArr, $jsArr, $sarahRegex, $sarahRStringA, $jsArrSuff );
         procDir( $sarahThumbs, $sarahThumbsArr, $jsArr, $sarahTRegex, $sarahTRStringA, $jsArrSuff );
         procDir( $family, $familyArr, $jsArr, $familyRegex, $familyRStringA, $jsArrSuff );
         procDir( $familyThumbs, $familyThumbsArr, $jsArr, $familyTRegex, $familyTRStringA, $jsArrSuff );

         //Overwrite the gallery.js with the contents of $galJSArr
         if ( is_writable( $js ) ) { 
            if ( !$galJS = fopen( $js, 'w+' ) ) {
               echo "Can't open $js.";
               exit;
            }
         foreach ( $jsArr as $line_num => $line ) {
            if ( fwrite( $galJS, $line ) === FALSE ) {
               echo "Failed to overwrite a line.";
               exit;
            }
         }
         fclose( $galJS );
      } else {
         echo "$js not writeable.";
      } 
   }
   writePhotosPhp();
   loadGallery( 'Sarah', $galJSArr );   
?>

