-- Create the APA database
CREATE DATABASE APA;

-- Use the APA database
USE APA;

-- Create Roles table
CREATE TABLE Roles (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    role VARCHAR(50) NOT NULL
);

-- Create Users table
CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES Roles(role_id)
);

-- Create Profiles table
CREATE TABLE Profiles (
    profile_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    bio TEXT,
    picture VARCHAR(255),
    club VARCHAR(100),
    matches_played INT DEFAULT 0,
    won INT DEFAULT 0,
    lost INT DEFAULT 0,
    win_rate DECIMAL(5, 2) DEFAULT 0.00,
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);

-- Create Events table
CREATE TABLE Events (
    event_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    venue VARCHAR(255),
    date DATETIME NOT NULL,
    description TEXT,
    capacity INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    prize VARCHAR(255)
);

-- Create Event_Registrations table
CREATE TABLE Event_Registrations (
    reg_id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT NOT NULL,
    user_id INT NOT NULL,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (event_id) REFERENCES Events(event_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);

-- Create Matches table
CREATE TABLE Matches (
    match_id INT AUTO_INCREMENT PRIMARY KEY,
    challenger_id INT NOT NULL,
    challenged_id INT NOT NULL,
    status ENUM('scheduled', 'completed', 'cancelled') DEFAULT 'scheduled',
    winner INT,
    schedule_date DATETIME NOT NULL,
    FOREIGN KEY (challenger_id) REFERENCES Users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (challenged_id) REFERENCES Users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (winner) REFERENCES Users(user_id) ON DELETE SET NULL
);

-- Create Leaderboards table
CREATE TABLE Leaderboards (
    leaderboard_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    won INT DEFAULT 0,
    lost INT DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);

-- Create Ranks table
CREATE TABLE Ranks (
    rank_id INT AUTO_INCREMENT PRIMARY KEY,
    rank INT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE
);

-- Create Awards table
CREATE TABLE Awards (
    award_id INT AUTO_INCREMENT PRIMARY KEY,
    award_name VARCHAR(255) NOT NULL,
    event_id INT,
    prize VARCHAR(255),
    FOREIGN KEY (event_id) REFERENCES Events(event_id) ON DELETE SET NULL
);

-- Create User_Awards table
CREATE TABLE User_Awards (
    user_id INT NOT NULL,
    award_id INT NOT NULL,
    PRIMARY KEY (user_id, award_id),
    FOREIGN KEY (user_id) REFERENCES Users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (award_id) REFERENCES Awards(award_id) ON DELETE CASCADE
);