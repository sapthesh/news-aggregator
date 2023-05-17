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

// Retrieve the article ID from the query parameter
if (isset($_GET['id'])) {
  $articleId = $_GET['id'];
} else {
  die("Article ID not provided.");
}

// Fetch the article from the database
$selectQuery = "SELECT * FROM news WHERE id = $articleId";
$result = $conn->query($selectQuery);

if ($result->num_rows > 0) {
  $article = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <title><?php echo $article['title']; ?></title>
</head>
<body>
  <nav>
    <div class="nav-wrapper blue">
      <a href="/" class="brand-logo center">India News</a>
    </div>
  </nav>

  <div class="container">
    <div class="card">
      <div class="card-content">
        <span class="card-title"><?php echo $article['title']; ?></span>
        <p><?php echo $article['description']; ?></p>
        <a href="<?php echo $article['url']; ?>" target="_blank" class="btn">Read Full Article</a>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

<?php
} else {
  echo "Article not found.";
}
