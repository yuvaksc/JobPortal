# Job Portal 🚀

<p align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP"/>
  <img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL"/>
  <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5"/>
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3"/>
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript"/>
</p>

This is a web-based job portal application that connects job seekers with employers. Job seekers can search for jobs, create a resume, and apply for jobs. Employers can post jobs and manage applications.

## ✨ Features

*   **👤 User Authentication:** Users can register for a new account and log in to their existing account.
*   **🔍 Job Search:** Job seekers can search for jobs based on keywords, location, category, job type, experience, and qualification.
*   **⬆️ Job Posting:** Employers can post new jobs with details such as job title, description, salary, and required skills.
*   **📄 Resume Builder:** Job seekers can create and edit their resumes, including their personal details, education, work experience, and skills.
*   **✅ Job Application:** Job seekers can apply for jobs directly through the portal.
*   **📊 Application Management:** Users can view and manage their job applications.
*   **📰 Newsletter Subscription:** Users can subscribe to a newsletter to receive job updates.

## 🛠️ Technology Stack

*   **Frontend:** HTML, CSS, JavaScript
*   **Backend:** PHP
*   **Database:** MySQL

## 💾 Database Schema

The database schema is defined in the `jobportal.sql` file. It consists of the following tables:

*   `user_form`: Stores user authentication details.
*   `resume`: Stores user's resume information.
*   `education`: Stores the educational qualifications of the user.
*   `workexperience`: Stores the work experience of the user.
*   `jobcards`: Stores the details of the jobs posted.
*   `managejobs`: Stores the job applications submitted by users.


## ⚙️ Installation & Setup

### Prerequisites

*   A web server with PHP support (e.g., Apache).
*   A MySQL database.
*   A web browser.

It is recommended to use a software stack like [XAMPP](https://www.apachefriends.org/index.html) or [WAMP](http://www.wampserver.com/en/) which provides all the necessary components.

### How to Run

1.  **Clone the repository** to your local machine.
2.  **Database Setup**:
    *   Start your web server and MySQL.
    *   Open phpMyAdmin (usually at `http://localhost/phpmyadmin`).
    *   Create a new database named `jobportal`.
    *   Select the `jobportal` database and go to the **Import** tab.
    *   Choose the `jobportal.sql` file from the project directory and click **Go**.
3.  **Project Setup**:
    *   Copy the `webProj` folder into the `htdocs` directory of your XAMPP/WAMP installation.
4.  **Configuration**:
    *   Open `webProj/login/config.php` and ensure the database connection details are correct:

    ```php
    <?php

    $conn = mysqli_connect('localhost','root','','jobportal') or die('connection failed');

    ?>
    ```

5.  **Run the Application**:
    *   Open your web browser and navigate to `http://localhost/webProj`.