<?php
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $servername = "localhost";
        $username = "devuser1_fmlquuser";
        $password = "g;v9@A#E{pyG";
        // Create connection
        $conn = new mysqli($servername, $username, $password, "devuser1_fmlquestion");
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        if ($result = $conn->query("SELECT DATABASE()")) {
                $row = $result->fetch_row();
                //echo "Default database is " . $row[0];
                $result->close();
          }
          $conn->select_db("devuser1_fmlquestion");
        if($_POST)
        {
                function getTotalQuestionsByProtocolId ($conn, $protocol_id) {
                        $sql = "SELECT id FROM questions where protocol_id like '%$protocol_id%'";
                        $result = $conn->query($sql);
                        $count = $result->num_rows;
                        //echo "result 3 = $count <br/>";
                        return $count;
                }
                function getProtocolIdByQuestionId ($conn, $question_id) {
                        $sql = "SELECT protocol_id FROM questions where id = $question_id";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()) {
                            return $row['protocol_id'];
                        }
                }
    function getPercentageOfEachProtocol($conn) {
        $questions = $_POST['question_array'];
        $answers = [];
        foreach ($questions as $question_id) {
               $option_id = isset($_POST[$question_id]) ? $_POST[$question_id] : 0;
               $protocolIds =  getProtocolIdByQuestionId ($conn, $question_id);
               $protocolIds = explode(",", $protocolIds);
               foreach ($protocolIds as $protocolId) {
                       $answers[$protocolId] += $option_id;
               }
        }
        return $answers;
   }
   $grouped_sum_answers = getPercentageOfEachProtocol($conn);
   $sql = "SELECT id, protocol_title FROM protocol_list";
   $result = $conn->query($sql);
   $protocol_list = [];
   $i=0;
   while($row = $result->fetch_assoc()) {
    $protocol_list[$i]= $row['id'];
    $i++;
   }
   $final_percentages = [];
   foreach ($protocol_list as $protocol_id) {
        $total_questions = getTotalQuestionsByProtocolId ($conn, $protocol_id);
        $percentage = ($grouped_sum_answers[$protocol_id]*100) / ($total_questions*3);
        $percentage = is_nan($percentage) ? 0 : round($percentage, 3);
        $final_percentages[$protocol_id] = $percentage;
   }
   // Get top 3 % values from array.
   $values = array_values($final_percentages);
   rsort($values, SORT_NUMERIC);
   $top3_percentages = array_slice($values, 0, 3);
   $top3_diseases = [];
   foreach ($final_percentages as $key => $percent) {
        if (in_array($percent, $top3_percentages)) {
             $position = array_search($percent, $top3_percentages);
             $top3_diseases[$position] = $key;
        }
   }
   // Top 3 diseases Ids = $top3_diseases
   // Top 3 diseases Percentages = $top3_percentages
   echo "Top 3 percentages = ".print_r($top3_percentages, true)."<br/>";
   $sql = "SELECT id, protocol_title FROM protocol_list where id in (". implode(",",$top3_diseases).")";
   $result = $conn->query($sql);
   $disease_name = [];
   $i=0;
   while($row = $result->fetch_assoc()) {
    $disease_name[$i]= $row['protocol_title'];
    $i++;
   }
   //echo "Top 3 diseases = ". print_r($top3_diseases, true)."<br/>";
   echo "Top 3 disease name = ". print_r($disease_name, true)."<br/>";
}
?>
