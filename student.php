<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="./css/student.css">

	<title>Result</title>

</head>

<body background="result.jpg">
	<center>

		<?php

		include("init.php");


		if (!isset($_GET['class']))

			$class = null;
		else

			$class = $_GET['class'];

		$rn = $_GET['rn'];


		// validation
		
		if (empty($class) or empty($rn) or preg_match("/[a-z]/i", $rn)) {

			if (empty($class))

				echo '<p class="error">Please select your class</p>';

			if (empty($rn))

				echo '<p class="error">Please enter your roll number</p>';

			if (preg_match("/[a-z]/i", $rn))

				echo '<p class="error">Please enter valid roll number</p>';

			exit();

		}


		$name_sql = mysqli_query($conn, "SELECT `name` FROM `students` WHERE `rno`='$rn' and `class_name`='$class'");

		while ($row = mysqli_fetch_assoc($name_sql)) {

			$name = $row['name'];

		}


		$result_sql = mysqli_query($conn, "SELECT `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage` FROM `result` WHERE `rno`='$rn' and `class`='$class'");

		while ($row = mysqli_fetch_assoc($result_sql)) {

			$p1 = $row['p1'];

			$p2 = $row['p2'];

			$p3 = $row['p3'];

			$p4 = $row['p4'];

			$p5 = $row['p5'];

			$mark = $row['marks'];

			$percentage = $row['percentage'];

		}

		if (mysqli_num_rows($result_sql) == 0) {

			echo "no result";

			exit();

		}

		?>


		<div class="container">
			<h1 style="color:#fc3030">Damak Multiple Campus</h1>
			<h3 style="color:#fc3030">Damak-9,jhapa</h3>

			<div class="details">

				<span style="color:white"><b>Name:</b>
					<?php echo $name ?>
				</span>
				<br>

				<span style="color:white"><b>Class: </b>
					<?php echo $class; ?>
				</span>
				<br>

				<span style="color:white"><b>Roll No:</b>
					<?php echo $rn; ?>
				</span>
				<br>

				<br>
				<br>
				<table bgcolor=" #f9e45b" border="1" cellpadding="7" cellspacing="7" height="600" width="900">
					<tr bgcolor="#5bccf6">
						<th>Subjects</th>
						<th>Full marks</th>
						<th>Pass marks</th>
						<th>Obtained Marks</th>
					</tr>
					<tr>
						<td>Math</td>
						<td>100</td>
						<td>32</td>
						<td>
							<?php echo '<p>' . $p1 . '</p>'; ?>
						</td>
					</tr>
					<tr>
						<td>Physics</td>
						<td>75</td>
						<td>24</td>
						<td>
							<?php echo '<p>' . $p2 . '</p>'; ?>
						</td>
					</tr>
					<tr>
						<td>Chemistry</td>
						<td>75</td>
						<td>24</td>
						<td>
							<?php echo '<p>' . $p3 . '</p>'; ?>
						</td>
					</tr>
					<tr>
						<td>Computer 1</td>
						<td>100</td>
						<td>32</td>
						<td>
							<?php echo '<p>' . $p4 . '</p>'; ?>
						</td>
					</tr>
					<tr>
						<td>Computer 2</td>
						<td>100</td>
						<td>32</td>
						<td>
							<?php echo '<p>' . $p5 . '</p>'; ?>
						</td>
					</tr>
					<tr>
						<td>Total marks</td>
						<td>500</td>
						<td>144</td>
						<td>
							<?php echo '<p>' . $mark . '</p>'; ?>
						</td>
					</tr>
				</table>

				<div class="result">
					<span style="color:white">
						<?php echo '<p>Percentage:&nbsp' . $percentage . '%</p>'; ?>
					</span>

				</div>


				<div class="button">

					<button onclick="window.print()" style="height: 60px; width:200px; color:red;"><b>Print
							Result</b></button>
					<div class="footer">
						<center>
							<h1><a href="login.php"><img src="Image/back.png" width="100px" height="40px"></a></h1>
						</center>
						<div class="footinfo">
							<center> <span style="color:white">
									<p>Copyright &copy 2022 All Right Reserved. Designed by:<b> Sanjok Dhungana</b></p>
								</span>
						</div>
	</center>
	</div>
	</div>

</body>

</html>