<?php

function kaleidico_fha_calculator_shortcode($atts)
{
    $attributes = shortcode_atts(array(
        'home_price' => get_field('home_price', 'option'),
        'down_payment' => get_field('down_payment', 'option'),
        'loan_term' => '', // Default to empty, expecting a comma-separated list if provided
        'mortgage_interest_rate' => get_field('mortgage_interest_rate', 'option'),
        'est_monthly_property_tax' => get_field('est_monthly_property_tax', 'option'),
        'est_monthly_property_insurance' => get_field('est_monthly_property_insurance', 'option'),
        'hoa_other_dues' => get_field('hoa_other_dues', 'option'),
    ), $atts);

    ob_start();
?>

    <h2>FHA Mortgage Calculator</h2>

    Home Price: <input type="text" name="home_price" value="<?php echo esc_attr(number_format($attributes['home_price'])); ?>" /><br />
    Down Payment <span class="fa fa-info-circle down-payment-tooltip-hover" aria-hidden="true">
        <div class="down-payment-tooltip">
            Down Payment Tooltip: <?php the_field('down_payment_tooltip', 'option'); ?>
        </div>
    </span>
    <input type="text" name="down_payment" value="<?php echo esc_attr($attributes['down_payment']); ?>" /><br />

    Loan Term <span class="loan-term-tooltip-hover" aria-hidden="true">
        <i class="fa fa-info-circle"></i>
        <div class="loan-term-tooltip">
            Loan Term Tooltip: <?php the_field('loan_term_tooltip', 'option'); ?><br />
        </div>
    </span>
    <br />

    <?php
    if (!empty($attributes['loan_term'])) {
        $loan_terms = explode(',', $attributes['loan_term']); // Split the string into an array
        $counter = 0; // Initialize counter
        foreach ($loan_terms as $term) {
    ?>
            <label>
                <input type="radio" name="loan_term" value="<?php echo esc_attr(trim($term)); ?>" <?php if ($counter === 0) echo 'checked'; ?>>
                <?php echo esc_html(trim($term)) . ' Years'; ?>
            </label><br>
            <?php
            $counter++; // Increment counter
        }
    } else {
        // Fallback to repeater field if no attribute is provided
        if (have_rows('terms', 'option')) :
            $counter = 0; // Initialize counter
            while (have_rows('terms', 'option')) : the_row();
                $term_label = get_sub_field('term_label');
                $term_value = get_sub_field('term_value');
            ?>
                <label>
                    <input type="radio" name="loan_term" value="<?php echo esc_attr($term_value); ?>" <?php if ($counter === 0) echo 'checked'; ?>>
                    <?php echo esc_html($term_label); ?>
                </label><br>
    <?php
                $counter++; // Increment counter
            endwhile;
        endif;
    }
    ?>


    Mortgage/Interest Rate: <input type="text" name="mortgage_interest_rate" value="<?php echo esc_attr($attributes['mortgage_interest_rate']); ?>" /><br />
    Est. Monthly Property Tax: <input type="text" name="est_monthly_property_tax" value="<?php echo esc_attr(number_format($attributes['est_monthly_property_tax'])); ?>" /><br />
    Est. Monthly Property Insurance: <input type="text" name="est_monthly_property_insurance" value="<?php echo esc_attr(number_format($attributes['est_monthly_property_insurance'])); ?>" /><br />
    HOA/Other Dues: <input type="text" name="hoa_other_dues" value="<?php echo esc_attr(number_format($attributes['hoa_other_dues'])); ?>" /><br /><br /><br />
    <div id="totalMonthlyPayment"></div>
    <div id="principalInterestPayment"></div>
    <div id="monthlyMortgageInsurance"></div>
    <div id="baseLoanAmount"></div>
    <div id="upfrontMIPAmount"></div>
    <div id="finalLoanAmount"></div>



<?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode('fha_calculator', 'kaleidico_fha_calculator_shortcode');
