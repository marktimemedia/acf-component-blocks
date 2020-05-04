<?php //Tabs
$rows = get_field( 'mtm_tab_repeater' );
?>
<div class="content--inner">
<?php if( $rows ) : ?>
	<div class="mtm-tabs--wrapper mtm-module--tabs">
		<div class="mtm-tabs--title-container" role="tablist">
			<?php $i = 1; ?>
			<?php foreach( $rows as $row ) : ?><button class="mtm-tabs--title current" data-tab="tab-<?php echo $i; ?>" role="tab" aria-controls="tab-<?php echo $i++; ?>"><?php echo $row[ 'mtm_tab_title' ]; ?></button><?php endforeach; ?>
		</div>
		<?php $j = 1; ?>
			<?php foreach( $rows as $row ) : ?>
				<button class="mtm-tabs--title mtm-tabs--title-accordion current" data-tab="tab-<?php echo $j; ?>" ><?php echo $row[ 'mtm_tab_title' ]; ?></button>
				<div class="mtm-tabs--content current" id="tab-<?php echo $j; ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo $j++; ?>"><?php echo $row[ 'mtm_tab_content' ];?></div>
			<?php endforeach; ?>
	</div>
<?php endif; // end have_rows ?>
</div>
