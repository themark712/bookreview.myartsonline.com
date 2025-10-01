
(function ($) {

  "use strict";

  // MENU
  $('.navbar-collapse a').on('click', function () {
    $(".navbar-collapse").collapse('hide');
  });

  // CUSTOM LINK
  $('.smoothscroll').click(function () {
    var el = $(this).attr('href');
    var elWrapped = $(el);
    var header_height = $('.navbar').height();

    scrollToDiv(elWrapped, header_height);
    return false;

    function scrollToDiv(element, navheight) {
      var offset = element.offset();
      var offsetTop = offset.top;
      var totalScroll = offsetTop - 0;

      $('body,html').animate({
        scrollTop: totalScroll
      }, 300);
    }
  });

  $('.owl-carousel').owlCarousel({
    center: true,
    loop: true,
    margin: 30,
    autoplay: true,
    responsiveClass: true,
    responsive: {
      0: {
        items: 2,
      },
      767: {
        items: 3,
      },
      1200: {
        items: 4,
      }
    }
  });

})(window.jQuery);

function getCountries() {
  const countries=[];

  fetch('https://restcountries.com/v3.1/all?fields=name')
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {

      for (var i = 0; i < data.length; i++) {
        if (data[i]['name']['common'] != 'United States') {
          countries.push(String(data[i]['name']['common']));
        }
      }
      countries.sort();
      countries.unshift('United States');
    })
    .catch(error => {
      console.error('Error:', error);
    });
  return countries;
}
