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

	// ─── Fix‑and‑Flip Calculator Tooltips ────────────────────────────────

	// ▸ purchase‑price
	$(".purchase-price-tooltip-click").on("click", function (e) {
		e.stopPropagation();
		$(".purchase-price-tooltip").toggleClass("clicked");
		$(
			".renovation-costs-tooltip, .after-repair-value-tooltip, .down-payment-tooltip-ff, \
		 .interest-rate-tooltip-ff, .closing-costs-tooltip, .origination-fee-tooltip, \
		 .realtor-fee-tooltip, .transfer-tax-tooltip, .turnaround-time-tooltip, \
		 .property-insurance-tooltip, .property-taxes-tooltip"
		).removeClass("clicked");
	});

	// ▸ renovation‑costs
	$(".renovation-costs-tooltip-click").on("click", function (e) {
		e.stopPropagation();
		$(".renovation-costs-tooltip").toggleClass("clicked");
		$(
			".purchase-price-tooltip, .after-repair-value-tooltip, .down-payment-tooltip-ff, \
		 .interest-rate-tooltip-ff, .closing-costs-tooltip, .origination-fee-tooltip, \
		 .realtor-fee-tooltip, .transfer-tax-tooltip, .turnaround-time-tooltip, \
		 .property-insurance-tooltip, .property-taxes-tooltip"
		).removeClass("clicked");
	});

	// ▸ after‑repair‑value  ← NEW
	$(".after-repair-value-tooltip-click").on("click", function (e) {
		e.stopPropagation();
		$(".after-repair-value-tooltip").toggleClass("clicked");
		$(
			".purchase-price-tooltip, .renovation-costs-tooltip, .down-payment-tooltip-ff, \
		 .interest-rate-tooltip-ff, .closing-costs-tooltip, .origination-fee-tooltip, \
		 .realtor-fee-tooltip, .transfer-tax-tooltip, .turnaround-time-tooltip, \
		 .property-insurance-tooltip, .property-taxes-tooltip"
		).removeClass("clicked");
	});

	// ▸ down‑payment
	$(".down-payment-tooltip-ff-click").on("click", function (e) {
		e.stopPropagation();
		$(".down-payment-tooltip-ff").toggleClass("clicked");
		$(
			".purchase-price-tooltip, .renovation-costs-tooltip, .after-repair-value-tooltip, \
		 .interest-rate-tooltip-ff, .closing-costs-tooltip, .origination-fee-tooltip, \
		 .realtor-fee-tooltip, .transfer-tax-tooltip, .turnaround-time-tooltip, \
		 .property-insurance-tooltip, .property-taxes-tooltip"
		).removeClass("clicked");
	});

	// ▸ interest‑rate
	$(".interest-rate-tooltip-ff-click").on("click", function (e) {
		e.stopPropagation();
		$(".interest-rate-tooltip-ff").toggleClass("clicked");
		$(
			".purchase-price-tooltip, .renovation-costs-tooltip, .after-repair-value-tooltip, \
		 .down-payment-tooltip-ff, .closing-costs-tooltip, .origination-fee-tooltip, \
		 .realtor-fee-tooltip, .transfer-tax-tooltip, .turnaround-time-tooltip, \
		 .property-insurance-tooltip, .property-taxes-tooltip"
		).removeClass("clicked");
	});

	// ▸ closing‑costs
	$(".closing-costs-tooltip-click").on("click", function (e) {
		e.stopPropagation();
		$(".closing-costs-tooltip").toggleClass("clicked");
		$(
			".purchase-price-tooltip, .renovation-costs-tooltip, .after-repair-value-tooltip, \
		 .down-payment-tooltip-ff, .interest-rate-tooltip-ff, .origination-fee-tooltip, \
		 .realtor-fee-tooltip, .transfer-tax-tooltip, .turnaround-time-tooltip, \
		 .property-insurance-tooltip, .property-taxes-tooltip"
		).removeClass("clicked");
	});

	// ▸ origination‑fee
	$(".origination-fee-tooltip-click").on("click", function (e) {
		e.stopPropagation();
		$(".origination-fee-tooltip").toggleClass("clicked");
		$(
			".purchase-price-tooltip, .renovation-costs-tooltip, .after-repair-value-tooltip, \
		 .down-payment-tooltip-ff, .interest-rate-tooltip-ff, .closing-costs-tooltip, \
		 .realtor-fee-tooltip, .transfer-tax-tooltip, .turnaround-time-tooltip, \
		 .property-insurance-tooltip, .property-taxes-tooltip"
		).removeClass("clicked");
	});

	// ▸ realtor‑fee
	$(".realtor-fee-tooltip-click").on("click", function (e) {
		e.stopPropagation();
		$(".realtor-fee-tooltip").toggleClass("clicked");
		$(
			".purchase-price-tooltip, .renovation-costs-tooltip, .after-repair-value-tooltip, \
		 .down-payment-tooltip-ff, .interest-rate-tooltip-ff, .closing-costs-tooltip, \
		 .origination-fee-tooltip, .transfer-tax-tooltip, .turnaround-time-tooltip, \
		 .property-insurance-tooltip, .property-taxes-tooltip"
		).removeClass("clicked");
	});

	// ▸ transfer‑tax
	$(".transfer-tax-tooltip-click").on("click", function (e) {
		e.stopPropagation();
		$(".transfer-tax-tooltip").toggleClass("clicked");
		$(
			".purchase-price-tooltip, .renovation-costs-tooltip, .after-repair-value-tooltip, \
		 .down-payment-tooltip-ff, .interest-rate-tooltip-ff, .closing-costs-tooltip, \
		 .origination-fee-tooltip, .realtor-fee-tooltip, .turnaround-time-tooltip, \
		 .property-insurance-tooltip, .property-taxes-tooltip"
		).removeClass("clicked");
	});

	// ▸ turnaround‑time
	$(".turnaround-time-tooltip-click").on("click", function (e) {
		e.stopPropagation();
		$(".turnaround-time-tooltip").toggleClass("clicked");
		$(
			".purchase-price-tooltip, .renovation-costs-tooltip, .after-repair-value-tooltip, \
		 .down-payment-tooltip-ff, .interest-rate-tooltip-ff, .closing-costs-tooltip, \
		 .origination-fee-tooltip, .realtor-fee-tooltip, .transfer-tax-tooltip, \
		 .property-insurance-tooltip, .property-taxes-tooltip"
		).removeClass("clicked");
	});

	// ▸ property‑insurance
	$(".property-insurance-tooltip-click").on("click", function (e) {
		e.stopPropagation();
		$(".property-insurance-tooltip").toggleClass("clicked");
		$(
			".purchase-price-tooltip, .renovation-costs-tooltip, .after-repair-value-tooltip, \
		 .down-payment-tooltip-ff, .interest-rate-tooltip-ff, .closing-costs-tooltip, \
		 .origination-fee-tooltip, .realtor-fee-tooltip, .transfer-tax-tooltip, \
		 .turnaround-time-tooltip, .property-taxes-tooltip"
		).removeClass("clicked");
	});

	// ▸ property‑taxes
	$(".property-taxes-tooltip-click").on("click", function (e) {
		e.stopPropagation();
		$(".property-taxes-tooltip").toggleClass("clicked");
		$(
			".purchase-price-tooltip, .renovation-costs-tooltip, .after-repair-value-tooltip, \
		 .down-payment-tooltip-ff, .interest-rate-tooltip-ff, .closing-costs-tooltip, \
		 .origination-fee-tooltip, .realtor-fee-tooltip, .transfer-tax-tooltip, \
		 .turnaround-time-tooltip, .property-insurance-tooltip"
		).removeClass("clicked");
	});

	// Close ALL tooltips when clicking outside
	$("body").on("click", function () {
		$(
			".purchase-price-tooltip, \
		 .renovation-costs-tooltip, \
		 .after-repair-value-tooltip, \
		 .down-payment-tooltip-ff, \
		 .interest-rate-tooltip-ff, \
		 .closing-costs-tooltip, \
		 .origination-fee-tooltip, \
		 .realtor-fee-tooltip, \
		 .transfer-tax-tooltip, \
		 .turnaround-time-tooltip, \
		 .property-insurance-tooltip, \
		 .property-taxes-tooltip"
		).removeClass("clicked");
	});
});
