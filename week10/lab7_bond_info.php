<html>
<!-- The HTML doesn't work - as in its obsolete, so fix this... -->
<!-- Recommendation: create a fresh file & copy the stuff from this file 1/2 lines at a time... -->

<head>
	<title>Bond Movies</title>
</head>

<body>
	<center>
		<p>
			This page utilizes several postgreSQL method calls. Such as pg_connect(),
			pg_query(), and pg_fetch_result().
		</p>
		<!-- setup the table -->
		<table border="1" width="75%">
			<thead>
				<tr>
					<th width="50%">Movie</th>
					<th width="15%">Year</th>
					<th width="35%">Actor</th>
				</tr>
			</thead>

			<!-- add a tbody as well -->

			<?php
				$output = ""; //Set up a variable to store the output of the loop 
				//connect
				$conn = pg_connect("host=127.0.0.1 dbname=mohantys_db user=mohantys password=100898560");
				//N.B. replace the YOUR variables with your specific information
				//NOTE: "host=localhost..." SHOULD work, but if there is a problem with the config on opentech, use 127.0.0.1 instead

				// //issue the query (NEVER DO this is obsolete)
				// $sql = "SELECT movies.title, movies.year, actors.name
				// 		FROM movies, actors
				// 		WHERE movies.actor=actors.id
				// 		ORDER BY movies.year ASC";
				//issue the query (This is how you should do this)
				$sql = "SELECT movies.title, movies.year, actors.name
						FROM movies JOIN actors
							ON movies.actor = actors.id
						ORDER BY movies.year ASC";
				// this result is called a **resultset** (this is similar to an array of class objects) {what it is, is an array of rows, & each row has its columns} {similar database rows} [[This will be a question in the final test]]
				$result = pg_query($conn, $sql);
				$records = pg_num_rows($result);

				//generate the table
				for ($i = 0; $i < $records; $i++) {  //loop through all of the retrieved records and add to the output variable
					$output .= "\n\t<tr>\n\t\t<td>" . pg_fetch_result($result, $i, "title") . "</td>";
					$output .= "\n\t\t<td>" . pg_fetch_result($result, $i, "year") . "</td>";
					$output .= "\n\t\t<td>" . pg_fetch_result($result, $i, "name") . "</td>\n\t</tr>";
				}

				echo $output; //display the output
			?>
		</table>
		<!-- end the table -->
	</center>
</body>

</html>