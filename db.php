<?
require_once('settings.php');
$db = mysqli_connect($host, $user, $pass, $db);

//Test
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$_POST['email'] = 'mr.mcwake@gmail.com';
$_POST['name'] = 'Andrew';
$_POST['message'] = 'Hi here is my message';

$sql = "insert into `contact` (`ip`, `email`, `name`, `date`, `message`) values ('" . $_SERVER['REMOTE_ADDR'] . "', '" . $_POST['email'] . "', '" . $_POST['name'] . "', '" . date("Y-m-d") . "', '" . $_POST['message'] . "')";

mysqli_query($db, $sql);

echo $sql;

$sql = "select ip from `contact` where ip = '".$_SERVER['REMOTE_ADDR']."' || email = '".$_POST['email']."' and date = '" . date("Y-m-d") . "'";
	
$result = mysqli_query($db, $sql);
	
echo mysqli_num_rows($result);


?>