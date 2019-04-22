<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Opinion Poll</title>
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

   
    <?php
     
        $questions_array = array();
        if($Questions!="") $questions_array =  json_decode($Questions);
        //echo "<PRE>";print_r($questions_array);echo "</PRE>";
    ?>

    <div class="container">
            <h1>Opinion Poll</h1>
            <span class="clsError"><?php echo $validation_msg;?></span>
             <form name="frmOpinion" method="post">
                <?php for( $i=0;$i<count($questions_array);$i++){  ?>
                    <div class="Opinions">
                        <div class="questions">
                            <?php echo $questions_array[$i]->qid.". " .$questions_array[$i]->question; ?>
                        </div>
                        <ul class="option_list">
                            <?php foreach(json_decode($questions_array[$i]->options) as $key => $options):?>
                                <li>
                                    <input type="radio" id="ans_<?php echo $questions_array[$i]->qid."_".$key; ?>" name='question[<?php echo $questions_array[$i]->qid; ?>]' value="<?php echo $key; ?>"/>
                                    <label for="ans_<?php echo $questions_array[$i]->qid."_".$key; ?>"><?php echo $options;?></label>
                                </li>                                
                            <?php endforeach;?>
                        </ul>
                  </div>
                <?php } ?>
                <input type="submit" name="polls" value="Post" id="submit"/>
              </form>
          
    </div>
  
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.1.js"></script>
    <!--  custom script -->
    <script src="assets/js/custom.js"></script>

</body>

</html>