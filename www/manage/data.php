<?php
// Authenticate
  $caslogin   = 1;
  $logouturl  = 'http://langprize.library.ucdavis.edu/logout.php';
  require_once('/var/www/include/authentication.inc.php');
  require_once('/var/www/include/db-langprize.inc.php');
  $username  = isset($_SESSION['uname'])?$_SESSION['uname']:'';
  include('qry-is-manager.inc.php');
  if ($qry_is_manager < 1)
      {
          include('no-access.inc.php');
          include ('/var/www/html/footer.inc.php'); # do not touch this line
          die();
      }

  // Perform query
  include_once('/var/www/html/qry-dates.inc.php');
  include('qry-raw-data.php');

  // Export as CSV
  header("Content-Type: text/csv");
  header("Content-Disposition: inline; filename=langprize_data_raw_" . $application_year . ".csv");
  $out = fopen('php://output', 'w');
  foreach ($result_array as $i => $row) {
    if ($i == 0) {
      fputcsv($out, array_keys($row));
    }
    fputcsv($out, array_values($row));
  }
  fclose($out);
  //var_dump($result_array) ;
?>
