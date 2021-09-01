<?PHP


		function DB_open_connection(){
            //open connection

						$dbhost = "localhost";
						$dbuser = "root";
						$dbpass = "";
						$dbname = "ShahGhouse";

					$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

			return $conn;
		}

		function DB_close_connection($conn){
			//close connection
			mysqli_close($conn);
		}

		function DB_insert($conn,$sql){
            //SQL example: INSERT INTO table_name (column1, column2, column3, ...)
			//			   VALUES (value1, value2, value3, ...);

            if(mysqli_query($conn, $sql)===True)
				return True;
 			else
                return mysqli_error($conn);
		}

		function DB_select($sql,$conn){
			//SQL example: SELECT column1, column2, ...
			//			   FROM table_name;

			$result = mysqli_query($conn, $sql);

            $rows=array();
			while ($row = mysqli_fetch_assoc($result)){
				 $rows[]=$row;
			}
            return $rows;
		}
		function DB_selectquery($sql, $conn){
			
			return mysqli_query($conn, $sql);
		}

		function DB_update($sql,$conn){
			//SQL example: UPDATE table_name
			//			     SET column1 = value1, column2 = value2, ...
			//				 WHERE condition;

			return mysqli_query($conn, $sql); //returns True on success
		}


        function DB_delete($sql,$conn){
            //SQL example: DELETE FROM table_name WHERE condition;

            return mysqli_query($conn, $sql); //returns True on success
		}

?>
