<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              arbites.in
 * @since             1.0.0
 * @package           Arbites_Qa_Forms
 *
 * @wordpress-plugin
 * Plugin Name:       Arbites forms Ielts
 * Plugin URI:        arbites.in/arbites-qa-forms-plugin
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Rajneet kaur
 * Author URI:        arbites.in
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       arbites-forms-ielts
 * Domain Path:       /languages
 */

define('ARBITES_FORMS_PLUGIN_PATH', plugin_dir_url(__FILE__));
define('TESTS_TABLE', 'ar_tests');
define('SECTIONS_TABLE', 'ar_ielts_sections');
define('STUDENTS_TABLE', 'ar_ielts_student');
include 'includes/db_functions.php';
function arbites_forms_activation()
{

    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'ar_tests';
    if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {

        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            created_at datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            time time DEFAULT '00:00:00' NOT NULL,
            file_path text  NULL,
            test_status text NOT NULL,
            test_type text NOT NULL,
            module_type text NOT NULL,
            answers longtext  NULL ,
            section_para_1 longtext  NULL ,
            section_para_2 longtext  NULL ,
            section_para_3 longtext  NULL ,
            section_para_4 longtext  NULL ,
            test_form_editor_1 longtext  NULL ,
            test_form_editor_2 longtext  NULL ,
            test_form_editor_3 longtext  NULL ,
            test_form_editor_4 longtext  NULL ,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }

    // $table_name = $wpdb->prefix . 'ar_ielts_sections';
    // if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {

    //     $sql = "CREATE TABLE $table_name (
    //         id mediumint(9) NOT NULL AUTO_INCREMENT,
    //         test_id mediumint(9) NOT NULL ,
    //         answers longtext  NULL ,
    //         section_para_1 longtext  NULL ,
    //         section_para_2 longtext  NULL ,
    //         section_para_3 longtext  NULL ,
    //         section_para_4 longtext  NULL ,
    //         test_form_editor_1 longtext  NULL ,
    //         test_form_editor_2 longtext  NULL ,
    //         test_form_editor_3 longtext  NULL ,
    //         test_form_editor_4 longtext  NULL ,
    //         created_at datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,

    //         PRIMARY KEY  (id)
    //     ) $charset_collate;";

    //     require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    //     dbDelta($sql);
    // }

    $table_name = $wpdb->prefix . 'ar_ielts_student';
    if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {

        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            test_id mediumint(9) NOT NULL ,
            student_id mediumint(9) NOT NULL ,
            student_response longtext  NULL ,
            instrutor_id mediumint(9) NOT NULL ,
            instrutor_response longtext  NULL ,

            created_at datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,

            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }

    // $tblname = 'ar_ielts_student';
    // $wp_track_table = $table_prefix . "$tblname ";

    // if ($wpdb->get_var("show tables like '$wp_track_table'") != $wp_track_table) {

    //     $sql = "CREATE TABLE `" . $wp_track_table . "` ( ";
    //     $sql .= "  `id`  int(11)   NOT NULL auto_increment, ";
    //     $sql .= "  `test_id`  int(11)   NOT NULL, ";
    //     $sql .= "  `student_id` int(11)   NOT NULL, ";
    //     $sql .= "  `student_response`  longtext    NOT NULL, ";
    //     $sql .= "  `instrutor_id`  int(11)    NULL, ";
    //     $sql .= "  `instrutor_response`  longtext    NULL, ";

    //     $sql .= "  PRIMARY KEY  (`id`) ";
    //     $sql .= ") $charset_collate ; ";
    //     require_once ABSPATH . '/wp-admin/includes/upgrade.php';
    //     dbDelta($sql);
    // }

}
function arbites_forms_deactivation()
{
}

register_activation_hook(__FILE__, 'arbites_forms_activation');
register_deactivation_hook(__FILE__, 'arbites_forms_deactivation');

// add_action('wp_enqueue_scripts', 'arbites_forms_styles');
add_action('admin_enqueue_scripts', 'arbites_forms_admin_styles');
function arbites_forms_admin_styles()
{

    wp_enqueue_style('arbites_admin_boostrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
    wp_enqueue_style('arbites_admin_main_css', ARBITES_FORMS_PLUGIN_PATH . 'admin/assets/css/admin.css');
    wp_enqueue_script('arbites_admin_bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array('jquery'));
    wp_enqueue_script('arbites_admin_main_js', ARBITES_FORMS_PLUGIN_PATH . 'admin/assets/js/ar-forms.js', array('jquery'));
    wp_enqueue_script('jquery-ui-datepicker');
    wp_register_style('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
    wp_enqueue_style('jquery-ui');
}

add_action('admin_menu', 'ielts_tests_pages');
function ielts_tests_pages()
{
    add_menu_page('Ielts Tests', 'Ielts Tests', 'manage_options', 'ielts-tests', 'ielts_tests_pages_html');
    add_submenu_page('ielts-tests', __('Listening Home'), __('Listening'), 'edit_themes', 'listening-home', 'listening_pages_html');
    add_submenu_page('ielts-tests', __('Reading Home'), __('Reading'), 'edit_themes', 'reading-home', 'reading_pages_html');
    add_submenu_page('ielts-tests', __('Writing Home'), __('Writing'), 'edit_themes', 'writing-home', 'writing_pages_html');

}

function ielts_tests_pages_html()
{
    include 'admin/partials/main-page.php';
}

function listening_pages_html()
{
    // redirect_edit_test_page(3);
    global $wp;

    if ($_POST) {
        $id = createTest();
        redirect_edit_test_page($id);
    } elseif (is_edit_test_page() && isset($_GET['id'])) {
        redirect_edit_test_page($_GET['id']);
    } elseif (is_create_test_page()) {
        redirect_create_test_page();
    } else {
        $tests = get_tests('listening');
        include 'admin/partials/listening-page.php';
    }
}
function get_tests($type)
{
    $result = get_type_tests($type);
    return $result;
}

function redirect_edit_test_page($id)
{
    $test_data = getTest($id);
    include 'admin/partials/create-test.php';
}

function reading_pages_html()
{
    if (is_create_test_page()) {
        redirect_create_test_page();
    } else {
        include 'admin/partials/reading-page.php';
    }

}

function writing_pages_html()
{
    if (is_create_test_page()) {
        redirect_create_test_page();
    } else {
        include 'admin/partials/writing-page.php';
    }

}

function is_create_test_page()
{
    if (isset($_GET['test']) && $_GET['test'] == 'create') {
        return true;
    }
    return false;
}

function is_edit_test_page()
{
    if (isset($_GET['test']) && $_GET['test'] == 'edit') {
        return true;
    }
    return false;
}

function redirect_create_test_page()
{
    if ($_GET['test'] == 'create') {
        include 'admin/partials/create-test.php';
    }
}

function saveTest()
{
    print_r($_POST);
}
