<?php
global $homey_local;
$booking_hide_fields = homey_option('booking_hide_fields');
$guest = get_post_meta(get_the_ID(),'homey_guests',true);
$extra_guest_price = get_post_meta(get_the_ID(),'homey_additional_guests_price',true);

$prefilled = homey_get_dates_for_booking();
$guest_val = $prefilled['guest'];
if($guest_val > 0) {
	$guest_val = $guest_val;
	$guest_val2 = $guest_val;
} else {
	$guest_val = '0';
	$guest_val2 = '';
}
$total_guest = 10;
if($booking_hide_fields['guests'] != 1) {
?>
<div class="search-guests single-guests-js">
	<input name="guests" value="<?php echo esc_attr($guest_val2); ?>" readonly type="text" class="form-control" autocomplete="off" placeholder="<?php echo esc_attr(homey_option('srh_guests_label')); ?>">
	<input type="hidden" name="adult_guest" value="<?php echo esc_attr($guest_val); ?>">
	<input type="hidden" name="extra_guest" value="0">
	<input type="hidden" name="child_guest" value="0">
	<div class="search-guests-wrap single-form-guests-js clearfix">
	
		<div class="adults-calculator">
			<span class="quantity-calculator homey_adult"><?php echo esc_attr($guest_val); ?></span>
			<span class="calculator-label"><?php echo esc_attr(homey_option('srh_adults_label')); ?></span>
			<span class="adult-label"><?php echo esc_attr('Máx(con niño)','homey').' '.$guest; ?></span>
			<button class="adult_plus btn btn-secondary-outlined" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
			<button class="adult_minus btn btn-secondary-outlined" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>
		</div>

		<div class="extra-calculator extra_guest">
			<span class="quantity-calculator homey_extra"><?php echo esc_attr($guest_val); ?></span>
			<span class="calculator-label"><?php echo esc_attr('Extra Guest','homey'); ?></span>
			<span class="extra-label"><?php echo homey_formatted_price($extra_guest_price).', '.esc_attr('por adulto','homey') ?></span>
			<button class="extra_plus btn btn-secondary-outlined" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
			<button class="extra_minus btn btn-secondary-outlined" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>
		</div>

		<?php if($booking_hide_fields['children'] != 1) { ?>
		<div class="children-calculator">
			<span class="quantity-calculator homey_child">0</span>
			<span class="calculator-label"><?php echo esc_attr(homey_option('srh_child_label')); ?></span>
			<span class="child-label"><?php echo esc_attr('Máx(con adulto)','homey').' '.$guest; ?></span>
			<button class="child_plus btn btn-secondary-outlined" type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
			<button class="child_minus btn btn-secondary-outlined" type="button"><i class="fa fa-minus" aria-hidden="true"></i></button>
		</div>
		<?php } ?>
		<div class="guest-apply-btn">
			<button class="btn apply_guests btn-primary" type="button"><?php echo esc_html__(esc_attr($homey_local['sr_apply_label']),'homey'); ?></button>
		</div><!-- guest-apply-btn -->
	</div><!-- search-guests -->
</div>
<?php } ?>