# 💪 FitForge  

FitForge is a **full-featured Laravel fitness app** built to help users **plan, track, and crush their fitness goals**.  
It combines a **modern Laravel backend**, clean UI, and fitness-focused features — making it the perfect companion for anyone serious about progress.  

---

## 🚀 Features  

### 🏋️ Core
- 🔐 **User Authentication** – login, register, password reset via Laravel Breeze  
- 📆 **Workout Planner** – create daily & weekly workout schedules  
- 📚 **Exercise Library** – categorized with option to add custom exercises  
- ✅ **Workout Tracker** – log sets, reps, weights  
- 📊 **Progress Tracking** – visualize progress with interactive charts  
- 🎯 **Goal Setting** – with email reminders  
- 🗓️ **Calendar View** – schedule overview  

### 🔥 Advanced
- 🛠 **Admin Panel** – manage users, exercises, and content  
- 🍽️ **Diet Tracker** *(optional / WIP)*  
- 🔥 **Habit & Streak Tracker** – build consistency  
- 🧾 **Export/Print Plans** – generate PDFs of your workouts  
- 📱 **Responsive UI** – works seamlessly on mobile/tablet  
- 🤝 **Community Features** *(future release)*  

---

## ⚙️ Tech Stack  

- **Backend:** Laravel 11+  
- **Frontend:** Vanilla CSS / Blade Templates  
- **Database:** MySQL  
- **Charts:** Chart.js / ApexCharts  
- **Auth:** Laravel Breeze  
- **PDF Export:** dompdf  
- **Notifications:** Laravel Notifications  

---

## 🎨 Theme  

- **Primary:** `#6C63FF` (Purple)  
- **Accent:** `#00C9A7` (Teal)  
- **Background:** `#F9F9F9`  

---

## 📂 Project Structure  

```bash
fitforge/
├── app/              # Core application files
├── database/         # Migrations & seeders
├── public/           # Public assets
├── resources/        # Views, CSS, JS
├── routes/           # Web & API routes
├── tests/            # PHPUnit tests
└── ...

🏁 Getting Started
1️⃣ Clone & Install
git clone https://github.com/mehta-aman/fitforge.git
cd fitforge
composer install

2️⃣ Environment Setup
cp .env.example .env
php artisan key:generate


Configure your .env file with database credentials.

3️⃣ Database Migration
php artisan migrate --seed

4️⃣ Run the App
php artisan serve