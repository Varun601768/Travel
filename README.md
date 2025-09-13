# ✈️ Travel Booking System

## 📌 Project Overview  
The **Travel Booking System** is a web-based application designed to simplify the process of booking travel packages, hotels, and transportation.  
It allows users to **search, book, and manage** their travel plans online, while administrators can **manage packages, bookings, and customers** efficiently.  

---

## 🎯 Features  

### 👨‍💻 User Features  
- 🔐 User Registration & Login  
- 🔎 Search & View Travel Packages  
- 🏨 Book Hotels, Flights, and Packages  
- 💳 Online Payment Options (Demo)  
- 📅 View & Manage Bookings  
- ❌ Cancel Bookings  
- 📧 Email Notifications (optional)  

### 🛠️ Admin Features  
- ➕ Add, Update, Delete Travel Packages  
- 📋 Manage Bookings & Customer Records  
- 💰 Track Payments  
- 📊 Dashboard for insights  

---

## 📊 Methodology  
1. **Frontend Development** – HTML, CSS, Bootstrap, JavaScript  
2. **Backend Development** – PHP (XAMPP as server)  
3. **Database** – MySQL (User, Booking, Packages tables)  
4. **Booking Flow** – Search → Select → Book → Payment → Confirmation  
5. **Validation & Security** – Form validation, SQL injection prevention  

---

## 🛠️ Tech Stack  
- **Frontend:** HTML5, CSS3, Bootstrap, JavaScript  
- **Backend:** PHP (XAMPP Server)  
- **Database:** MySQL  
- **Server:** Apache (via XAMPP)  

---

## 📌 Database Structure (Example)  

### 🧑 User Table  
| Field     | Type      | Description           |
|-----------|----------|-----------------------|
| user_id   | INT (PK) | Unique ID for user    |
| name      | VARCHAR  | User’s full name      |
| email     | VARCHAR  | Login & communication |
| password  | VARCHAR  | Encrypted password    |

### 🏨 Packages Table  
| Field       | Type      | Description           |
|-------------|----------|-----------------------|
| package_id  | INT (PK) | Unique ID for package |
| title       | VARCHAR  | Package name          |
| description | TEXT     | Details of package    |
| price       | DECIMAL  | Cost of package       |

### 📅 Bookings Table  
| Field        | Type      | Description             |
|--------------|----------|-------------------------|
| booking_id   | INT (PK) | Unique booking ID       |
| user_id      | INT (FK) | References User         |
| package_id   | INT (FK) | References Package      |
| booking_date | DATE     | Date of booking         |
| status       | VARCHAR  | Confirmed/Pending       |

---

## 📷 Project Snapshots  

### 🏠 Homepage  
<img src="https://github.com/user-attachments/assets/345ac24a-dc8e-43ba-8fd5-cfe9027feb39" width="800" />

### 📋 Package List  
<img src="PASTE_PACKAGE_LIST_IMAGE_LINK_HERE" width="800" />

### 📝 Booking Form  
<img src="https://github.com/user-attachments/assets/f58b73fc-ae67-4418-b7bd-8c07597d73a1" width="800" />

### 👤 User Dashboard  
<img src="https://github.com/user-attachments/assets/5056b7ee-9787-40b4-b32f-e05163325af0" width="800" />

### 📑 Booking Details  
<img src="https://github.com/user-attachments/assets/b20a2f82-df8f-4807-918f-7dc74b33ed00" width="800" />

### ❌ Cancel Bookings  
<img src="https://github.com/user-attachments/assets/03e9b4c4-b62f-41c7-97df-176508532b5c" width="800" />

### 🛡️ Admin Dashboard  
<img src="https://github.com/user-attachments/assets/66db0850-e6af-43e5-a9e5-853820110244" width="800" />

<img src="https://github.com/user-attachments/assets/7ffecce4-e09f-443c-bcef-b3f06dad9b8e" width="800" />


---

## 🚀 Future Enhancements  
- 🌍 Integration with real-time **Flight & Hotel APIs**  
- 💳 Add **Payment Gateway Integration** (PayPal, Razorpay, Stripe)  
- 📱 Mobile Responsive Progressive Web App (PWA)  
- 🧠 AI-based **Personalized Travel Recommendations**  

---

## ⚙️ Installation & Setup  

1. Install **XAMPP** and start Apache & MySQL.  
2. Clone this repository:  
   ```bash
   git clone https://github.com/your-username/travel-booking-system.git
