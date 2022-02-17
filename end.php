
<?php 
session_start();
$username=$_SESSION['username'];
$score=$_GET['score'];
$jsonString = file_get_contents('result.json');
$data = json_decode($jsonString, true);
$data[0]['score'] = $score;
// or if you want to change all entries with activity_code "1"
foreach ($data as $key => $entry) {
    if ($entry['email'] == $username) {
        $data[$key]['score'] = $score;
    }
}
$newJsonString = json_encode($data);
file_put_contents('result.json', $newJsonString);
header('location: index.php');

?>

