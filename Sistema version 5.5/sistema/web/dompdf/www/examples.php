<?php
require_once("../dompdf_config.inc.php");
if ( isset( $_POST["html"] ) ) {

  if ( get_magic_quotes_gpc() )
    $_POST["html"] = stripslashes($_POST["html"]);
  
  $old_limit = ini_set("memory_limit", "128M");
  
  $dompdf = new DOMPDF();
  $dompdf->load_html($_POST["html"]);
  $dompdf->set_paper($_POST["paper"], $_POST["orientation"]);
  $dompdf->render();

  $dompdf->stream("dompdf_out.pdf");

  exit(0);
}

?>

<div id="toc">
<h2>&nbsp;</h2>
</div>

<a name="samples"> </a>
<h2>&nbsp;</h2>

<ul class="samples">
<?php
$test_files = glob(dirname(__FILE__) . "/test/*.{html,php}", GLOB_BRACE);
$dompdf = dirname(dirname($_SERVER["PHP_SELF"])) . "/dompdf.php?base_path=" . rawurlencode("www/test/");
foreach ( $test_files as $file ) {
  $file = basename($file);
  $arrow = "images/arrow_0" . rand(1, 6) . ".gif";  
  echo "<li style=\"list-style-image: url('$arrow');\">\n";
  echo $file;
  echo " [<a class=\"button\" target=\"blank\" href=\"test/$file\">HTML</a>] [<a class=\"button\" href=\"$dompdf&input_file=" . rawurlencode("www/test/$file") .  "\">PDF</a>]\n";
  echo "</li>\n";
}
?>
</ul>

<h2>&nbsp;</h2>
