# 🚀 Job Portal Web App (Laravel)

A modern **Government Job Portal Web Application** built with **Laravel + Tailwind CSS**.
This platform helps users stay updated with the latest job notifications, results, admit cards, and study resources.

---

## ✨ Features

### 📋 Job Listings

* Display latest job posts in a clean table (desktop view)
* Mobile-friendly card layout
* Shows:

  * Title
  * Department
  * Vacancies
  * Application deadline
* Pagination support

### 📱 Responsive Design

* Fully responsive UI
* Optimized for both **desktop and mobile**
* Tailwind CSS powered modern design

### 📌 Menu Sections

Quick access to important sections:

* Latest Updates
* Vacancy Notifications
* Results
* Admit Card
* Free Study Resources

### 🏢 Department Wise Jobs

Browse jobs by category:

* SSC (CGL, CHSL, MTS, GD)
* Railway (NTPC, ALP, Technician)
* Bank (SBI, IBPS, Clerk)
* Defence (Army, Navy, Airforce)
* Civil Services (UPSC, PSC)
* Others (Engineering, Paramedical)

---

## 🛠️ Tech Stack

* **Backend:** Laravel
* **Frontend:** Blade + Tailwind CSS
* **Database:** MySQL
* **Pagination:** Laravel built-in pagination
* **Date Handling:** Carbon

---

## 📂 Project Structure

```
resources/views/
│
├── layouts/
│   └── masterlayout.blade.php
│
├── pages/
│   ├── allUpdates.blade.php
│   ├── vacancyNotification.blade.php
│   ├── results.blade.php
│   ├── admitCard.blade.php
│   └── studyResource.blade.php
│
└── home.blade.php
```

---

## 🔗 Routes

```php
/posts              -> Job listing page
/posts/{id}         -> Job details page
/pages/latest-updates      -> Latest updates
/pages/vacancy-notifications -> Notifications
/pages/results      -> Results
/pages/admitCard    -> Admit card
/pages/resource     -> Study resources
/pages/dept/{dept}  -> Department wise jobs
```

---

## ⚙️ Installation

1. Clone the repository:

```bash
git clone https://github.com/your-username/job-portal.git
cd job-portal
```

2. Install dependencies:

```bash
composer install
npm install
```

3. Setup environment:

```bash
cp .env.example .env
php artisan key:generate
```

4. Configure database in `.env`

5. Run migrations:

```bash
php artisan migrate
```

6. Start server:

```bash
php artisan serve
```

---

<!-- ## 📸 Screens Overview

* Desktop Table View for jobs
* Mobile Card View
* Menu Navigation Section
* Department-wise Categories -->

---

<!-- ## 📌 Future Improvements

* 🔍 Search & filters (department, qualification, etc.)
* 🔔 Notification system
* 👤 User authentication
* ❤️ Save/bookmark jobs
* 📊 Admin dashboard for job management -->

---

## 🤝 Contributing

Contributions are welcome!
Feel free to fork this repo and submit a pull request.

---



⭐ If you like this project, give it a star on GitHub!
