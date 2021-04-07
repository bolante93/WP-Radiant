jQuery(($) => {
  // Side Nav Float
  $(window).scroll(function () {
    var scrollVal = $(window).scrollTop();
    var sideNavPos = $('.side-nav');
    var sideNavContent = $('.side-nav-content');

    if (scrollVal >= sideNavContent.position().top) {
      sideNavContent.addClass('left-margin');
      sideNavPos.addClass('float');
    } else {
      sideNavContent.removeClass('left-margin');
      sideNavPos.removeClass('float');
    }
  });

  //Nav-Link Smooth Scroll
  $('.nav-link').on('click', function () {
    var href = $(this).attr('href');
    $('html, body').animate(
      {
        scrollTop: $(href).offset().top + -50,
      },
      500
    );
    return false;
  });


  // Copy Function
  $('.rgb').on('click', function (e) {
    copyToClipboard($(this), 'rgb');
  });

  $('.hex').on('click', function () {
    copyToClipboard($(this), 'hex');
  });

  function copyToClipboard(el, type) {
    // Get code;
    var codeEl = el.find('.code');

    // Create Input;
    el.append(document.createElement('input'));

    // Compose value;
    var tempInput = el.find('input');
    var copyValue = '';
    if (type === 'hex') {
      copyValue = '#' + codeEl.text();
    } else {
      copyValue = 'rbg(' + codeEl.text() + ')';
      copyValue = copyValue.replaceAll(' ', ',');
    }
    
    // Set input Value;
    tempInput.val(copyValue);
   
    //Select All value
    tempInput.select();
    
    // Document Copy CMD;
    document.execCommand('copy');

    // Remove temp input;
    tempInput.remove();
  }
});
