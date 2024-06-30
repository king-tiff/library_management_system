**Online Library Management System**

This is a web-based library management system built with PHP, MySQL, JavaScript (including libraries like jQuery or Vue.js), HTML, and CSS (using Bootstrap for a responsive layout). It streamlines library operations by providing functionalities for both librarians and patrons.

**Features**

* **Librarian Features:**
    * **Book Management:**
        * Add, edit, and delete books from the catalog.
        * Manage book categories and authors.
        * Track book availability (available, borrowed, overdue).
        * Generate reports on book usage and borrowing trends.
    * **Patron Management:**
        * Add, edit, and delete patron accounts.
        * View patron borrowing history and overdue fines.
        * Set borrowing limits and renewal options.
* **Patron Features:**
    * Search the library catalog by title, author, or keywords.
    * View book details, including availability and borrowing information.
    * Borrow and return books (with validation to ensure patron eligibility).
    * View their borrowing history and outstanding fines.

**Requirements**

To run this project, you'll need the following environment setup:

* **Web Server:** Apache, Nginx, or any other web server that can execute PHP scripts.
* **PHP:** Version 7.2 or later (check your web server's configuration).
* **MySQL Database:** Create a database for the library system.
* **Composer (Optional):** For dependency management (if using third-party libraries).
* **Text Editor or IDE:** Choose an editor or IDE of your preference (e.g., Visual Studio Code, Sublime Text, PHPStorm).

**Installation**

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/king-tiff/library_management_system.git
   ```
2. **Set Up Database:**
   * Create a MySQL database.
   * Import the provided SQL schema file (if included) or create your own tables for books, patrons, categories, authors, loans, fines, etc.
   * Update the database connection details in `config.php` with your database credentials.

3. **Configure Environment (Optional):**
   * If using Composer, run `composer install` to install dependencies.

4. **Run the Application:**
   * Place the project directory in your web server's document root or a virtual host.
   * Access the application in your web browser using the appropriate URL (e.g., `http://localhost/online-library-management-system`).

**Usage**

* **Librarians:** Login using the provided credentials (if any) or create admin accounts.
* **Patrons:** No login required for basic browsing. Registration might be necessary for borrowing privileges.
