/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
(function($) {
  $.expr[":"].onScreen = function(elem) {
    var $window = $(window);
    var viewport_top = $window.scrollTop()
    var viewport_height = $window.height()
    var viewport_bottom = viewport_top + viewport_height
    var $elem = $(elem)
    var top = $elem.offset().top
    var height = $elem.height()
    var bottom = top + height

    return (top >= viewport_top && top < viewport_bottom) ||
           (bottom > viewport_top && bottom <= viewport_bottom) ||
           (height > viewport_height && top <= viewport_top && bottom >= viewport_bottom)
  }
})(jQuery);

jQuery(document).ready(function($){
    $(window).scroll( function (){
         $('.animate').filter(":onScreen").not('.load').each(function(i){ 
            var $this=$(this);
                 var ind = i * 100;
                 var docViewTop = $(window).scrollTop();
                 var docViewBottom = docViewTop + $(window).height();
                 var elemTop = $this.offset().top;      
                     if (docViewBottom >= elemTop) { 
                         setTimeout(function(){ 
                              $this.trigger('load');
                          }, ind);
                         }      
             });
            //End function 
    });
    $('.animate').on('load',function(){
        $(this).addClass('load');
    });
    $('.form_field').click(function(){ 
        $(this).removeAttr('style');
    });
});

jQuery(document).ready(function($){  

  $('.v_parallax_block').each(function(){
      var $bgobj = $(this);
      var i = parseInt($bgobj.attr('data-scroll'));
      var rev = parseInt($bgobj.attr('data-rev'));
      var ptop = $bgobj.parent().position().top;
      var adjust = parseInt($bgobj.attr('data-adjust'));
      var height = $bgobj.height();

      var v_parallax_block_height = $bgobj.find('.parallax_content').height();
      if(height<v_parallax_block_height)
        height = v_parallax_block_height;


      if(rev == 2){
        
      }else{
        var $parent = $bgobj.parent().parent();
        if($parent.hasClass('stripe')){
            $parent.css('height',height+'px');
        }
      }
      
      $(window).scroll(function(e) {
          e.preventDefault();
          var $window = jQuery(window);
          var yPos = Math.round((($window.scrollTop())/i));
          var coords;
           if(rev != undefined){
               if(rev == 2){
                yPos = Math.round((($window.scrollTop()-ptop)/i));
                $bgobj.parent().css('-webkit-transform', 'translateY('+yPos+'px)');
                $bgobj.parent().css('transform', 'translateY('+yPos+'px)');
               }else if(rev == 1){
                  yPos = yPos  - adjust;
                  coords = '50% '+yPos+ 'px';
                  $bgobj.css('background-position', coords);
                }else{
                  yPos =  adjust - yPos;
                  coords = '50% '+yPos + 'px';//console.log(coords);
                  $bgobj.css('background-position', coords);
                }
            }
      }); 
    });   

  $('section.stripe').each(function(){  
      var style = $(this).find('.v_column.stripe_container .v_module').attr('data-class');
      if(style){style='stripe '+style;
          $(this).find('.v_column.stripe .v_module').removeAttr('data-class');
          $(this).attr('class',style);
      }
      var style = $(this).find('.v_column.stripe .v_module').attr('data-class');
      if(style){style='stripe '+style;
          $(this).find('.v_column.stripe .v_module').removeAttr('data-class');
          $(this).attr('class',style);
      }
  });
}); 

jQuery(document).ready(function($){
    
$('.nav-tabs').each(function(){
  if(!$(this).find('li').hasClass('active')){
      $(this).find('a:first').tab('show');
      $(this).find('li:first').addClass('active');
  }
}); 

$('.nav-tabs a').click(function (e) {
        e.preventDefault();

    if($(this).parent().parent().find('li a[style]').length){
        let style = $(this).parent().parent().find('li a[style]').attr('style');
        $(this).parent().parent().find('li a').attr('style','');
        $(this).attr('style',style);
    }
    if((typeof $().tab == 'function')){
      $(this).tab('show');
    }
});
$('.accordion').each(function(){
  if($(this).hasClass('load_first')){
    $(this).find('.accordion-group:first-child').addClass('check_load_first');
    $(this).find('.accordion-group:first-child .accordion-toggle').trigger('click');
  }
});
jQuery(document).ready(function($){
  if($('.accordion-group.panel').is(':not(.check_load_first)')){
    $('.accordion').on('shown.bs.collapse', function () {
        var offset = $(this).find('.collapse.in').prev('.accordion-heading');
        if(offset) {
            $('html,body').animate({
                scrollTop: $(offset).offset().top -150
            }, 500);
        }
    });
  }
});

$('.image_slider').each(function(){
  $(this).flexslider({
    prevText: "<i class='icon-arrow-1-left'></i>",
    nextText: "<i class='icon-arrow-1-right'></i>",
  });
});

if ($.isFunction($.fn.magnificPopup)) {
  $('.ajax-popup-link').magnificPopup({
      type: 'ajax',
      alignTop: true,
      fixedContentPos: true,
      fixedBgPos: true,
      overflowY: 'auto',
      closeBtnInside: true,
      preloader: false,
      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-zoom-in'
  });

  jQuery('.pop').magnificPopup({
    type: 'image',
    gallery:{
      enabled:true
    }
  });

  jQuery('.gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      titleSrc: function(item) {
        return item.el.attr('title');
      }
    }
  });
};
$('.knob').each(function(){
    var $this = $(this).find('.dial');
    var myVal = $this.val();
    $this.knob({
        draw : function () {
              // "tron" case
            if(this.$.data('skin') == 'tron') {
                var a = this.angle(this.cv)  // Angle
                , sa = this.startAngle          // Previous start angle
                , sat = this.startAngle         // Start angle
                , ea                            // Previous end angle
                , eat = sat + a                 // End angle
                , r = true;

            this.g.lineWidth = this.lineWidth;
            this.o.cursor
                && (sat = eat - 0.3)
                && (eat = eat + 0.3);

            if (this.o.displayPrevious) {
                ea = this.startAngle + this.angle(this.value);
                this.o.cursor
                    && (sa = ea - 0.3)
                    && (ea = ea + 0.3);
                this.g.beginPath();
                this.g.strokeStyle = this.previousColor;
                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                this.g.stroke();
            }

            this.g.beginPath();
            this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
            this.g.stroke();

            this.g.lineWidth = 2;
            this.g.beginPath();
            this.g.strokeStyle = this.o.fgColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
            this.g.stroke();

            return false;
        }
  }
  });
   $({
     value: 0
  }).animate({

     value: myVal
  }, {
     duration: 2400,
     easing: 'swing',
     step: function () {
         $this.val(Math.ceil(this.value)).trigger('change');

     }
  })
  });

});

//AJAX CONTACT FORM
jQuery(document).ready(function ($) {
  // SUBSCRIPTION FORM AJAX HANDLE
 $( 'body' ).delegate( '.form .form_submit', 'click', function(event){
    event.preventDefault();
    var parent = $(this).parent();

    var $response= parent.find(".response");
    var nonce =  $response.attr('data-security');
    var error= '';
    var to = []
    var data = [];
    var label = [];
    var regex = [];
    var attachment =[];
    var to = parent.attr('data-to');
    var subject = parent.attr('data-subject');
    regex['email'] = /^([a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,4}$)/i;
    regex['phone'] = /[A-Z0-9]{7}|[A-Z0-9][A-Z0-9-]{7}/i;
    regex['numeric'] = /^[0-9]+$/i;
    regex['captcha'] = /^[0-9]+$/i;
    regex['required'] = /([^\s])/;
    var i=0;
    
    parent.find('.form_field').each(function(){
        i++;
        var validate=$(this).attr('data-validate');
        var value = $(this).val();
        if($(this).attr('type') == 'checkbox'){
          if($(this).prop("checked")){
            value = $(this).val();
          }else{
            value = 0;
          }
        }
        if(!value.match(regex[validate])){
            error += ' '+vibe_shortcode_strings.invalid_string+$(this).attr('placeholder');
            $(this).css('border-color','#e16038');
        }else{
            data[i]=value;
            label[i]=$(this).attr('placeholder');
            if(parent.hasClass('isocharset')){
              label[i]=encodeURI(label[i]);
              data[i]=encodeURI(value);
            }
            
        }
        if(validate === 'captcha' && error === ""){
            var $num = $(this).attr('id');
            var $sum=$(this).closest('.math-sum');
            var num1 = parseInt($('#'+$num+'-1').text());
            var num2 = parseInt($('#'+$num+'-2').text());
            var sumval = parseInt($(this).val());
            if( sumval != (num1+num2))
              error += vibe_shortcode_strings.captcha_mismatch;
        }
    });
    var attachment_id = parent.find('.attachment_ids').val();
    attachment_id = parseInt(attachment_id);
    if( typeof(attachment_id) == 'number' ){
      attachment[0] = parent.find('.form_upload_label').text();
      attachment[1] = attachment_id;
    }
    
  if (error !== "") {
    $response.fadeIn("slow");
    $response.html("<span style='color:#D03922;'>"+vibe_shortcode_strings.error_string+" " + error + "</span>");
  } else {

    if(parent.attr('data-event')){
        var postevent = new CustomEvent(parent.attr('data-event'), { "detail": {'data':data,'label':label,'attachment':attachment}});
        document.dispatchEvent(postevent);
    }
    if(parent.attr('data-to') && parent.attr('data-to').length){
        $response.css("display", "block");
        $response.html("<span style='color:#0E7A00;'>"+vibe_shortcode_strings.sending_mail+"... </span>");
        $response.fadeIn("slow");
        setTimeout(function(){sendmail(to,subject,data,label,parent,nonce,attachment);}, 2000);
    }
    
  }
    
  return false;
  });

  function sendmail(to,subject,formdata,labels,parent,nonce,attachment) { 
    var $response= parent.find(".response");
    var isocharset = false;
    
    if(parent.hasClass('isocharset'))
      isocharset=true;

    $.ajax({
          type: "POST",
          url: ajaxurl,
                data: {   action: 'vibe_form_submission', 
                          to: to,
                          subject : subject,
                          data:JSON.stringify(formdata),
                          label:JSON.stringify(labels),
                          isocharset:isocharset,
                          attachment:attachment,
                          security:nonce
                      },
          cache: false,
          success: function (html) {
              console.log(html);
              $response.fadeIn("slow");
              $response.html(html);
              if(html.indexOf('<span') === 0) {
                parent.find('textarea').val('');
                parent.find('input[type="text"]').val('');
              }
              setTimeout(function(){$response.fadeOut("slow");}, 10000);
          }
      });
  }
       
});

jQuery(document).load(function($){
  $('.mejs-container').each(function(){
    $(this).addClass('mejs-mejskin');
  });  
});


jQuery(document).ready(function ($) {
  function vibe_carousel(){
    if ($.isFunction($.fn.flexslider)) {

      $('.image_slider').each(function(){
        $(this).flexslider({
          prevText: "<i class='icon-arrow-1-left'></i>",
          nextText: "<i class='icon-arrow-1-right'></i>",
        });
      });
      
      $('.vibe_carousel.flexslider').each(function(){
        var $this = $(this);
        if($(this).find('.slides').length){
          var dnav = parseInt($this.attr('data-directionnav'));
          if (typeof dnav === typeof undefined || dnav === false) {
              dnav = 1;
          }
          $this.flexslider({
            animation: "slide",
            rtl: false,
            controlNav: parseInt($this.attr('data-controlnav')),
            directionNav: dnav,
            animationLoop: parseInt($this.attr('data-autoslide')),
            slideshow: parseInt($this.attr('data-autoslide')),
            itemWidth:parseInt($this.attr('data-block-width')),
            itemMargin:30,
            minItems:parseInt($this.attr('data-block-min')),
            maxItems:parseInt($this.attr('data-block-max')),
            prevText: "<i class='icon-arrow-1-left'></i>",
            nextText: "<i class='icon-arrow-1-right'></i>",
            move:parseInt($this.attr('data-block-move')),
            start: function(slider){
              $(slider).removeClass('loading');
            },
            before:function(slider){
              console.log(slider);
            },
            after: function(slider){
              console.log(slider);
            }
          });
        }
        if($this.hasClass('woocommerce')){
          $this.flexslider({
            selector: ".products > li",
            animation: "slide",
            rtl: false,
            controlNav: false,
            directionNav: true,
            animationLoop: false,
            slideshow: false,
            minItems:1,
            maxItems:1,
            itemWidth:100,
            itemMargin:0,
            prevText: "<i class='icon-arrow-1-left'></i>",
            nextText: "<i class='icon-arrow-1-right'></i>",
          });
        }
        if($this.find('.woocommerce').length){
          $this.find('.woocommerce').flexslider({
            selector: ".products > li",
            animation: "slide",
            controlNav: false,
            rtl: false,
            directionNav: true,
            animationLoop: false,
            slideshow: false,
            minItems:1,
            maxItems:1,
            itemWidth:100,
            itemMargin:0,
            prevText: "<i class='icon-arrow-1-left'></i>",
            nextText: "<i class='icon-arrow-1-right'></i>",
          });
        }
      });
    }
  }
  vibe_carousel();
  if ( window.elementorFrontend && window.elementorFrontend.hooks && window.elementorFrontend.hooks.hasOwnProperty('addAction')) {
    window.elementorFrontend.hooks.addAction( 'init', function() {
        //run when init no need
    });
    window.elementorFrontend.hooks.addAction( 'frontend/element_ready/widget', function( $scope ) {
        vibe_carousel();
    });
  }
});


/*======= FILTERABLE=======*/

jQuery(window).load(function ($) {
 var $ = jQuery;
 $('.custom_post_filterable').each(function(){
        var $container = $(this).find('.filterableitems_container'),
      $filtersdiv = $(this).find('.vibe_filterable'),
        $checkboxes = $(this).find('.vibe_filterable a');
    
    if(jQuery.fn.imagesLoaded){
      $container.imagesLoaded( function(){  
        $container.isotope({
          itemSelector: '.filteritem',
          layoutMode: 'fitRows',
          fitRows: {
            gutter: 10
          }
        }); 
      });
    } else{
      $container.isotope({
          itemSelector: '.filteritem',
          layoutMode: 'fitRows',
          fitRows: {
            gutter: 10
          }
        });
    }    
  
    $checkboxes.click(function(event){
      event.preventDefault();
      var me = $(this);
      $filtersdiv.find('.active').removeClass();
      var filters = me.attr('data-filter');
      me.parent().addClass('active');
      $container.isotope({filter: filters});
    });
   
   $('.vibe_filterable a:first').trigger('click');
   $('.vibe_filterable a:first').parent().addClass('active');
 });
});

jQuery(window).load(function ($) { 


jQuery('.grid.masonry').each(function($){

var $container = jQuery(this);
$container.imagesLoaded( function(){ 

      var width= parseInt($container.attr('data-width'));
      var gutter= parseInt($container.attr('data-gutter'));
        if(jQuery('body').hasClass('rtl')){
            $container.isotope({
                itemSelector: '.grid-item',
                columnWidth: width,
                gutterWidth: gutter,
                layoutMode: 'masonry',
                isRTL:true,
          });
        }else{
            $container.isotope({
                itemSelector: '.grid-item',
                columnWidth: width,
                gutterWidth: gutter,
                layoutMode: 'masonry',
            });  
        }
      

        });
    });
});

jQuery(document).ready(function ($) {
    
    $('.fitvids').each(function(){
      $(this).fitVids();
    });

    if($('.vibe_grid').length && $('.vibe_grid').hasClass('inifnite_scroll')){
        
        var $this= $('.vibe_grid.inifnite_scroll:not(.loaded)');
        var end = $this.parent().find('.end_grid');
        var load = $this.parent().find('.load_grid');
        var args = $this.find('.wp_query_args').html();
        var max = parseInt($this.find('.wp_query_args').attr('data-max-pages'));
        
        var top = $('.vibe_grid.inifnite_scroll:not(.loaded) li:last').offset().top -500;
        var rel = parseInt($('.vibe_grid.inifnite_scroll:not(.loaded)').attr('data-page')); 
        
     $(window).data('ajaxready', true).scroll(function(e) {
         
           if ($(window).data('ajaxready') == false) return;
          
          if(!$('.vibe_grid.inifnite_scroll').hasClass('loaded'))
            top = $('.vibe_grid.inifnite_scroll:not(.loaded) li:last').offset().top -500;
          else
              rel = max;

         if ($(window).scrollTop() >= top && rel < max ) {
            
        $(window).data('ajaxready', false);
        
       
        $.ajax({
                type: "POST",
                url: ajaxurl,
                      data: {action: 'grid_scroll', 
                                args: args,
                                page: rel
                            },
                cache: false,
                success: function (html) {
                         
                          if(html){
                              rel++;
                              $this.attr('data-page',rel);
                              if($this.hasClass('masonry')){
                                  $('.vibe_grid.inifnite_scroll .grid.masonry').isotope('insert',$(html));
                                  $('.vibe_grid.inifnite_scroll .grid.masonry').imagesLoaded( function(){
                                      $('.vibe_grid.inifnite_scroll .grid.masonry').isotope('layout');
                                  });
                              }else{
                                $('.vibe_grid.inifnite_scroll:not(.loaded)>.grid>li:last').after(html); 
                              } 
                          } 
                           $(window).data('ajaxready', true);
                           $('body').trigger('grid_scroll_done');
                }
            }); 
            }else{
             if(rel == max){
                             end.fadeIn(200);
                                load.fadeOut(200);
                              $this.addClass('loaded');
             }     
            }
        });
    }
});

jQuery(document).ready(function($){
    // Uploading files
  var zip_uploader;
  jQuery('#upload_zip_button').on('click', function( event ){
      event.preventDefault();
      var url = $(this).attr('data-admin-url')+'media-upload.php?type=upload&tab=upload&TB_iframe=1';
      tb_show('Upload ZIP package', url );
    });
});

jQuery('body').undelegate('.submit_registration_form','click');
jQuery('body').delegate('.submit_registration_form','click',function(event){
    var $ = jQuery;
    event.preventDefault();
    window.onbeforeunload = null;
    var $this = $(this);
    var parent = $this.closest('.wplms_registration_form');
    parent.find('.message').remove();
    if($this.hasClass('loading'))
        return;

    $('.field_error').each(function(){$(this).removeClass('field_error')});
    $this.addClass('loading');
    
    var settings = [];
    parent.find('input,textarea,select').each(function(){
        if($(this).is(':radio')){
            if($(this).is(':checked')){
                var data = {id:$(this).attr('name'),value: $(this).val()};
            }
        }else if($(this).is(':checkbox')){
          if($(this).is(':checked')){
              var data = {id:$(this).attr('name'),value: $(this).val()};
          }
        }else if($(this).is('select')){
            var data = {id:$(this).attr('name'),value: $(this).val()};
        }else if($(this).is('input')){
            var data = {id:$(this).attr('name'),value: $(this).val()};
        }else if($(this).is('textarea')){
          if($(this).hasClass('wp-editor-area') && $(this).attr('aria-hidden') == 'true'){
            var data = {id:$(this).attr('name'),value:tinyMCE.get($(this).attr('id')).getContent({format : 'raw'})};
          }else{
           var data = {id:$(this).attr('name'),value: $(this).val()};   
          }
        }
        if(data)
          settings.push(data);
    });
    var response='';
    if(typeof grecaptcha != 'undefined' && $('.g-recaptcha').length != 0){
      response = grecaptcha.getResponse();
      if(response.length == 0){
        parent.append('<div class="message">'+vibe_shortcode_strings.captcha_mismatch+'</div>');
        $this.removeClass('loading');
        return;
      }
    }

    $.ajax({
            type: "POST",
            url: ajaxurl,
            data: { action: 'wplms_register_user',
                    name : $this.parent().parent().closest('.wplms_registration_form').data('form-name'),
                    security: $('#bp_new_signup').val(),
                    settings:JSON.stringify(settings)    
                  },
            cache: false,
            success: function (html) {
                $this.removeClass('loading');
                parent.append(html);
                $('.field_error .message.error').click(function(){$(this).fadeOut(100);});
            }
    });
});


function init_vibe_iframe_content_popup(){
  jQuery('.vibe_iframe_content_popup').each(function(){
    var $this = jQuery(this);
     $this.magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade vibe_iframe_content_popup',
        removalDelay: 160,
        preloader: true,
        fixedContentPos: false
      });
  });
}
jQuery(document).ready(function(){
  init_vibe_iframe_content_popup();
  vscountdown();
});


let vscountdown = function(){
    jQuery('.wp-block-vibe-shortcodes-countdown').each(function(){

        clearInterval(timer_);
        let $this = jQuery(this);
        var vibetimer={
            'days':parseInt($this.find('.days .tenday').attr('data-num'))*10+parseInt($this.find('.days .day').attr('data-num')),
            'hours':parseInt($this.find('.hours .tenhour').attr('data-num'))*10+parseInt($this.find('.hours .hour').attr('data-num')),
            'minutes':parseInt($this.find('.minutes .tenmin').attr('data-num'))*10+parseInt($this.find('.minutes .min').attr('data-num')),
            'seconds':parseInt($this.find('.seconds .tensec').attr('data-num'))*10+parseInt($this.find('.seconds .sec').attr('data-num')),
        };

        function getupdatedtimer(){
            vibetimer.seconds = vibetimer.seconds - 1;

            if(vibetimer.seconds < 0){
                vibetimer.minutes = vibetimer.minutes - 1;
                vibetimer.seconds = 59;
            }
            if(vibetimer.minutes < 0){
                vibetimer.hours = vibetimer.hours - 1;
                vibetimer.minutes = 59;
            }
            if(vibetimer.hours < 0){
                vibetimer.days = vibetimer.days - 1;
                vibetimer.hours = 23;
            }
            if(vibetimer.days < 0){
                vibetimer.days = vibetimer.seconds = vibetimer.minutes = vibetimer.hours = 0;
            }
        }

        function flipTo(digit, n){
            var current = digit.attr('data-num');
            digit.attr('data-num', n);
            digit.find('.front').attr('data-content', current);
            digit.find('.back, .under').attr('data-content', n);
            digit.find('.flap').css('display', 'block');
            setTimeout(function(){
                digit.find('.base').text(n);
                digit.find('.flap').css('display', 'none');
            }, 350);
        }

        function jumpTo(digit, n){
            digit.attr('data-num', n);
            digit.find('.base').text(n);
        }

        function updateGroup(group, n, flip){
            var digit1 = $this.find( '.ten'+group);
            var digit2 = $this.find( '.'+group);
            n = String(n);
            if(n.length == 1) n = '0'+n;
            var num1 = n.substr(0, 1);
            var num2 = n.substr(1, 1);
            if(digit1.attr('data-num') != num1){
                if(flip) flipTo(digit1, num1);
                else jumpTo(digit1, num1);
            }
            if(digit2.attr('data-num') != num2){
                if(flip) flipTo(digit2, num2);
                else jumpTo(digit2, num2);
            }
        }

        function setTime(flip){
            getupdatedtimer();

            updateGroup('day', vibetimer.days, flip);
            updateGroup('hour', vibetimer.hours, flip);
            updateGroup('min', vibetimer.minutes, flip);
            updateGroup('sec', vibetimer.seconds, flip);
            if(vibetimer.days == 0 && vibetimer.hours == 0 && vibetimer.minutes == 0 && vibetimer.seconds == 0){
                clearInterval(timer_);
                jQuery('body').trigger('event');
            }
        }

        setTime(false);
        var timer_ = setInterval(function(){
            setTime(true);
        }, 1000);
    });
}