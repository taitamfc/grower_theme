(function ($) {
	"use strict";

	var tf_counter = function () {
		$(".tf-counter").each(function () {
			var $this = $(this),
				counter_number = $this.find(".counter-number"),
				to_value = counter_number.data("to_value"),
				duration = counter_number.data("duration"),
				delimiter = counter_number.data("delimiter");
			var waypoint = new Waypoint({
				element: $this,
				handler: function (direction) {
					counter_number.numerator({
						duration: duration, // the length of the animation.
						delimiter: delimiter,
						toValue: to_value, // animate to this value.
					});
				},
				offset: "100%",
			});
		});

		(function () {
			$(document).ready(function () {
				$(".tf-counter")
					.find("b")
					.each(function (i) {
						return $(this)
							.prop("Counter", 0)
							.animate(
								{
									Counter: $(this).parent().data("percent"),
								},
								{
									duration: 2000,
									easing: "swing",
									step: function (now) {
										return $(this).text(Math.ceil(now) + "%");
									},
								}
							);
					});
				return $(".tf-counter .tf_counter-item").each(function (i) {
					var deg, full_deg, run_duration, _left, _percent, _right;
					_right = $(this).find(".bar-circle-right");
					_left = $(this).find(".bar-circle-left");
					_percent = $(this).attr("data-percent");
					deg = 3.6 * _percent;
					if (_percent <= 50) {
						return _right.animate(
							{
								circle_rotate: deg,
							},
							{
								step: function (deg) {
									$(this).css("transform", "rotate(" + deg + "deg)");
								},
								duration: 2000,
							}
						);
					} else {
						full_deg = 180;
						deg -= full_deg;
						run_duration = 2000 * (50 / _percent);
						return _right.animate(
							{
								circle_rotate: full_deg,
							},
							{
								step: function (full_deg) {
									$(this).css("transform", "rotate(" + full_deg + "deg)");
								},
								duration: run_duration,
								easing: "linear",
								complete: function () {
									run_duration -= 2000;
									_left.css({
										clip: "rect(0, 150px, 150px, 75px)",
										background: "#B0DAB9",
									});
									return _left.animate(
										{
											circle_rotate: deg,
										},
										{
											step: function (deg) {
												$(this).css("transform", "rotate(" + deg + "deg)");
											},
											duration: Math.abs(run_duration),
											easing: "linear",
										}
									);
								},
							}
						);
					}
				});
			});
		}.call(this));
	};

	$(window).on("elementor/frontend/init", function () {
		elementorFrontend.hooks.addAction("frontend/element_ready/tf-counter.default", tf_counter);
	});
})(jQuery);
