$('.toggle').click(function() {
  $(this).toggleClass('active');
  $("#side_nav").toggleClass('active');
  $(".nav_link_container").removeClass('active');
  $(".nav_link_container").children('.subMenu').slideUp(300);
  $("main").toggleClass('active');
});

// Handles navmenu links
$(".nav_link_container").click(function() {
  // Expands the entire sidenav, when a link is clicked
  if (!$("#side_nav").hasClass('active')) {
    $("#side_nav").addClass('active');
    $('.toggle').addClass('active');
  }

  if (!$("main").hasClass('active')) {
    $("main").addClass('active');
  }

  // Activate clicked link
  $(this).children('.subMenu').slideToggle(300);
  $(this).toggleClass('active');

  // Hides previous active elements
  if ($(this).siblings('.nav_link_container').hasClass('active')) {
    $(this).siblings('.nav_link_container').removeClass('active');
  }

  if ($(this).parent().siblings().children('.nav_link_container').hasClass('active')) {
    $(this).parent().siblings().children('.nav_link_container').removeClass('active');
    $(this).parent().siblings().children('.nav_link_container').children('.subMenu').slideUp(300);
  }

  $(this).siblings('.nav_link_container').children('.subMenu').slideUp(300);
});

// Makes sure that the submenu does not dissapear when a submenu link is clicked
$(".subMenu").click(function(e) {
  e.stopPropagation();
});

$(".avatar").click(function() {
  $(".userMenu").toggleClass('active');
});

$(".toggle-reply-form").click(function() {
  $(this).siblings('form').slideToggle(400);
  $(this).slideToggle(200);
});
