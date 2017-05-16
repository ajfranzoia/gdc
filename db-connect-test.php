<?php
# Fill our vars and run on cli
# $ php -f db-connect-test.php
$dbname = 'sequelize';
$dbuser = 'root';
$dbpass = 'qtc';
$dbhost = '172.17.0.5';

$connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($connect, $dbname) or die("Could not open the db '$dbname'");
$test_query = "SHOW TABLES FROM $dbname";
$result = mysqli_query($connect, $test_query);
$tblCnt = 0;
while($tbl = mysqli_fetch_array($result)) {
  $tblCnt++;
  echo "Found TABLE: " . $tbl[0]."\n";
}
if (!$tblCnt) {
  echo "There are no tables\n";
} else {
  echo "There are $tblCnt tables\n";
}
