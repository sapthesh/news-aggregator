# News Aggregator Website

A News Aggregator Website that fetches news articles from various sources about any keyword. The website utilizes HTML, CSS, PHP, JavaScript, and a database to fetch, store, and display news articles. It leverages the News API to retrieve the latest news data and stores it in a database for easier access. The website features a responsive design using Material Design principles and provides smooth loading with AJAX.

## Features

- Fetches news articles about any keyword from multiple sources using the News API.
- Stores news articles in a database for quicker access and reduced API calls.
- Provides a user-friendly and responsive design with Material Design and Bootstrap.
- Implements smooth loading and AJAX functionality for seamless user experience.
- Includes an admin dashboard to control the articles displayed and manage ad space.

## Installation

1. Clone the repository:
- `git clone https://github.com/sapthesh/news-aggregator.git`


2. Set up the database:

- Create a new database on your MySQL server.
- Import the `database.sql` file included in the repository to create the required tables.

3. Update configuration:

- Open the `config.php` file.
- Set your database credentials in the `$servername`, `$username`, `$password`, and `$dbname` variables.

4. Obtain a News API key:

- Sign up for a free account at [https://newsapi.org](https://newsapi.org).
- Get your API key from the account dashboard.

5. Update the API key:

- Open the `fetch_news.php` file.
- Replace `'YOUR_API_KEY'` with your actual News API key in the `$apiKey` variable.

6. Run the website:

- Place the project files in the root directory of your web server.
- Access the website through your browser, e.g., `http://localhost/news-aggregator`.

## Usage

- Upon accessing the website, it will fetch news articles about Narendra Modi from various sources and display them on the homepage.
- The articles are initially loaded from the database, and if an article's content is missing, it will be fetched from the source website and stored in the database for future access.
- The website provides a "Read More" button for each article, allowing users to view the full article content on a separate page within the website.
- The admin dashboard can be accessed by navigating to `/admin` and provides controls to manage the articles displayed and ad space.

## Contributing

Contributions are welcome! If you have any suggestions, improvements, or bug fixes, please submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).
