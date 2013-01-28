<?php
   // Different 140x140 photos in the header depending on the page
   $upLt;
   $upLtCap;
   $upRt;
   $upRtCap;
   $mainLt;
   $mainLtCap;
   $mainRt;
   $mainRtCap;
   if ( $pgId === "home" ) {
      $upLt = "homeUpLt.jpg";
      $upLtCap = "The Varon Family";
      $upRt = "homeUpRt.jpg";
      $upRtCap = "Sarah’s middle school photo 6th grade";
   } else if ( $pgId === "anno" ) {
      $upLt = "annoUpLt.jpg";
      $upLtCap = "Sarah with Mom and Dad";
      $upRt = "annoUpRt.jpg";
      $upRtCap = "Sarah with her sisters and cousins";
   } else if ( $pgId === "dona" ) {
      $upLt = "donaUpLt.jpg";
      $upLtCap = "Sarah and her parents";
      $upRt = "donaUpRt.jpg";
      $upRtCap = "Sarah and her sisters";
   } else if ( $pgId === "phot" ) {
      $upLt = "photUpLt.jpg";
      $upLtCap = "Alex and Sarah";
      $upRt = "photUpRt.jpg";
      $upRtCap = "Alex and Sarah";
   } else if ( $pgId === "pare" ) {
      $upLt = "pareUpLt.jpg";
      $upLtCap = "Mom and dad, 10th Anniversary in Mendocino";
      $upRt = "pareUpRt.jpg";
      $upRtCap = "Mom and dad, 10th Anniversary in Mendocino";
   } else if ( $pgId === "sara" ) {
      $upLt = "saraUpLt.jpg";
      $upLtCap = "Sarah, Halloween";
      $upRt = "saraUpRt.jpg";
      $upRtCap = "Alix and Lilly, Halloween";
   } else if ( $pgId === "wene" ) {
      $upLt = "weneUpLt.jpg";
      $upLtCap = "Sarah and her mom - 4th of July at Lake of the Pines";
      $upRt = "weneUpRt.jpg";
      $upRtCap = "Lindasy and Lilly - 4th of July at Lake of the Pines";
   } else if ( $pgId === "rett" ) {
      $upLt = "rettUpLt.jpg";
      $upLtCap = "Sarah at the swimming pool";
      $upRt = "rettUpRt.jpg";
      $upRtCap = "Sarah's 2nd grade school photo";
   } else if ( $pgId === "rose" ) {
      $upLt = "roseUpLt.jpg";
      $upLtCap = "Sarah with Mom, Aunt Jenny, cousins and sisters<br>outside the Velveteen Rabbit";
      $upRt = "roseUpRt.jpg";
      $upRtCap = "Mom, Sarah and Grandma in front of the<br>Museum of Modern Art";
   } else if ( $pgId === "drsm" ) {
      $upLt = "drsmUpLt.jpg";
      $upLtCap = "Sarah getting a Christmas tree";
      $upRt = "drsmUpRt.jpg";
      $upRtCap = "Sarah with Aunt Jenny";
   } else if ( $pgId === "irsf" ) {
      $upLt = "irsfUpLt.jpg";
      $upLtCap = "The Varon Girls getting a Christmas Tree - December 08";
      $upRt = "irsfUpRt.jpg";
      $upRtCap = "Sarah's grandparents";
   } else if ( $pgId === "reso" ) {
      $upLt = "resoUpLt.jpg";
      $upLtCap = "Sarah's mom and dad";
      $upRt = "resoUpRt.jpg";
      $upRtCap = "Sarah's mom and dad";
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
   <head>
      <title>The Sarah Varon Foundation for Rett Syndrome Research</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta http-equiv="Content-Language" content="en">
      <link rel="stylesheet" type="text/css" href="style.css">
<?php 
   if ( $pgId === "phot" ) {
      echo "<script type=\"text/javascript\" src=\"/lib/javascript/prototype.js\"></script>\n<script type=\"text/javascript\" src=\"scripts.js\"></script>";
   }
?>
   </head>
   <body>
      <div id="frame"> 
<?php 
   if ( $pgId !== "vide" ) {
      echo "<div class=\"lgPhotos\">\n";
         echo "<div class=\"lgPhotoLt\">\n";
            echo "<img src=\"images/$upLt\" width=\"350\" height=\"300\" alt=\"$upLtCap\"><br>$upLtCap\n";
         echo "</div>\n";
         echo "<div class=\"lgPhotoRt\">\n";
            echo "<img src=\"images/$upRt\" width=\"350\" height=\"300\" alt=\"$upRtCap\"><br>$upRtCap\n";
         echo "</div>\n";
      echo "</div>\n";
   }
?>
         <div id="header">
            <div class="headerMain">
               <h1>The Sarah Varon Foundation for Rett Syndrome Research</h1>
               <h2>The race to find a cure for Rett Syndrome</h2>
            </div>
         </div>
