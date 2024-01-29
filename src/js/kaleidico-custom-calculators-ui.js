jQuery(document).ready(function ($) {
	$(".show-advanced-text").on("click", function () {
		$(".calculator-results-advanced-container").slideDown();
		$(".show-advanced-text").hide();
		$(".hide-advanced-text").show();
	});
	$(".hide-advanced-text").on("click", function () {
		$(".calculator-results-advanced-container").slideUp();
		$(".hide-advanced-text").hide();
		$(".show-advanced-text").show();
	});
	$(".down-payment-tooltip-click").on("click", function () {
		$(".down-payment-tooltip").toggleClass("clicked");
	});
	$(".loan-term-tooltip-click").on("click", function () {
		$(".loan-term-tooltip").toggleClass("clicked");
	});
});
