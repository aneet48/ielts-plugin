<?php
if (!class_exists('WP_List_Table')) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class Links_List_Table extends WP_List_Table
{

    /**
     * Constructor, we override the parent to pass our own arguments
     * We usually focus on three parameters: singular and plural labels, as well as whether the class supports AJAX.
     */
    public function __construct()
    {
        parent::__construct(array(
            'singular' => 'tests_list_text_link', //Singular label
            'plural' => 'tests_list_text_links', //plural label, also this well be one of the table css class
            'ajax' => false, //We won't support Ajax for this table
        ));
    }

    public function extra_tablenav($which)
    {
        if ($which == "top") {
            //The code that goes before the table is here
            echo "Hello, I'm before the table";
        }
        if ($which == "bottom") {
            //The code that goes after the table is there
            echo "Hi, I'm after the table";
        }
    }

    public function get_columns()
    {
        return $columns = array(
            'test_name_id' => __('ID'),
            'test_duration' => __('Duration'),
            'test_type' => __('Type'),
            'test_status' => __('Status'),
        );
    }

    public function get_sortable_columns()
    {
        return $sortable = array(
            'test_name_id' => 'name_id',
        );
    }

    public function prepare_items()
    {
        global $wpdb, $_wp_column_headers;
        $screen = get_current_screen();
        
        $tbl_name =$wpdb->prefix . TESTS_TABLE;

        /* -- Preparing your query -- */
        $query = "SELECT * FROM $tbl_name";

        /* -- Ordering parameters -- */
        //Parameters that are going to be used to order the result
        $orderby = !empty($_GET["orderby"]) ? mysql_real_escape_string($_GET["orderby"]) : 'ASC';
        $order = !empty($_GET["order"]) ? mysql_real_escape_string($_GET["order"]) : '';
        if (!empty($orderby) & !empty($order)) {$query .= ' ORDER BY ' . $orderby . ' ' . $order;}

        /* -- Pagination parameters -- */
        //Number of elements in your table?
        $totalitems = $wpdb->query($query); //return the total number of affected rows
        //How many to display per page?
        $perpage = 5;
        //Which page is this?
        $paged = !empty($_GET["paged"]) ? mysql_real_escape_string($_GET["paged"]) : '';
        //Page Number
        if (empty($paged) || !is_numeric($paged) || $paged <= 0) {$paged = 1;} //How many pages do we have in total?
        $totalpages = ceil($totalitems / $perpage); //adjust the query to take pagination into account
        if (!empty($paged) && !empty($perpage)) {$offset = ($paged - 1) * $perpage;
            $query .= ' LIMIT ' . (int) $offset . ',' . (int) $perpage;} /* -- Register the pagination -- */
        $this->set_pagination_args(array(
            "total_items" => $totalitems,
            "total_pages" => $totalpages,
            "per_page" => $perpage,
        ));
        //The pagination links are automatically built according to those parameters

        /* -- Register the Columns -- */
        $columns = $this->get_columns();
        $_wp_column_headers[$screen->id] = $columns;

        /* -- Fetch the items -- */
        $this->items = $wpdb->get_results($query);
    }

    public function display_rows()
    {

        //Get the records registered in the prepare_items method
        $records = $this->items;

        //Get the columns registered in the get_columns and get_sortable_columns methods
        list($columns, $hidden) = $this->get_column_info();
print_r($columns);
        //Loop for each record
        if (!empty($records)) {foreach ($records as $rec) {

            //Open the line
            echo '<tr id="record_' . $rec->id . '">';
            foreach ($columns as $column_name => $column_display_name) {

                //Style attributes for each col
                $class = "class='$column_name column-$column_name'";
                $style = "";
                if (in_array($column_name, $hidden)) {
                    $style = ' style="display:none;"';
                }

                $attributes = $class . $style;

                //edit link
                $editlink = '/wp-admin/link.php?action=edit&link_id=' . (int) $rec->id;

                //Display the cell
                switch ($column_name) {
                    case "test_name_id": echo '<td ' . $attributes . '> Test ' . stripslashes($rec->id) . '</td>';
                        break;
                    case "test_duration": echo '<td ' . $attributes . '>' . stripslashes($rec->time) . '</td>';
                        break;
                    case "test_type": echo '<td ' . $attributes . '>' . stripslashes($rec->module_type) . '</td>';
                        break;
                    case "test_status": echo '<td ' . $attributes . '>' . $rec->status . '</td>';
                        break;
                    
                }
            }

            //Close the line
            echo '</tr>';
        }}
    }

}
$wp_list_table = new Links_List_Table();
$wp_list_table->prepare_items();
$wp_list_table->display();
