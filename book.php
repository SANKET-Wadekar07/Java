<?php
$bookid=$_GET['bookid'];
$bookname=$_GET['bookname'];
$price=$_GET['price'];
$conn= pg_connect("dbname=postgres user=postgres port=5432 password= ")or die('Connection problem');

if(!$conn)
{
	echo "Coonection Problem";
	exit(0);
}else
{
	$query="insert into book values($bookid,'".$bookname."',$price)";
	 
$result1=pg_query($conn,$query);


	$result=pg_query($conn,'select * from book');
	echo "<table border=1>";
	echo "<tr><th>Book Id</th><th>Book Name</th><th>Price</th></tr>";
     while ($row=pg_fetch_array($result)) {
     	  echo "<tr> ";
     	  echo "<td> "; echo $row[0]."  "; echo "</td> ";
     	  echo "<td> "; echo $row[1]."  "; echo "</td> ";
     	  echo "<td> "; echo $row[2]."  "; echo "</td> ";
     	  
     	   echo "</tr> ";
          } //while
          echo "</table>";
   
    }

?>