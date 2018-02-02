<?php
session_start();
require_once 'config.php';
 
 $db = new Cl_DBclass();
 $user_id = $_SESSION['id'];
 
 $page = $_GET['page']; // get the requested page
 $limit = $_GET['rows']; // get how many rows we want to have into the grid
 $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
 $sord = $_GET['sord']; // get the direction
 if(!$sidx) $sidx =1; // connect to the database
 $result = mysqli_query( $db->con, "SELECT COUNT(*) AS count FROM scores where user_id = '$user_id' ");
 $row = mysqli_fetch_array($result,MYSQL_ASSOC);
 $count = $row['count'];
 
 if( $count >0 ) { 
 $total_pages = ceil($count/$limit);
 //$total_pages = ceil($count/1);
 } else {
 $total_pages = 0; 
 } if ($page > $total_pages) 
 $page=$total_pages; 
 $start = $limit*$page - $limit; // do not put $limit*($page - 1) 
 $SQL = "SELECT S.*, C.category_name from scores S  LEFT JOIN categories C ON S.category_id = C.id where S.user_id = '$user_id' ORDER BY $sidx $sord LIMIT $start , $limit";
 $result = mysqli_query( $db->con, $SQL ) or die("Couldn t execute query.".mysqli_error($db->con));
 $responce = new stdClass();
 $responce->page = $page;
 $responce->total = $total_pages;
 $responce->records = $count; 
 $i=0;
 while($row = mysqli_fetch_array($result,MYSQL_ASSOC)) {
 $responce->rows[$i]['id']=$row['id'];
 $responce->rows[$i]['cell']=array($row['id'],$row['category_name'],$row['right_answer'],$row['wrong_answer'],$row['unanswered']); $i++; 
 } 
 echo json_encode($responce);exit;
