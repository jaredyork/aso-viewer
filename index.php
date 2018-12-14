<?php

function showKeywordData($store) {
  $json_data = null;
  if ($store == "ITUNES") {
    $json_data = file_get_contents("../output-itunes.json");
    ?>
    <h3 class="header-m">iTunes Data</h3>
    <?php
  }
  else if ($store == "GPLAY") {
    $json_data = file_get_contents("../output-gplay.json");
    ?>
    <h3 class="header-m">Google Play Data</h3>
    <?php
  }

  $data = json_decode($json_data, true);

  ?>
  <table>
    <thead>
      <tr>
        <td>keyword:</td>
        <td>traffic:</td>
        <td>difficulty:</td>
        <td>suggest:</td>
        <td>rank:</td>
        <td>length:</td>
        <td>competitors:</td>
      </tr>
    </thead>

    <tbody>
    <?php
    if (count($data) > 0) {
      for ($i = 0; $i < count($data); $i++) {

        if ($i % 20 == 0) { // Every 20 results show another table head
          ?>
          <tr>
            <td>keyword:</td>
            <td>traffic:</td>
            <td>difficulty:</td>
            <td>suggest:</td>
            <td>rank:</td>
            <td>length:</td>
            <td>competitors:</td>
          </tr>
          <?php
        }

        ?>
        <tr class="thead-row">
          <td><?php echo $data[$i]["keyword"]; ?></td>
          <td><?php echo $data[$i]["traffic"]["score"]; ?></td>
          <td><?php echo $data[$i]["difficulty"]["score"]; ?></td>
          <td><?php echo $data[$i]["traffic"]["suggest"]["score"]; ?></td>
          <td><?php echo $data[$i]["traffic"]["ranked"]["score"]; ?></td>
          <td><?php echo $data[$i]["traffic"]["length"]["length"]; ?></td>
          <td><?php echo $data[$i]["difficulty"]["competitors"]["count"]; ?></td>
        </tr>

        <?php
      }
    }
    ?>
    </tbody>
  </table>
  <?php

}


function showGPlayData() {
  $json_data = file_get_contents("../output-gplay.json");

  $itunes_array = json_decode($json_data, true);

  foreach ($itunes_array as $k => $val) {
    echo "<b>Name: " . $k . "</b><br />";
    $keys = array_keys($val);
    foreach ($keys as $key) {
      echo "&nbsp;" . ucfirst($key) . " = " . $val[$key] . "<br />";
    }
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta lang="en-us">

    <title>ASO Viewer</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
  </head>

  <body>
    <div class="header-bg">
      <header class="header-main">
        <nav role="navigation" class="nav-main">
          <a class="btn-nav" href="index.php?store=ITUNES">iTunes Data</a>
          <a class="btn-nav" href="index.php?store=GPLAY">Google Play Data</a>
        </nav>
      </header>
    </div>
    <div class="wrapper">
      <h1>ASO Viewer by Jared York</h1>

      <?php

      $store = isset($_GET["store"]) ? $_GET["store"] : "";

      if (!empty($store)) {
        showKeywordData($store);
      }

      ?>
    </div>
  </body>
</html>