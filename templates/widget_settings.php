

<div>
<h1 class="lead">Customize widget</h1>
<form method = 'post' action = "<?php echo esc_url(admin_url('options.php')); ?>">
<?php
settings_fields( 'general' );
do_settings_sections( 'general' );
submit_button();
?>
</form>
</div>