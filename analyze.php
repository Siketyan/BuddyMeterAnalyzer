<?php
  require('vendor/autoload.php');
  use WebSocket\Client;

  $id = $_REQUEST["id"];
  $client = new Client("wss://s-usc1c-nss-235.firebaseio.com/.ws?v=5&ns=newqzingo");
  $client->send('{"t":"d","d":{"r":3,"a":"q","b":{"p":"/quizes/' . $id . '","h":""}}}');

  $client->receive(); // Ignore connection established message
  $json = $client->receive();
  $obj = json_decode($json, true);
  $d = $obj["d"]["b"]["d"];
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BuddyMeterAnalyzer</title>
    <link rel="stylesheet"
          href="//stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
          crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <br>
<?php if (!isset($d["questions"])): ?>
      <div class="alert alert-danger">
        <h4>Quiz not found.</h4>
        <p class="mb-0">Please check the quiz ID.</p>
      </div>
<?php else: ?>
      <h3>Summary</h3>
      <ul>
        <li>Id: <?= $id ?></li>
        <li>Creator: <?= $d["name"] ?></li>
      </ul>
      <br>
      <h3>Questions</h3>
      <table class="table">
        <thead>
          <th>Question</th>
          <th>Answer</th>
        </thead>
        <tbody>
<?php foreach ($d["questions"] as $q) { ?>
          <tr>
            <td><?= $q["name"] ?></td>
            <td><?= $q["options"][(int)$q["answer"]] ?></td>
          </tr>
<?php } ?>
        </tbody>
      </table>
      <br>
      <h3>Answerers</h3>
<?php if (!isset($d["answerers"])): ?>
      <p>Nope, no one answered.</p>
<?php else: ?>
      <table class="table">
        <thead>
          <th>Answerer</th>
          <th>Score</th>
        </thead>
        <tbody>
<?php foreach ($d["answerers"] as $a) { ?>
          <tr>
            <td><?= $a["name"] ?></td>
            <td><?= $a["score"] ?></td>
          </tr>
<?php } ?>
        </tbody>
      </table>
<?php endif ?>
<?php endif ?>
    </div>

    <script src="//code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
            integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
            crossorigin="anonymous"></script>
  </body>
</html>
