<?php
/*
Plugin Name: Subscribe 
Plugin URI: http://localhost/just/wordpress
Description: A simple subscribe form for WordPress
Version: 1.0
Author: eleven
Author URI: http://localhost/just/wordpress 
*/




function simple_subscribe_form_install() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'newrr';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      email varchar(255) NOT NULL,
      PRIMARY KEY  (id)
    ) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
  }
  register_activation_hook( __FILE__, 'simple_subscribe_form_install' );



  function simple_subscribe_form_shortcode() {
    ob_start();
    ?>
    <form class="first" action="<?php echo esc_url( $_SERVER['REQUEST_URI'] ); ?>" method="post">
      <label for="email">Subscribe to our newsletter </label>
      <input type="email" id="email" name="email" required>
      <input type="submit" value="Subscribe">
    </form>
    <?php
    return ob_get_clean();
  }
  add_shortcode( 'simple_subscribe_form', 'simple_subscribe_form_shortcode' );



  function handle_subscribe_form() {
    if ( isset( $_POST['email'] ) ) {
      global $wpdb;
      $table_name = $wpdb->prefix . 'newrr';
      $email = sanitize_email( $_POST['email'] );
      $data = array( 'email' => $email );
      $format = array( '%s' );
      $wpdb->insert( $table_name, $data, $format );
      $subject = 'Subscribe to our mailing list';
      $message = 'Thank you for subscribing to our mailing list!';
      $headers = array('Content-Type: text/html; charset=UTF-8');
      wp_mail( $email, $subject, $message, $headers );
    }
  }
  add_action( 'init', 'handle_subscribe_form' );
  






function customplugin_menu() {

   add_menu_page("Custom Plugin", "Custom Plugin","manage_options", "myplugin",
    "displayList",

    plugins_url('/eleven/img/newsletter1.png'));

   add_submenu_page("myplugin","All Entries", "All entries","manage_options", "allentries", "displayList");

   add_submenu_page("myplugin","newsletter", "newsletter","manage_options", "addnewentry", "addEntry"); 

   add_menu_page('Export ', 'Export Emails', 'manage_options', 'my-export-emails', 'my_export_emails');

}
add_action("admin_menu", "customplugin_menu");



function displayList(){
  include "displaylist.php";
}
function addEntry(){
  include "newsletter.php";
}


function your_namespace() {
  wp_register_style('your_namespace', plugins_url('/assets/css/tab.css',__FILE__ ));
  wp_enqueue_style('your_namespace');
  wp_register_script( 'your_namespace', plugins_url('/assets/js/tab.js',__FILE__ ));
  wp_enqueue_script('your_namespace');
}

add_action( 'admin_init','your_namespace');

function my_script() {
  wp_register_style('my_script', plugins_url('/assets/css/bootstrap.min.css',__FILE__ ));
  wp_enqueue_style('my_script');
  wp_register_script( 'my_script', plugins_url('/assets/js/jquery.min.js',__FILE__ ));
  wp_enqueue_script('my_script');
}

add_action( 'admin_init','my_script');



function hardik() {
  wp_register_style('hardik', plugins_url('/assets/css/bootstrap.min.css',__FILE__ ));
  wp_enqueue_style('hardik');
  wp_register_script( 'hardik', plugins_url('/assets/js/bootstrap.min.js',__FILE__ ));
  wp_enqueue_script('hardik');
}
add_action( 'admin_init','hardik');

function mirr() {
  wp_register_style('mirr', plugins_url('/assets/css/codemirror.min.css',__FILE__ ));
  wp_enqueue_style('mirr');
  wp_register_script( 'mirr', plugins_url('/assets/js/codemirror.min.js',__FILE__ ));
  wp_enqueue_script('mirr');
}
add_action( 'admin_init','mirr');








/**
 * Generate CSV File.
 */

 add_action( 'admin_post_generate_csv', 'lunchbox_generate_orders_csv' );
 function lunchbox_generate_orders_csv() {
 
   global $wpdb;
 
   $filename = 'lunchbox-orders';
   $generatedDate = $generatedDate = date('d-m-Y His');
 
   /**
    * output header so that file is downloaded
    * instead of open for reading.
    */
   header("Pragma: public");
   header("Expires: 0");
   header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
   header("Cache-Control: private", false);
   header('Content-Type: text/csv; charset=utf-8');
   // header("Content-Type: application/octet-stream");
   header("Content-Disposition: attachment; filename=\"" . $filename . " " . $generatedDate . ".csv\";" );
   // header('Content-Disposition: attachment; filename=lunchbox_orders.csv');
   header("Content-Transfer-Encoding: binary");
 
   /**
    * create a file pointer connected to the output stream
    * @var [type]
    */
   $output = fopen('php://output', 'w');
  //  $results = $wpdb->get_results( "SELECT * FROM $wpdb->posts WHERE post_type = 'shop_order'", ARRAY_A );
  $tablename = $wpdb->prefix."newrr";

$results = $wpdb->get_results("SELECT * FROM ".$tablename." order by id desc");
 
   /**
    * output the column headings
    */
   fputcsv( $output, array('cont', 'email'));
 
   foreach ( $results as $key => $value ) {
     // $array[] = '';
     $modified_values = array( 
      $key+1,
       $value->email
     );
 
     fputcsv( $output, $modified_values );
   }
   return $output;
 }
 






























?>
