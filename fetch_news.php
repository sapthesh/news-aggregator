<?php

// Establish database connection
$servername = "localhost";
$username = "YOUR_DB_USERNAME";
$password = "YOUR_DB_PASSWORD";
$dbname = "YOUR_DB_NAME";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Fetch news from the News API
$apiKey = "YOUR_API_KEY"; // Replace with your News API key
$keyword = "India";

$newsUrl = "https://newsapi.org/v2/everything?q=" . urlencode($keyword) . '&apiKey=' . $apiKey;

if(strstr($newsUrl, '&amp;')){
    $url = str_replace('&amp;', '&', $newsUrl);
    header("Location: $newsUrl");
	exit();
}

$newsResponse = file_get_contents($newsUrl);
$newsData = json_decode($newsResponse, true);

if ($newsData["status"] == "ok") {
  $articles = $newsData["articles"];

  // Prepare SQL statement to insert news
  $insertStmt = $conn->prepare("INSERT INTO news (title, description, url) VALUES (?, ?, ?)");

  // Insert new news into the database
  foreach ($articles as $article) {
    $title = $article["title"];
    $description = $article["description"];
    $url = $article["url"];

    // Decode HTML entities in the URL
    $url = html_entity_decode($url);

    // Bind parameters to the SQL statement
    $insertStmt->bind_param("sss", $title, $description, $url);

    // Execute the SQL statement
    $insertStmt->execute();
  }

  $insertStmt->close();

  // Fetch news from the database
  $selectQuery = "SELECT * FROM news";
  $result = $conn->query($selectQuery);

  $news = array();

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $news[] = $row;
    }
  }

  // Return news as JSON response
  header('Content-Type: application/json');
  echo json_encode($news);
} else {
  echo "Error occurred while fetching news.";
}

$conn->close();

?>
