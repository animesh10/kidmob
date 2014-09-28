<?php
	if($_POST['formSubmit'] == "Submit") 
    {
		$errorMessage = "";
		
		if(empty($_POST['formQid'])) 
        {
			$errorMessage .= "<li>Please Enter a Question Id</li>";
		}
		
        $varQid = $_POST['formQid'];
        $varGraph = $_POST['formGraph'];
        $varQtype = $_POST['formQtype'];
		
		if(empty($errorMessage)) 
        {
			$mysqli = new mysqli("127.0.0.1", "root", "root", "kidmob", 8889);
			if ($mysqli->connect_errno) {
    			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			} else {
				if(!$mysqli->query("INSERT INTO questions (qid, type, quesType) VALUES (".PrepSQL($varQid) .  "," .PrepSQL($varGraph). "," .PrepSQL($varQtype). ")")) {
    			    echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
				}
				//exit();
			}
		}
	}
            
    // function: PrepSQL()
    // use stripslashes and mysql_real_escape_string PHP functions
    // to sanitize a string for use in an SQL query
    //
    // also puts single quotes around the string
    //
    function PrepSQL($value)
    {
        // Stripslashes
        if(get_magic_quotes_gpc()) 
        {
            $value = stripslashes($value);
        }

        // Quote
        $value = "'" . mysql_real_escape_string($value) . "'";

        return($value);
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>Question Id's</title>
<!-- define some style elements-->
<style>
label,a 
{
	font-family : Arial, Helvetica, sans-serif;
	font-size : 12px; 
}

</style>	
</head>

<body>
      
		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
			<p>
				<label for='formQid'>Enter the Question Id's</label><br/>
				<input type="text" name="formQid" maxlength="50" value="<?=$varQid;?>" />
			</p>
			<p>
				<label for='formGraph'>What is the Graph Type?</label><br/>
				<select name="formGraph">
					<option value="">Select...</option>
					<option value="WordCloud">WordCloud</option>
					<option value="Bar">Bar</option>
					<option value="Bubble">Bubble</option>
				</select>
			</p>
			<p>
				<label for='formQtype'>What is the Question Type?</label><br/>
				<select name="formQtype">
					<option value="">Select...</option>
					<option value="MCQ">Multiple Choice</option>
					<option value="FT">Free Text</option>
				</select>
			</p>
			<input type="submit" name="formSubmit" value="Submit" />
		</form>
		
</body>
</html>