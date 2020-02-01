 <?php
$content = '';
$editor_id ='test-form-editor-'. $_GET['section_id'];
wp_editor($content, $editor_id);
// submit_button('Save', 'primary');

?>
