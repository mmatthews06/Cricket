<?php 
include 'connect.php';
mysql_selectdb('Cricket',$link) or die('Error connecting to DB');
//$matches_result = mysql_query("select * from matches",$link);
//$venue_result = mysql_query("select * from venue", $link);t
$result = mysql_query("select * from matches m where (m.team1='ENG' or m.team2='ENG') and m.type='ODI' ");
echo "No. of matches: ".mysql_num_rows($result)."<br />";
$result = mysql_query("select t.id as id, t.name as name from matches m, teams t where t.name = m.winner_id");

while($row = mysql_fetch_assoc($result)){
	//echo "Match : ".$row['team1']." vs ".$row['team2']." on ".$row['date']."  Type: ".$row['type']."<br />";
	echo "Match - ".$row['id']." -> ".$row['name']."<br />";
	mysql_query("update matches set winner_id = '".$row['id']."' where winner_id LIKE '".$row['name']."'   ");
}
echo "Total Matches played : ".mysql_num_rows($result);
	//echo "Venue: ".$venue_row['ground_name']."<br />";


?>