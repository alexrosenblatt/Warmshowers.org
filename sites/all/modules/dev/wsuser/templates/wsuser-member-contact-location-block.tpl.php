<?php
/**
 * Member contact location block template
 *
 * Supported variables
 * - $account (not sanitized)
 * - $uid
 * - $username
 * - $fullname (User's full name from wsuser)
 * - $homephone
 * - $mobilephone
 * - $homephone
 * - $street
 * - $additional
 * - $city
 * - $province
 * - $country
 * - $postal_code
 * - $latitude
 * - $longitude
 *
 * @see wsuser_preprocess_wsuser_member_contact_location()
 */
?>

<div class="member-map">
	<a class="thickbox" href="/maponly/uid=<?php print $uid; ?>?KeepThis=true&TB_iframe=true&height=600&width=800" accesskey="" >
		<img src="http://maps.googleapis.com/maps/api/staticmap?zoom=8&size=240x220&sensor=false&markers=color:blue%7Clabel:S%7C <?php print $latitude . ',' . $longitude; ?>" />
	</a>
</div>

<div class="extra_div_wrapper">
<div class="member-fullname"><?php print $fullname; ?></div>

<div class="member-address">
	<?php if ($notcurrentlyavailable) { ?>
	<div class="notcurrentlyavailable"><?php print t('Address information is not shown because this member is not currently available for hosting.'); ?></div>
	<?php } else { ?>

	<?php if ($street && !$notcurrentlyavailable): ?>
		<span class="member-street"><?php print $street; ?></span><br/>
	<?php endif; ?>
	<?php if ($additional && !$notcurrentlyavailable): ?>
		<span class="member-additional"><?php print $additional; ?></span><br/>
	<?php endif; ?>
	<?php if (!$notcurrentlyavailable): ?>
		<span class="member-city"><?php print $city . ', ' . $province . ' ' . $postal_code . ' ' . $country; ?></span>
	<?php endif; ?>
<?php } ?>
</div>

<div class="member-phones">
	<?php if ($homephone) : ?>
		<div class="phone homephone"><span class="number"><?php print $homephone; ?></span><br /><?php print t('Home Phone Number'); ?></div>
	<?php endif; ?>
	<?php if ($mobilephone) : ?>
		<div class="phone mobilephone"><span class="number"><?php print $mobilephone; ?></span><br /><?php print t('Mobile Number'); ?></div>
	<?php endif; ?>
	<?php if ($workphone) : ?>
	<div class="phone workphone"><span class="number"><?php print $workphone; ?></span><br /><?php print t('Work Phone Number'); ?></div>
	<?php endif; ?>
</div>

<div class="member-actions"><?php
if ($account->uid != $GLOBALS['user']->uid) {
	print theme('linkbutton', array(
      'title' => t('Send Message'),
      'href' => 'user/' .  $account->uid . '/contact',
      'classes'=> 'rounded light',
    )
  );
}
else {
	print theme('linkbutton', array('title' => t('Update'), 'href' => 'user/' . $account->uid . '/edit','classes'=> 'rounded light',));
	print theme('linkbutton', array('title' => t('Set Location'), 'href' => 'user/' . $account->uid . '/location','classes'=> 'rounded light',));
} ?></div>
</div>
