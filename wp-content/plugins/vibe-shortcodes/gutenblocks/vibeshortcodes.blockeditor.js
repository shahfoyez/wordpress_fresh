document.addEventListener('vibe_shortcodes_gutenblock_reload',function(event){
    let $ = jQuery;
    console.log(event.detail);

    debounce(function(){
        switch(event.detail){
            case 'tabs':
                $('#'+event.detail.id).each(function(){
                    if(!$(this).find('li').hasClass('active')){
                        $(this).find('a:first').tab('show');
                        $(this).find('li:first').addClass('active');
                    }
                }); 

                $('#'+event.detail.id+' a').click(function (e) {
                    e.preventDefault();
                    if((typeof $().tab == 'function')){
                        $(this).tab('show');
                    }
                });
            break;
            case 'accordion':
                $('#'+event.detail.id).each(function(){
                    if($(this).hasClass('load_first')){
                        $(this).find('.accordion-group:first-child').addClass('check_load_first');
                        $(this).find('.accordion-group:first-child .accordion-toggle').trigger('click');
                    }
                });

                if($('#'+event.detail.id+' .accordion-group.panel').is(':not(.check_load_first)')){
                    $('#'+event.detail.id).on('shown.bs.collapse', function () {
                        var offset = $(this).find('.collapse.in').prev('.accordion-heading');
                        if(offset) {
                            $('html,body').animate({
                                scrollTop: $(offset).offset().top -150
                            }, 500);
                        }
                    });
                }
            break;
            case 'counter':
            break;
            case 'countdown':
                vscountdown2();
            break;
            case 'knob':
                vsknob();
            break;
        }
    },300);
});

function debounce(func, wait, immediate) {
    var timeout;
    return function() {
        var context = this, args = arguments;
        var later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}


jQuery(document).ready(function($){
    setTimeout(function(){
    
    
        vscountdown2();
        vsknob();


    },3000);
});   

let vscountdown2 = function(){
    jQuery('.vibe_countdown').each(function(){

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
let vsknob = function(){

    jQuery('.knob').each(function(){
        var $this = jQuery(this).find('.dial');
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
       jQuery({
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
} 


   
