$(document).ready(function() {
  // Automatically set height;//

  //sticky-nav//
  $(window).scroll(function() {
    var header = $('.navigation');

    $(window).scroll(function() {
      var scroll = $(window).scrollTop();
      if (scroll >= 50) {
        header.addClass('nav-sticky');
      } else {
        header.removeClass('nav-sticky');
      }
    });
  });

  //smooth Scrolling
  $(document).ready(function() {
    $('a').on('click', function(event) {
      if (this.hash !== '') {
        event.preventDefault();
        var hash = this.hash;

        $('html, body').animate(
          {
            scrollTop: $(hash).offset().top
          },
          600,
          function() {
            window.location.hash = hash;
          }
        );
      }
    });
  });

  //Parallax//
  $(window).scroll(function() {
    parallax();
  });

  function parallax() {
    var scroll = $(window).scrollTop();
    var screenWidth = $(window).width();

    if (screenWidth <= 768) {
      $('.parallax-bg').css('top', -2100 + scroll * 0.5 + 'px');
    } else {
      $('.parallax-bg').css('top', -1400 + scroll * 0.5 + 'px');
    }
  }

  //Modal//
  $('.get-started').click(function() {
    $('.get-started-modal').fadeIn('fast');
    $('.login-modal').fadeOut('fast');
    $('body').css('overflow', 'hidden');
  });

  $('.login').click(function() {
    $('.login-modal').fadeIn('fast');
    $('.get-started-modal').fadeOut('fast');
    $('body').css('overflow', 'hidden');
  });

  $('.close').click(function() {
    $('.get-started-modal').fadeOut('fast');
    $('.login-modal').fadeOut('fast');
    $('#sent').fadeOut('fast');
    $('body').css('overflow', 'visible');
  });

  //sent
  $('.sent').on('click', function(e) {
    $('#sent').show();
    e.preventDefault();
  });

  $('.submit').on('click', function(e) {
    e.preventDefault();
    $('#success').show();
    $('#success')
      .delay(4000)
      .fadeOut();

    var parentForm = $(this).closest('form');
    parentForm.trigger('reset');
  });

  // disabled Submit button
  function submitState(el) {
    $.validator.messages.required = '';
    const $form = $(el);
    const $requiredInputs = $form.find('.input-field');
    const $submit = $form.find('.submit');

    $form.validate({
      errorPlacement: function(error, element) {}
    });

    $submit.attr('disabled', 'disabled');

    $requiredInputs.keyup(function() {
      if ($form.valid() && $requiredInputs.valid()) {
        $form.find('.submit').removeAttr('disabled');
      } else {
        $submit
          .attr('disabled', 'disabled')
          .attr('title', 'fill in all required fields');
      }
    });
  }

  // apply to each form element individually
  submitState('#contact_us');
  submitState('#log_in');
  submitState('#sign_up_user');

  setTimeout(() => {
    var cardMaxHeight = 0;
    $('.hero-card').each((index, el) => {
      if ($(el).height() > cardMaxHeight) {
        cardMaxHeight = $(el).height();
      }
    });
    $('.hero-card').height(cardMaxHeight);
    // console.log(cardMaxHeight);
  }, 100);

  /* Hero Slider : Init */
  // Setup the right target class on launch;
  var targetClass;
  var sliderFirstChild = $('.slide-wrapper .slide').first();
  if (/Edge/.test(navigator.userAgent)) {
    targetClass = 'edge-active';
  } else {
    targetClass = 'active';
  }
  sliderFirstChild.addClass(targetClass);

  sliderInterval = setInterval(() => {
    nextHeroSlider();
  }, 5000);

  // $('.--next').on('click', function() {
  //   nextHeroSlider($(this));
  //   clearInterval(sliderInterval);
  // });

  function nextHeroSlider() {
    // Select and find the current active + select next;
    var slideActive = $('.slide-wrapper').find('.' + targetClass);
    var nextSlide = slideActive.next();

    if (nextSlide.length <= 0) {
      resetToStart();
      return;
    }

    // Fold the current active and remove its active class;
    if (targetClass !== 'edge-active') {
      slideActive.addClass('fold');
    }
    slideActive.removeClass('unfold');
    slideActive.removeClass(targetClass);

    // Add targetClass class to next slide;
    nextSlide.addClass(targetClass);

    // Select and find the current active + select next;
    var cardActive = $('.hero-card-wrapper').find('.' + targetClass);
    var nextCard = cardActive.next();
    cardActive.removeClass(targetClass);
    nextCard.addClass(targetClass);
  }

  // /* Hero Slider: Prev */
  // $('.--prev').on('click', function() {
  //   prevHeroSlider($(this));
  //   clearInterval(sliderInterval);
  // });

  function prevHeroSlider() {
    // Select and find the current active + select next;
    var slideActive = $('.slide-wrapper').find('.' + targetClass);
    var prevSlide = slideActive.prev();

    // Remove active and fold the current active;
    slideActive.removeClass(targetClass);
    slideActive.removeClass('fold');

    // Unfold the targetted previous + activate;
    prevSlide.addClass('unfold');
    prevSlide.addClass(targetClass);

    // Select and find the current active + select next;
    var cardActive = $('.hero-card-wrapper').find('.' + targetClass);
    var prevCard = cardActive.prev();
    cardActive.removeClass(targetClass);
    prevCard.addClass(targetClass);
  }

  function resetToStart() {
    var allSlides = $('.slide-wrapper > .slide');

    allSlides.each(function(index) {
      el = $(this);
      if (index == 0) {
        el.addClass('unfold');
        el.addClass('active');
        el.removeClass('fold');
      } else {
        el.addClass('unfold');
        el.removeClass('fold');
        el.removeClass('active');
      }
    });
  }

  $('.slide-controls button').on('click', function() {
    var target = $(this).attr('target');
    var targetSlide = $('.slide-wrapper .slide-' + target);
    var targetSiblings = targetSlide.siblings();

    var s1 = $('.slide-wrapper .slide-1');
    var s2 = $('.slide-wrapper .slide-2');
    var s3 = $('.slide-wrapper .slide-3');

    targetSlide.addClass('active');
    targetSlide.addClass('unfold');
    targetSlide.removeClass('fold');

    targetSiblings.each(function() {
      $(this).removeClass('active');
    });

    if (target == 1) {
      targetSiblings.each(function() {
        $(this).addClass('unfold');
        $(this).removeClass('fold');
      });
    } else if (target == 2) {
      s1.removeClass('unfold');
      s1.addClass('fold');
    } else if (target == 3) {
      s1.removeClass('unfold');
      s1.addClass('fold');
      s2.removeClass('unfold');
      s2.addClass('fold');
    }

    clearInterval(sliderInterval);
  });

  const slider = document.querySelector('.testimonial-inner');
  let isDown = false;
  let startX;
  let scrollLeft;

  slider.addEventListener('mousedown', e => {
    isDown = true;
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
  });
  slider.addEventListener('mouseleave', () => {
    isDown = false;
  });
  slider.addEventListener('mouseup', () => {
    isDown = false;
  });
  slider.addEventListener('mousemove', e => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 2; //scroll-fast
    slider.scrollLeft = scrollLeft - walk;
  });

  //Marketing Slider//
  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 'auto',
    freeMode: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    }
  });
});
