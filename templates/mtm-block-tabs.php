<?php //Tabs
$rows = get_field( 'mtm_tab_repeater' );
?>
<div="content--inner">
<?php if( $rows ) : ?>

	<div class="mtm-tabs--wrapper mtm-module--tabs">

		<ul class="mtm-tabs--title-container" role="tablist">

			<?php $i = 1; ?>

			<?php foreach( $rows as $row ) : ?>
				<li class="mtm-tabs--title current" data-tab="tab-<?php echo $i; ?>" role="tab" aria-controls="tab-<?php echo $i++; ?>"><?php echo $row[ 'mtm_tab_title' ]; ?></li>
			<?php endforeach; ?>

		</ul>

		<?php $j = 1; ?>

			<?php foreach( $rows as $row ) : ?>
				<div class="mtm-tabs--title mtm-tabs--title-accordion current" data-tab="tab-<?php echo $j; ?>" ><?php echo $row[ 'mtm_tab_title' ]; ?></div>
				<div class="mtm-tabs--content current" id="tab-<?php echo $j; ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo $j++; ?>"><?php echo $row[ 'mtm_tab_content' ];?></div>
			<?php endforeach; ?>

<?php endif; // end have_rows ?>
</div>
