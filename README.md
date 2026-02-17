# 🌤 Weather Finder App

It is a web application to fetch and display current weather information for any city. 

---

## 🚀 Features

- Search for any city worldwide
- Fetch real-time weather data from OpenWeatherMap API
- Display detailed weather information including:
  - Temperature
  - Weather condition
  - Humidity
  - Wind speed
  - Pressure
  - Weather icons
- Automatically caches the weather data for 2 hours
- Displays offline data if previously fetched
- Smooth loading indicator for better UX

---

## 🧠 Project Workflow

1. **User Input**  
   The user enters a city name in the search box.

2. **API Request & Cache Handling**  
   The backend checks the local MySQL database:
   - If cached data is less than 2 hours old, it returns cached data
   - Otherwise, it fetches fresh data from OpenWeatherMap API

3. **Frontend Rendering**  
   Weather data is dynamically displayed on the webpage with icons and formatted layout.

4. **Offline Handling**  
   Previously fetched data is stored in `localStorage` to display when offline.

---


---

## 🗄️ Database Overview

- Database name: `prototype2`
- Table: `weather`
- Stores weather information for cities
- Columns:
  - `City`
  - `Weather_Condition`
  - `Humidity`
  - `Wind_Speed`
  - `Pressure`
  - `Temperature`
  - `Icon`
  - `Small_Weather_Condition`
  - `Dates`
  - `CacheTime` (for caching logic)

---

## ⚙️ Technologies Used

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **API:** OpenWeatherMap API
- **Database:** MySQL
- **Data Format:** JSON

---

## 📡 API Usage

This project uses the **OpenWeatherMap API**.  

You must:
- Obtain an API key from [OpenWeatherMap](https://openweathermap.org/)
- Insert your API key into `connection.php` before running the app

---

## 🔐 Important Notes

- Local server setup (XAMPP / WAMP / LAMP) is required to run PHP and MySQL
- API key should be kept private and not exposed publicly
- Caching ensures that API limits are not exceeded

---

## 📜 License

This project is licensed under the MIT License.  
You are free to use, modify, and learn from it.

---

## 👤 Author

This project is made by Roshan Karki


