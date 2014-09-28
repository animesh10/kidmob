
<?php
 $mysqli = new mysqli("127.0.0.1", "root", "root", "kidmob", 8889);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} else {
	
	echo $mysqli->host_info . "\n";
	$xml = simplexml_load_file('survey.xml');
	$page = $xml->page;
	$questions = $page->question;

	foreach ($questions as $qNo => $ques) {
		$qText = $ques->qText;
		$qid =  $ques->attributes()[1];

		if($ques->attributes()[0] == 200){
			echo "free Text \n";
			$responseArr = [];
			$responseObj = ($ques->responses->response);
			foreach ($responseObj as $key => $res) {
				array_push($responseArr, (string)$res);
			}
			$responseArr = array_filter($responseArr);
			//print_r($responseArr);
			foreach ($responseArr as $key => $value) {
				//echo $qid;
				//echo $value;
				if(!$mysqli->query("INSERT INTO freetext(qid,content) VALUES ('$qid','$value')")) {
    			    echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
				}
			}		

		} else if ($ques->attributes()[0] == 400) {
			echo "MCQ \n";
			$responseArr = [];
			$responseObj = ($ques->responses);
			//print_r($responseObj);
			foreach ($responseObj as $key => $res) {
				//print_r($key);
				foreach ($res as $key => $options) {
					foreach ($options as $key => $option) {
						//echo (string)$option->option;
						foreach ($option as $optkey => $optVal) {
							array_push($responseArr, (string)$optVal);
						}
					}					
				}
			}
			$responseArr = array_filter($responseArr);

			$responseArr = array_count_values($responseArr);
			//print_r($responseArr);
			foreach ($responseArr as $key => $value) {
				if(!$mysqli->query("INSERT INTO mcq(qid,options,count) VALUES ('$qid','$key','$value')")) {
    			    echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
				}
			}
		}
	}
	
}

?>

