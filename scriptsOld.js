function updateImg( pathToFile, group, iWidth, iHeight, altTag ) {
     //alert( "path to image is: " + pathToFile );
     var target = $( group + "shot" );
     target.setAttribute( "src", pathToFile );
     target.setAttribute( "width", iWidth );
     target.setAttribute( "height", iHeight );
     target.setAttribute( "alt", altTag );
     var cap = $( group + "cap" );
     var span = cap.firstChild;
     span.innerHTML = altTag;
}

function swapGalleries( str ) {
   var galToShow = $(str);
   var curGal;
   if ( str === "family" ) {
      curGal = $( "sarah" );
   } else {
      curGal = $( "family" );
   }
   curGal.hide();
   galToShow.show();
}
