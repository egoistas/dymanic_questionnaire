
# Dynamic Questionnaire

This project is a dynamic questionnaire system designed to facilitate the creation, management, and evaluation of various questionnaires. It is built using PHP and integrates with a MySQL database.

## Features

- **User Authentication**: Secure login and logout functionalities for users.
- **Questionnaire Management**: Create, edit, and delete questionnaires dynamically.
- **Response Evaluation**: Process and evaluate user responses efficiently.
- **Statistics Display**: Visualize questionnaire results and statistics.

## Project Structure

The project directory is organized as follows:

- `css/`: Contains stylesheets for the application's frontend.
- `icons/`: Includes icon assets used throughout the application.
- `includes/`: Houses PHP scripts for database connections and utility functions.
- `templates/`: Stores HTML templates for consistent page layouts.
- `about.php`, `admin.php`, `controller.php`, etc.: Core PHP files handling various functionalities of the application.

## Setup Instructions

To set up this project locally:

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/egoistas/dymanic_questionnaire.git
   ```

2. **Navigate to the Project Directory**:
   ```bash
   cd dymanic_questionnaire
   ```

3. **Import the Database**:
   - Locate the `database.sql` file in the project root.
   - Use a tool like phpMyAdmin to import this SQL file into your MySQL database to set up the necessary tables.

4. **Configure Database Connection**:
   - Open `includes/mysqli_connect.php`.
   - Update the database credentials (`hostname`, `username`, `password`, `database`) to match your local setup.

5. **Run the Application**:
   - Ensure you have a local server environment (e.g., XAMPP) running.
   - Access the application via `http://localhost/dymanic_questionnaire` in your web browser.

## Usage

- **Admin Panel**: Accessible via `admin.php` for managing questionnaires and viewing statistics.
- **User Interface**: Users can participate in questionnaires and view their results.

## Contributing

Contributions are welcome! Please fork this repository and submit a pull request with your proposed changes.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Acknowledgements

Special thanks to all contributors and supporters of this project.
