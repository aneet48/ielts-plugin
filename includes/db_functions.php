<?php

function createTest()
{
    $type = getInput('test_type');
    $id = getInput('test_id');
    $time = getInput('time');
    $file = getInput('audio-file');
    $status = getInput('status');
    $module_type = getInput('module_type');
    $test_form_editor_1 = getInput('test-form-editor-1');
    $test_form_editor_2 = getInput('test-form-editor-2');
    $test_form_editor_3 = getInput('test-form-editor-3');
    $test_form_editor_4 = getInput('test-form-editor-4');
    $section_para_1 = getInput('section-para-1');
    $section_para_2 = getInput('section-para-2');
    $section_para_3 = getInput('section-para-3');
    $section_para_4 = getInput('section-para-4');
    $ans = getInput('ans');
    $ans = $ans ? json_encode($ans) : '';
    $case = getInput('case');

    global $wpdb;

    if ($case == 'create') {
        $response = $wpdb->insert(
            $wpdb->prefix . TESTS_TABLE,
            array(
                'created_at' => current_time('y-m-d h-m-s'),
                'time' => $time,
                'file_path' => $file,
                'test_status' => $status,
                'module_type' => $module_type,
                'test_type' => $type,
                'answers' => $ans,
                'section_para_1' => $section_para_1,
                'section_para_2' => $section_para_2,
                'section_para_3' => $section_para_3,
                'section_para_4' => $section_para_4,
                'test_form_editor_1' => $test_form_editor_1,
                'test_form_editor_2' => $test_form_editor_2,
                'test_form_editor_3' => $test_form_editor_3,
                'test_form_editor_4' => $test_form_editor_4,
            )
        );
        $test_id = $wpdb->insert_id;
    }
    if ($case == 'edit') {
        $response = $wpdb->update(
            $wpdb->prefix . TESTS_TABLE,
            array(
                'created_at' => current_time('y-m-d h-m-s'),
                'time' => $time,
                'file_path' => $file,
                'test_status' => $status,
                'module_type' => $module_type,
                'test_type' => $type,
                'answers' => $ans,
                'section_para_1' => $section_para_1,
                'section_para_2' => $section_para_2,
                'section_para_3' => $section_para_3,
                'section_para_4' => $section_para_4,
                'test_form_editor_1' => $test_form_editor_1,
                'test_form_editor_2' => $test_form_editor_2,
                'test_form_editor_3' => $test_form_editor_3,
                'test_form_editor_4' => $test_form_editor_4,
            ),
            array(
                'id'=>$id
            )
        );
        $test_id = $id;
    }
   
    return $test_id;
}

function getTest($id)
{
    global $wpdb;
    $tbl_name = $wpdb->prefix . TESTS_TABLE;
    $result = $wpdb->get_row('SELECT * FROM ' . $tbl_name . ' WHERE `ID` = ' . $id . '', ARRAY_A);
    return $result;
}

function getInput($var)
{
    if (isset($_POST[$var])) {
        return $_POST[$var];
    } else {
        return '';
    }
}

function get_type_tests($type){
    global $wpdb;
$tbl_name = $wpdb->prefix . TESTS_TABLE;
$result = $wpdb->get_results('SELECT * FROM ' . $tbl_name . ' WHERE (test_type="' . $type . '")', ARRAY_A);
return $result;

}
