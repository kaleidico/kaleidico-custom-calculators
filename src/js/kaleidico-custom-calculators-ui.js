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

	// FHA Tooltips
	$(".loan-term-tooltip-click").on("click", function (e) {
		e.stopPropagation();
		$(".loan-term-tooltip").toggleClass("clicked");
		$(".down-payment-tooltip").removeClass("clicked"); // Close the other tooltip
	});
	$(".down-payment-tooltip-click").on("click", function (e) {
		e.stopPropagation();
		$(".down-payment-tooltip").toggleClass("clicked");
		$(".loan-term-tooltip").removeClass("clicked"); // Close the other tooltip
	});

	// Heloc Tooltips
	$(".loan-amount-tooltip-click").on("click", function (e) {
		e.stopPropagation();
		$(".loan-amount-tooltip").toggleClass("clicked");
		$(
			".interest-rate-tooltip, .iop-tooltip, .repayment-tooltip"
		).removeClass("clicked");
	});
	$(".interest-rate-tooltip-click").on("click", function (e) {
		e.stopPropagation();
		$(".interest-rate-tooltip").toggleClass("clicked");
		$(".loan-amount-tooltip, .iop-tooltip, .repayment-tooltip").removeClass(
			"clicked"
		);
	});
	$(".iop-tooltip-click").on("click", function (e) {
		e.stopPropagation();
		$(".iop-tooltip").toggleClass("clicked");
		$(
			".loan-amount-tooltip, .interest-rate-tooltip, .repayment-tooltip"
		).removeClass("clicked");
	});
	$(".repayment-tooltip-click").on("click", function (e) {
		e.stopPropagation();
		$(".repayment-tooltip").toggleClass("clicked");
		$(
			".loan-amount-tooltip, .interest-rate-tooltip, .iop-tooltip"
		).removeClass("clicked");
	});

	// Close all tooltips when clicking outside
	$("body").on("click", function () {
		$(
			".loan-term-tooltip, .down-payment-tooltip, .loan-amount-tooltip, .interest-rate-tooltip, .iop-tooltip, .repayment-tooltip"
		).removeClass("clicked");
	});

	$(".kaleidico-calculator-show-disclaimer-text").on("click", function () {
		$(".kaleidico-calculator-disclaimer-text").slideDown();
		$(this).hide();
		$(".kaleidico-calculator-hide-disclaimer-text").show();
	});
	$(".kaleidico-calculator-hide-disclaimer-text").on("click", function () {
		$(".kaleidico-calculator-disclaimer-text").slideUp();
		$(this).hide();
		$(".kaleidico-calculator-show-disclaimer-text").show();
	});
});
