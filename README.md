# Assignment Submission Portal

A web-based portal for students to submit assignments and for staff to manage and review submissions.

## Features

- Student registration and login
- Staff registration and login
- Secure session management for both students and staff
- Assignment upload functionality for students
- Staff dashboard to view and download student submissions
- Responsive UI with Bootstrap

## Technologies Used

- Frontend: HTML, CSS, JavaScript, Bootstrap
- Backend: PHP
- Database: MySQL
- Server: XAMPP (Apache, MySQL)
- File Uploads: PHP
- Session Management: PHP Sessions
- Security: Basic input validation and session management
- File Uploads: PHP
- File Storage: Local file system

## Setup Instructions

1. **Clone or Download the Repository**

2. **Database Setup**

   - Import `docs/data.sql` into your MySQL server to create the required database and tables.

3. **Configure Database Connection**

   - Edit `partials/_dbconnect.php` if your MySQL credentials differ from the defaults:
     - Host: `localhost`
     - User: `root`
     - Password: `admin`
     - Database: `users`

4. **Run the Application**
   - Place the project folder in your XAMPP `htdocs` directory.
   - Start Apache and MySQL from XAMPP Control Panel.
   - Visit `http://localhost/AssignmentSubmissionPortal/home.php` in your browser.

## Usage

- **Students** can sign up, log in, and upload assignments.
- **Staff** can sign up, log in, and view/download student submissions.

## Security Notes

- Passwords are currently stored in plain text for demonstration purposes. **For production, always hash passwords using PHP's `password_hash()` and `password_verify()`.**
- File uploads are stored in `staff/database/`. Ensure this directory is writable and protected as needed.

## Dependencies

- [Bootstrap 5](https://getbootstrap.com/)
- [Bootstrap Icons](https://icons.getbootstrap.com/)
- PHP 7.x or newer
- MySQL

## License

This project is for educational purposes.

---

**Contributors:**

- Jay Patil
