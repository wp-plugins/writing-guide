<?php if(!empty($_POST['guide_content'])) { self::setWritingGuide($_POST['guide_content']); } ?>
<h2>Writing Guide Settings</h2>
<p class="gray"> Here you can edit your writing guide which will be shown to all users.</p>
<div class="content writing_guide">
<form action="#" method="POST">
<?php
$content = self::getWritingGuide();
$editor_id = "write_guide";
$settings = array('textarea_name'=>'guide_content');
wp_editor( $content, $editor_id, $settings );
?><br>
<?php if(!empty($_POST['guide_content'])) { echo 'Updated'; } ?><input id="submit" type="submit" value="Submit"/>
</form>
</div>