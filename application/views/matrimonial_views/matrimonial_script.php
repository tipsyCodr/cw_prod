
<script>
	/*$(document).ready(function(){
	  $('[data-toggle="tooltip"]').tooltip();
	});*/
	//Scroll back to top
	(function ($) {
		"use strict";
		$(document).ready(function () {
			"use strict";
			var progressPath = document.querySelector('.progress-wrap path');
			var pathLength = progressPath.getTotalLength();
			progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
			progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
			progressPath.style.strokeDashoffset = pathLength;
			progressPath.getBoundingClientRect();
			progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
			var updateProgress = function () {
				var scroll = $(window).scrollTop();
				var height = $(document).height() - $(window).height();
				var progress = pathLength - (scroll * pathLength / height);
				progressPath.style.strokeDashoffset = progress;
			}
			updateProgress();
			$(window).scroll(updateProgress);
			var offset = 50;
			var duration = 550;
			jQuery(window).on('scroll', function () {
				if (jQuery(this).scrollTop() > offset) {
					jQuery('.progress-wrap').addClass('active-progress');
				} else {
					jQuery('.progress-wrap').removeClass('active-progress');
				}
			});
			jQuery('.progress-wrap').on('click', function (event) {
				event.preventDefault();
				jQuery('html, body').animate({ scrollTop: 0 }, duration);
				return false;
			})
		});
	})(jQuery);

	$("#menu-toggle").click(function (e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
		$(this).find('i').toggleClass('fa-navicon fa-times')
	});
	$('.leftMenuCall').on('click', function () {
		document.getElementById("mySidenav").style.width = "100%";
		document.getElementById("rightSideNav").style.width = "0";
	});
	$('.closeLeftMenuBtn').on('click', function () {
		document.getElementById("mySidenav").style.width = "0";
	});
	$('.rightMenuCall').on('click', function () {
		document.getElementById("rightSideNav").style.width = "100%";
		document.getElementById("mySidenav").style.width = "0";
	});
	$('.closeRightMenuBtn').on('click', function () {
		document.getElementById("rightSideNav").style.width = "0";
	});

	$(".contact-tab-nav").click(function () {
		$(this).tab('show');
	});

	$(".contact-tab-nav2").click(function () {
		$(this).tab('show');
	});
	$(function () {
		$(".expand").on("click", function () {
			// $(this).next().slideToggle(200);
			$expand = $(this).find(">:first-child");
			if ($expand.text() == "+") {
				$expand.text("-");
			} else {
				$expand.text("+");
			}
		});
	});
	function hr_hide_show(id) {
		$("#l2").removeClass("active-class-grey");
		$("#l2").addClass("active-class-red");
		$(".l2").addClass("active");
	}

	$(window).scroll(function () {
		if ($(".header-v2").length > 0) {
			if ($(".header-v2").offset().top > 50) {
				$(".navbar-fixed-top").addClass("top-nav-collapse");
			} else {
				$(".navbar-fixed-top").removeClass("top-nav-collapse");
			}
		}
	});
	$(window).scroll(function () {
		$(".slideanim").each(function () {
			var pos = $(this).offset().top;
			var winTop = $(window).scrollTop();
			if (pos < winTop + 600) {
				$(this).addClass("slide");
			}
		});
	});
	$(document).ready(function () {

		var other_bannerUrl = $("#other_banner1").val();
		if (other_bannerUrl != "") {
			$(".module").css("background-image", "url(" + other_bannerUrl + ")");
		}

		$('[data-toggle="tooltip"]').tooltip();
		$('[rel="tooltip"]').tooltip();
	});
	function rotateCard(btn) {
		var $card = $(btn).closest(".card-container");
		console.log($card);
		if ($card.hasClass("hover")) {
			$card.removeClass("hover");
		} else {
			$card.addClass("hover");
		}
	}



	function convertToFeetInches(value) {
		var feet = Math.floor(value / 12);
		var inches = value % 12;
		return feet + "-" + inches + " ft";
	}

	// function find_match() {
	// 	var hash_tocken_id = $("#hash_tocken_id").val();
	// 	var base_url = $("#base_url").val();
	// 	var url = base_url + "search/home_search";
	// 	var form_data = $("#search_form").serialize();
	// 	form_data = form_data + "&csrf_new_matrimonial=" + hash_tocken_id;

	// 	show_comm_mask();
	// 	$.ajax({
	// 		url: url,
	// 		type: "POST",
	// 		data: form_data,
	// 		dataType: "json",
	// 		success: function (data) {
	// 			window.location.href = base_url + "search/result";
	// 			update_tocken(data.tocken);
	// 			hide_comm_mask();
	// 		}
	// 	});
	// 	return false;
	// }
	function find_match() {
		// Collect form data
		var formData = {
			gender: $('#Looking').val(),
			from_age: $('#agefrom').val(),
			to_age: $('#ageto').val(),
		};
		// Send the AJAX request
		$.ajax({
			type: "POST",
			url: "matrimonial_find_match",
			data: formData,
			dataType: "json",
			success: function (response) {
				if (response.status == 'success') {
					// window.location.href = <?= base_url() ?> + "matrimonial_find_match_result";
				} else {
					alert('No matches found..!');
				}
			},
			error: function (xhr, status, error) {
				console.error('AJAX Error: ' + status + error);
				alert('An Error Occurred..!');
			}
		});
	}

	/* Search box   */
	$(".custom-select").each(function (event) {
		var classes = $(this).attr("class"),
			id = $(this).attr("id"),
			name = $(this).attr("name");
		var placeholder = $(this).attr("placeholder");
		if ($(this).find(":selected").attr("title")) {
			placeholder = $(this).find(":selected").attr("title");
		}
		if (placeholder == "Bride") {
			placeholder = "Looking For a " + placeholder;
		}
		var template = "<div class=\"" + classes + "\">";
		template += "<span class=\"custom-select-trigger\" id=\"" + id + "_change\">" + placeholder + "</span>";
		template += "<div class=\"custom-options\">";
		$(this).find("option").each(function (event) {
			template += "<span class=\"custom-option\" + $(this).attr(\"class\") + \"\" data-value=\"" + $(this).attr("value") + "\">" + $(this).html() + "</span>";

		});
		template += "</div></div>";

		$(this).wrap("<div class=\"custom-select-wrapper\"></div>");
		$(this).hide();
		$(this).after(template);
	});
	$(".custom-option:first-of-type").hover(function (event) {
		$(this).parents(".custom-options").addClass("option-hover");
	}, function () {
		$(this).parents(".custom-options").removeClass("option-hover");
	});
	$(".custom-select-trigger").on("click", function (event) {
		$("html").one("click", function (event) {
			$(".custom-select").removeClass("opened");
			$(".custom-select-trigger").removeClass("open");
		});
		if ($(".open").attr("class")) {
			$(".custom-select").removeClass("opened");
			$(".custom-select-trigger").removeClass("open");
		} else {
			$(this).parents(".custom-select").toggleClass("opened");
			$(".custom-select-trigger").addClass("open");
		}
		event.stopPropagation();
	});
	$(".custom-option").on("click", function (event) {

		$(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
		$(this).parents(".custom-options").find(".custom-option").removeClass("selection");
		$(this).addClass("selection");
		$(this).parents(".custom-select").removeClass("opened");
		$(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
		if ($(this).data("value") == "Male") {
			$("#agefrom").val("24");
			$("#ageto").val("35");
			$("#agefrom_change").text("24 Year");
			$("#ageto_change").text("35 Year");
			$("#Looking_change").text("Looking For a Groom");
		} else if ($(this).data("value") == "Female") {
			$("#agefrom").val("20");
			$("#ageto").val("30");
			$("#agefrom_change").text("20 Year");
			$("#ageto_change").text("30 Year");
			$("#Looking_change").text("Looking For a Bride");
		} else { }
	});
	/* Search box */

	function open_profile_chat(id) {
		window.open('https://shaadi.telisahusamaj.in/search/view-profile/' + id);
	}
</script>