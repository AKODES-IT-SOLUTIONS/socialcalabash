

(() =>{
 
  const openNavMenu = document.querySelector(".open-nav-menu"),
  closeNavMenu = document.querySelector(".close-nav-menu"),
  navMenu = document.querySelector(".nav-menu"),
  menuOverlay = document.querySelector(".menu-overlay"),
  mediaSize = 991;

  openNavMenu.addEventListener("click", toggleNav);
  closeNavMenu.addEventListener("click", toggleNav);
  // close the navMenu by clicking outside
  menuOverlay.addEventListener("click", toggleNav);

  function toggleNav() {
    navMenu.classList.toggle("open");
    menuOverlay.classList.toggle("active");
    document.body.classList.toggle("hidden-scrolling");
  }

  navMenu.addEventListener("click", (event) =>{
      if(event.target.hasAttribute("data-toggle") && 
        window.innerWidth <= mediaSize){
        // prevent default anchor click behavior
        event.preventDefault();
        const menuItemHasChildren = event.target.parentElement;
        // if menuItemHasChildren is already expanded, collapse it
        if(menuItemHasChildren.classList.contains("active")){
          collapseSubMenu();
        }
        else{
          // collapse existing expanded menuItemHasChildren
          if(navMenu.querySelector(".menu-item-has-children.active")){
          collapseSubMenu();
          }
          // expand new menuItemHasChildren
          menuItemHasChildren.classList.add("active");
          const subMenu = menuItemHasChildren.querySelector(".sub-menu");
          subMenu.style.maxHeight = subMenu.scrollHeight + "px";
        }
      }
  });
  function collapseSubMenu(){
    navMenu.querySelector(".menu-item-has-children.active .sub-menu")
    .removeAttribute("style");
    navMenu.querySelector(".menu-item-has-children.active")
    .classList.remove("active");
  }
  function resizeFix(){
     // if navMenu is open ,close it
     if(navMenu.classList.contains("open")){
      toggleNav();
     }
     // if menuItemHasChildren is expanded , collapse it
     if(navMenu.querySelector(".menu-item-has-children.active")){
          collapseSubMenu();
     }
  }

  window.addEventListener("resize", function(){
     if(this.innerWidth > mediaSize){
      resizeFix();
     }
  });

})();

// compose modal
// Get the modal
var composeModal = document.getElementById("composeModal");

// Get the button that opens the modal
var composeBtn = document.getElementById("composeBtn");

// Get the <span> element that closes the modal
var composeClose = document.getElementsByClassName("composeClose")[0];

// When the user clicks the button, open the modal 
// composeBtn.onclick = function() {
//   composeModal.style.display = "block";
// }

// When the user clicks on <span> (x), close the modal
composeClose.onclick = function() {
  composeModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == composeModal) {
    composeModal.style.display = "none";
  }
}

// Compose Tags
var closebtns = document.getElementsByClassName("tag-close");
var i;

for (i = 0; i < closebtns.length; i++) {
  closebtns[i].addEventListener("click", function() {
    this.parentElement.style.display = 'none';
  });
}

$("#FileInput").on('change',function (e) {
  var labelVal = $(".title").text();
  var oldfileName = $(this).val();
      fileName = e.target.value.split( '\\' ).pop();

      if (oldfileName == fileName) {return false;}
      var extension = fileName.split('.').pop();

  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
      $(".filelabel i").removeClass().addClass('fa fa-file-image-o');
      $(".filelabel i, .filelabel .title").css({'color':'#208440'});
      $(".filelabel").css({'border':' 2px solid #208440'});
  }
  else if(extension == 'pdf'){
      $(".filelabel i").removeClass().addClass('fa fa-file-pdf-o');
      $(".filelabel i, .filelabel .title").css({'color':'red'});
      $(".filelabel").css({'border':' 2px solid red'});

  }
else if(extension == 'doc' || extension == 'docx'){
  $(".filelabel i").removeClass().addClass('fa fa-file-word-o');
  $(".filelabel i, .filelabel .title").css({'color':'#2388df'});
  $(".filelabel").css({'border':' 2px solid #2388df'});
}
  else{
      $(".filelabel i").removeClass().addClass('fa fa-file-o');
      $(".filelabel i, .filelabel .title").css({'color':'black'});
      $(".filelabel").css({'border':' 2px solid black'});
  }

  if(fileName ){
      if (fileName.length > 10){
          $(".filelabel .title").text(fileName.slice(0,4)+'...'+extension);
      }
      else{
          $(".filelabel .title").text(fileName);
      }
  }
  else{
      $(".filelabel .title").text(labelVal);
  }
});