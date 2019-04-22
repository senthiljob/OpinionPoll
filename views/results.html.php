<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poll Results</title>
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

   
    <?php
    // echo "<PRE>";print_r($);echo "</PRE>";
        $questions_array = json_decode($Questions);
     //   echo "<PRE>";print_r($questions_array);echo "</PRE>";

      //  echo "poll_results=<PRE>";print_r($poll_results);echo "</PRE>";
    ?>

    <div class="results container">
        <h1>Opinion Poll Results</h1>
        <span class="back"> <a href="/OpinionPoll/">Back</a>   </span>
        <?php for( $i=0;$i<count($questions_array);$i++){  ?>
            <div class="Opinions">
                <div class="questions">
                    <?php echo $questions_array[$i]->qid.". " .$questions_array[$i]->question; ?>
                </div>
                <ul class="option_list">
                    <?php foreach(json_decode($questions_array[$i]->options) as $key => $options): ?>
                        <li>
                            <strong><?php echo $options; ?></strong> have  vote(s) : <?php echo (isset($poll_results[$questions_array[$i]->qid][$key])? $poll_results[$questions_array[$i]->qid][$key] :0) ?>
                        </li>                        
                    <?php endforeach;?>
                </ul>
          </div>
        <?php } ?>
    </div>
  
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.1.js"></script>
    <!--  custom script -->
    <script src="assets/js/custom.js"></script>

</body>

</html>