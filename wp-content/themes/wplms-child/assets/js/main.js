function activate() {
	document.head.insertAdjacentHTML("beforeend", `
<style>
	.time-picker {
		position: fixed;
		display: inline-block;
		padding: 5px;
		border: 1px solid #1783b133;
		z-index: 99999;
		background: #EAEFF4;
		border-radius: 6px;
		margin-left: -30px;
	}

    .time-pickable {
      width: 80px;
      text-align: center;
    }

	.time-picker__select {
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		outline: none;
		text-align: center;
		border: 1px solid #dddddd;
		border-radius: 6px;
		padding: 6px 10px;
		background: #ffffff;
		cursor: pointer;
		font-family: 'Heebo', sans-serif;
	}


    a.rtxt {
		text-align: center;
		text-decoration: underline;
		color: #585858;
		cursor: pointer;
		margin-top: -2px;
		margin-bottom: 15px;
	}

	.chckdesign {
		border-radius: 50%;
		margin: 12px auto 0;
		cursor: pointer;
		width: 50px;
		text-decoration: none;
		height: 50px;
		display: flex;
		justify-content: center;
		align-items: center;
		font: 900 14px/16px Roboto;
		font-size: 14px;
		border: 1px solid #1783b1 !important;
		color: #1783b1 !important;
	}

	.prlt {
		position: absolute;
		margin-left: 50px;
		margin-top: 10px;
		color: #1783b1;
	}

	button.btn.mdlallbtn {
		background: #83c11f;
		color: #fff;
		padding: 10px 60px 10px 60px;
		border-radius: 20px;
	}

	.modal-footer {
		padding: 15px;
		text-align: center;
		border-top: 1px solid #e5e5e5;
	}

</style>
	`);

	document.querySelectorAll(".time-pickable").forEach(timePickable => {
		let activePicker = null;

		timePickable.addEventListener("focus", () => {
			if (activePicker) return;

			activePicker = show(timePickable);

			const onClickAway = ({ target }) => {
				if (
					target === activePicker
					|| target === timePickable
					|| activePicker.contains(target)
				) {
					return;
				}

				document.removeEventListener("mousedown", onClickAway);
				document.body.removeChild(activePicker);
				activePicker = null;
			};

			document.addEventListener("mousedown", onClickAway);
		});
	});
}

function show(timePickable) {
	const picker = buildPicker(timePickable);
	const { bottom: top, left } = timePickable.getBoundingClientRect();

	picker.style.top = `${top}px`;
	picker.style.left = `${left}px`;

	document.body.appendChild(picker);

	return picker;
}

function buildPicker(timePickable) {
	const picker = document.createElement("div");
	const hourOptions = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12].map(numberToOption);
	const minuteOptions = [0].map(numberToOption);

	picker.classList.add("time-picker");
	picker.innerHTML = `
		<select class="time-picker__select">
			${hourOptions.join("")}
		</select>
		:
		<select class="time-picker__select">
			${minuteOptions.join("")}
		</select>
		<select class="time-picker__select">
			<option value="am">am</option>
			<option value="pm">pm</option>
		</select>
	`;

	const selects = getSelectsFromPicker(picker);

	selects.hour.addEventListener("change", () => timePickable.value = getTimeStringFromPicker(picker));
	selects.minute.addEventListener("change", () => timePickable.value = getTimeStringFromPicker(picker));
	selects.meridiem.addEventListener("change", () => timePickable.value = getTimeStringFromPicker(picker));

	if (timePickable.value) {
		const { hour, minute, meridiem } = getTimePartsFromPickable(timePickable);

		selects.hour.value = hour;
		selects.minute.value = minute;
		selects.meridiem.value = meridiem;
	}

	return picker;
}

function getTimePartsFromPickable(timePickable) {
	const pattern = /^(\d+):(\d+) (am|pm)$/;
	const [hour, minute, meridiem] = Array.from(timePickable.value.match(pattern)).splice(1);

	return {
		hour,
		minute,
		meridiem
	};
}

function getSelectsFromPicker(timePicker) {
	const [hour, minute, meridiem] = timePicker.querySelectorAll(".time-picker__select");

	return {
		hour,
		minute,
		meridiem
	};
}

function getTimeStringFromPicker(timePicker) {
	const selects = getSelectsFromPicker(timePicker);

	return `${selects.hour.value}:${selects.minute.value} ${selects.meridiem.value}`;
}

function numberToOption(number) {
	const padded = number.toString().padStart(2, "0");

	return `<option value="${padded}">${padded}</option>`;
}

activate();


// Show time and remove
jQuery('.days1').click(function () {
  $('.rmv1').show();  
  $(".days1").addClass("chckdesign");          
});

jQuery('.days2').click(function () {
  $('.rmv2').show();
  $(".days2").addClass("chckdesign");             
});

jQuery('.days3').click(function () {
  $('.rmv3').show();
  $(".days3").addClass("chckdesign");             
});

jQuery('.days4').click(function () {
  $('.rmv4').show();
  $(".days4").addClass("chckdesign");             
});

jQuery('.days5').click(function () {
  $('.rmv5').show();
  $(".days5").addClass("chckdesign");             
});

jQuery('.days6').click(function () {
  $('.rmv6').show();
  $(".days6").addClass("chckdesign");             
});

jQuery('.days7').click(function () {
  $('.rmv7').show();
  $(".days7").addClass("chckdesign");             
});



// // $('.removetxt').click(function () {
// $('.tmwdth').val('');            
// // });


// Hide time and remove
jQuery('.allr1').click(function () {
  $('.rmv1').hide();  
  $(".days1").removeClass("chckdesign"); 
  $('.txtc1').val('');                     
});

jQuery('.allr2').click(function () {
  $('.rmv2').hide();
  $(".days2").removeClass("chckdesign");  
  $('.txtc2').val('');                               
});

jQuery('.allr3').click(function () {
  $('.rmv3').hide();
  $(".days3").removeClass("chckdesign");  
  $('.txtc3').val('');                               
});

jQuery('.allr4').click(function () {
  $('.rmv4').hide();
  $(".days4").removeClass("chckdesign"); 
  $('.txtc4').val('');                                
});

jQuery('.allr5').click(function () {
  $('.rmv5').hide();
  $(".days5").removeClass("chckdesign");   
  $('.txtc5').val('');                              
});

jQuery('.allr6').click(function () {
  $('.rmv6').hide();
  $(".days6").removeClass("chckdesign");      
  $('.txtc6').val('');                           
});

jQuery('.allr7').click(function () {
  $('.rmv7').hide();
  $(".days7").removeClass("chckdesign");  
  $('.txtc7').val('');                               
});


jQuery(document).ready(function($) {
    $('.menu-list li a').click(function(e) {
  
      $('.menu-list li.activemenu').removeClass('activemenu');
  
      var $parent = $(this).parent();
      $parent.addClass('activemenu');
      e.preventDefault();
    });
  });

jQuery(document).ready(function($){
	$('#ar-sidebar-btn').click(function(){
		$('.ar-sidebar').toggleClass('visible');
	});
});

  // Slick version 1.5.8
//Js
// slider
jQuery(document).ready(function(){
	jQuery('.your-class').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: false,
		autoplaySpeed: 2000,
		responsive: [
			{
			  breakpoint: 768,
			  settings: {
				arrows: true,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 2
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				arrows: true,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 1
			  }
			}
		  ]
	});
  });