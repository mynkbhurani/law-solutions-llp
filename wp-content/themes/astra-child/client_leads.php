<?php
// Define the shortcode function
function display_client_leads()
{
  // Access the global $wpdb object
  global $wpdb;

  // Query to retrieve all records from the 'client_leads' table
  $query = "SELECT id, name, email, phone, message FROM client_leads";

  // Execute the query and get the results
  $results = $wpdb->get_results($query);

  // Start output buffering to capture HTML output
  ob_start();

  // Check if there are any results
  if (! empty($results)) {
    // Output the table header
    echo '<table border="1">';
    echo '<thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Message</th></tr></thead>';
    echo '<tbody>';

    // Loop through the results and display them
    foreach ($results as $row) {
      echo '<tr>';
      echo '<td>' . esc_html($row->id) . '</td>';
      echo '<td>' . esc_html($row->name) . '</td>';
      echo '<td>' . esc_html($row->email) . '</td>';
      echo '<td>' . esc_html($row->phone) . '</td>';
      echo '<td>' . esc_html($row->message) . '</td>';
      echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
  } else {
    // No results found message
    echo 'No leads found.';
  }

  // Return the content (so it can be used in the page)
  return ob_get_clean();
}

// Register the shortcode with WordPress
function register_client_leads_shortcode()
{
  add_shortcode('client_leads', 'display_client_leads');
}

// Hook the shortcode registration function
add_action('init', 'register_client_leads_shortcode');