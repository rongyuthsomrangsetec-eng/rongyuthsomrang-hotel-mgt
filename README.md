# 🏨 Hotel Management System — Laravel 13 Final Exam Project

**Student Name:** Rong Yuthsomrang  
**Framework:** Laravel 13 (PHP 8.3+)  
**Database:** SQLite / MySQL Relational Schema  
**Selected Topic:** 5. Hotel Management System  

---

## 📌 Project Overview & Requirements Fulfillment

This project completely fulfills all requirements for the **FINAL PROJECT EXAM LARAVEL 13**:

| # | Exam Requirement | Implementation in this Project |
|---|---|---|
| **1** | **CREATE LARAVEL LOGIN & Register Form** | `views/login.blade.php` and `views/register.blade.php` styled with the exact clean card layout shown in Slides 4 & 5. Handled by `AuthController` with session regeneration, validation, and route authentication protection. |
| **2** | **CREATE Migration Relationship tables & connect model** | Parent table `room_types` (PK) and Child table `rooms` (FK: `room_type_id`). Connected via Eloquent: `RoomType hasMany Room` and `Room belongsTo RoomType`. Includes seeders for test data. |
| **3** | **CREATE CRUD OPERATION SYSTEM WITH FILTER AND SEARCH** | Complete CRUD operations for Rooms with real-time keyword search, Room Type filter, Room Status filter, Multi-criteria sorting, and responsive pagination matching Slides 6 & 7. |
| **4** | **Push Source Code to GitHub** | Fully structured Git repository with `.gitignore` ready to connect to your remote GitHub repository. |

---

## 🗄️ Database Architecture & Migrations

### 1. Parent Table: `room_types`
- `id` (Primary Key, BigIncrements)
- `name` (String: e.g. *Deluxe Double, Executive King, Family Suite*)
- `base_price` (Decimal 10,2)
- `capacity` (Integer: max guest capacity)
- `description` (Text, nullable)
- `created_at`, `updated_at` (Timestamps)

### 2. Child Table: `rooms`
- `id` (Primary Key, BigIncrements)
- `room_number` (String, Unique: e.g. *101, 201, 301, 501*)
- `room_type_id` (**Foreign Key** referencing `room_types.id` on delete cascade)
- `price_per_night` (Decimal 10,2)
- `floor` (String: e.g. *1st Floor, 2nd Floor, Penthouse*)
- `status` (String/Enum: *Available*, *Occupied*, *Maintenance*)
- `description` (Text, nullable: amenities & features)
- `created_at`, `updated_at` (Timestamps)

---

## 🚀 Quick Setup & How to Run

### 1. Database Migration & Seed
Run migrations and load the realistic seed data:
```bash
php artisan migrate --seed
```

### 2. Default Test Credentials
- **Admin Email:** `adminwoman@gmail.com` *(matching slide 4)* or `admin@hotel.com`
- **Password:** `password`

### 3. Start Development Server
```bash
php artisan serve
```
Then open: **`http://127.0.0.1:8000`** in your browser.

---

## 🖥️ Screen Guide & Features

1. **Login Page (`/login`)**:
   - Styled exactly like **Slide 4** of the exam requirements.
   - Clean, centered card with email, password, and remember me.

2. **Register Page (`/register`)**:
   - Styled exactly like **Slide 5** of the exam requirements.
   - Name, email, and password registration with immediate auto-login.

3. **Room Directory Page (`/rooms`)**:
   - Styled exactly like **Slide 7** of the exam requirements.
   - **3 Top KPI Stat Cards**: Total Rooms, Total Room Types, Available Rooms.
   - **Search Input**: Instant search by room number, floor, or amenities.
   - **Filters**:
     - Filter by Room Type (*All, Deluxe Double, Executive King...*)
     - Filter by Status (*All, Available, Occupied, Maintenance*)
     - Sort by (*Newest First, Oldest First, Price: Low to High, Price: High to Low, Room Number*)
   - **Actions**: View details modal/page, Edit room, and Delete with safe confirmation modal.
   - **Pagination**: Fully responsive Bootstrap 5 pagination.

4. **Room Registration Form (`/rooms/create`)**:
   - Styled exactly like **Slide 6** of the exam requirements.
   - Blue hero gradient header.
   - Dynamic `<select>` dropdown populated from relational `room_types` table.
   - Auto-suggests base price upon room type selection.
   - Reset form button and link back to list.

---

## 📹 Video Demo Script (for YouTube / MP4 submission)

When recording your demo video (similar to the teacher's YouTube demo `https://youtu.be/G8cXgRRYcPY`):
1. **Show Login / Register**:
   - Open `http://127.0.0.1:8000/login`.
   - Log in with `adminwoman@gmail.com` / `password`.
2. **Show Database Relationship (dbForge / HeidiSQL / SQLite / PhpMyAdmin)**:
   - Display `room_types` table and `rooms` table with foreign key `room_type_id`.
3. **Show Room Directory**:
   - Point out the 3 Stat KPI cards.
   - Demonstrate the Search bar by typing `101` or `Penthouse`.
   - Demonstrate the Filters (e.g. Filter by "Available" or "Deluxe Double").
4. **Demonstrate CRUD**:
   - **Create**: Add a new room (e.g., Room 601, Presidential Penthouse, $500, Available).
   - **Read**: View the room details page.
   - **Update**: Edit Room 601 price or status to "Occupied".
   - **Delete**: Delete the test room using the confirmation modal.
5. **Show Code Structure**:
   - Show `migrations`, `app/Models/Room.php` (`belongsTo`), `app/Models/RoomType.php` (`hasMany`).
   - Show `AuthController.php`, `RoomController.php`, and `resources/views/rooms`.
