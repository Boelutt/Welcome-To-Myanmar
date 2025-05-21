# Welcome-To-Myanmar
![image](https://github.com/Boelutt/Welcome-To-Myanmar/blob/master/welcomeToMyanmar.png)
![image](https://github.com/Boelutt/Welcome-To-Myanmar/blob/master/myanmar.png)

# 🇲🇲 Welcome to Myanmar

**Welcome to Myanmar** is a simple web application built with **PHP** and **SQLite3** that introduces users to the beauty, culture, and key facts about Myanmar. This project serves as a basic example of how to create a dynamic website using a lightweight database.

---

## 🛠️ Technologies Used

- **PHP** (Core scripting language)  
- **SQLite3** (Lightweight embedded database)  
- **HTML/CSS** for frontend design  


---
📂 Project Structure
- /welcome-to-myanmar
- │
- ├── index.php               # Main page
- ├── detail.php              # About Myanmar
- ├── sample.db               # SQLite database         
- └── README.md               # Project description

---
If you're building a full step-by-step guide, here's how it fits within the full context:
## 🚀 How to Run

1. Make sure PHP is installed on your machine.
   Download php link:
   ```bash
   https://www.php.net/downloads.php
   ```
- Edit php.ini to Enable SQLite Extensions
- Open php.ini in a text editor (Notepad or Notepad++ is fine).
- Press Ctrl + F and search for:
  ```bash
   ;extension=pdo_sqlite
  ```
- Remove the semicolon ; to enable it:
  ```bash
   extension=pdo_sqlite
  ```
- Also find and uncomment:
  ```bash
  extension=sqlite3
  ```
- So those two lines should look like:
  ```bash
   extension=pdo_sqlite
   extension=sqlite3
  ```
- Save the file and close the editor.
---

  
2.Clone this repository:
  ```bash
  git clone https://github.com/Boelutt/Welcome-To-Myanmar.git
  ```
3.Navigate to the project folder:
  ```bash
  cd Welcome-To-Myanmar
  ```
4.Start a local PHP server:
  ```bash
  php -S localhost:8000
  ```
**or**
  ```
  "C:\php\php.exe" -S localhost:8000
  ```
5.Open your browser and go to 
  ```bash
  http://localhost:8000
  ```
---
📌 Purpose
- This project was created for educational purposes and to showcase basic usage of PHP + SQLite3 in building small, database-driven web applications.



