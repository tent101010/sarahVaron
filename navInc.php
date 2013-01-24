<?php
   $nav = array(  "home" => array( 0 => "<a href=\"index.php\">Home</a> |\n", 1 => "Home |\n" ), 
                  "anno" => array( 0 => "<a href=\"announcements.php\">Announcements</a> |\n", 1 => "Announcements |\n" ),
                  "dona" => array( 0 => "<a href=\"donations.php\">Donations</a> |\n", 1 => "Donations |\n" ),
                  "phot" => array( 0 => "<a href=\"photos.php\">Photos</a> |\n", 1 => "Photos |\n" ),
                  "pare" => array( 0 => "<a href=\"parentsMessage.php\">Parents' Message</a> |\n", 1 => "Parents' Message |\n" ),
                  "sara" => array( 0 => "<a href=\"sarahsStory.php\">Sarah's Story</a> |\n", 1 => "Sarah's Story |\n" ),
                  "wene" => array( 0 => "<a href=\"weNeedYou.php\">We Need You</a> |\n", 1 => "We Need You |\n" ),
                  "rett" => array( 0 => "<a href=\"rettOverview.php\">Rett Overview</a> |\n", 1 => "Rett Overview |\n" ),
                  "rose" => array( 0 => "<a href=\"rosettaStone.php\">Rosetta Stone?</a> |\n", 1 => "Rosetta Stone? |\n" ),
                  "drsm" => array( 0 => "<a href=\"drsMessage.php\">Dr.'s Message</a> |\n", 1 => "Dr.'s Message |\n"),
                  "irsf" => array( 0 => "<a href=\"IRSF.php\">IRSF</a> |\n", 1 => "IRSF |\n" ),
                  "reso" => array( 0 => "<a href=\"resources.php\">Resources</a>\n", 1 => "Resources\n" )
          );
          echo "         <div>\n            <div id=\"nav\">\n";
          foreach ( $nav as $key => $value ) {
             if ( $pgId === $key ) echo "            ".$value[1];
             else echo "            ".$value[0];
          }
          echo "            </div>\n";
          echo "         </div>";
?> 
