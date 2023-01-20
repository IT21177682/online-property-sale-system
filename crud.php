<?php
Give me one record
$queryFilms = "SELECT filmName, filmDescription FROM movies WHERE filmID = 10";
$resultFilms = $mysqli->query($queryFilms);
$rowFilms = $resultFilms->fetch_assoc();
// then to output
echo "<p>{$rowFilms['filmName']}</p>";




Give me the whole lot
$queryFilms = "SELECT * FROM movies ORDER BY movieName";
$resultFilms = $mysqli->query($queryFilms);
while ($rowFilms = $resultFilms->fetch_assoc()) {
echo $rowFilms['movieName'];
}



One row from user input using prepare
When you have variables coming via $_POST or $_GET ($_GET in this sample) and expect one value back.
$stmt = $mysqli->prepare("SELECT filmID, filmName FROM movies WHERE filmID = ?");
$stmt->bind_param('i', $_GET['filmID']);
$stmt->execute(); 
$stmt->bind_result($filmName); 
$stmt->fetch();
$stmt->close();
echo $filmName;
Notice the use of the flags 'sssdi' in the bind_param() method and the position placeholders (?) in the prepare statement.

For a reminder as to how these relate take at look at this interactive example.

Multiple rows from user input using prepare
When you have variables coming via $_POST or $_GET ($_GET in this sample) and expect mulitple values back.

$stmt = $mysqli->prepare("SELECT filmID, filmName, filmCertificate FROM movies WHERE filmCertificate = ? ORDER BY filmName");
$stmt->bind_param('s', $_GET['filmCertificate']);
$stmt->execute(); 
$stmt->bind_result($filmID, $filmName, $filmCertificate); 
while ($stmt->fetch()) {
echo "$filmName $filmCertificate";
}


Count number of rows with prepare
When you need to count the number of rows returned.
$stmt = $mysqli->prepare("SELECT filmID, filmName, filmCertificate FROM movies WHERE filmCertificate = ? ORDER BY filmName");
$stmt->bind_param('s', $_GET['filmCertificate']);
$stmt->execute(); 
$stmt->bind_result($filmID, $filmName, $filmCertificate); 
$stmt->store_result();
$numRows = $stmt->num_rows;
//optional $stmt->close();


INSERT
An INSERT with prepare.
$stmt = $mysqli->prepare("INSERT INTO movies(filmName, 
filmDescription,filmImage,filmPrice,filmReview) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param('sssdi', $_POST['filmName'], 
$_POST['filmDescription'],
$_POST['filmImage'],
$_POST['filmPrice'],
$_POST['filmReview']);
$stmt->execute(); 
$stmt->close();



UPDATE
An UPDATE with prepare.
$stmt = $mysqli->prepare("UPDATE movies SET filmName = ?, 
   filmDescription = ?, 
   filmImage = ?,  
   filmPrice = ?,  
   filmReview = ?  
   WHERE filmID = ?");
$stmt->bind_param('sssdii',
   $_POST['filmName'],
   $_POST['filmDescription'],
   $_POST['filmImage'],
   $_POST['filmPrice'], 
   $_POST['filmReview'],
   $_POST['filmID']);
$stmt->execute(); 
$stmt->close();
DELETE
$stmt = $mysqli->prepare("DELETE FROM movies WHERE filmID = ?");
$stmt->bind_param('i', $_POST['filmID']);
$stmt->execute(); 
$stmt->close();
?>


