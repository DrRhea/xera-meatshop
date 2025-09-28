#!/bin/bash

echo "Setting up MySQL database for Meat Shop & Grocery..."

# Start MySQL service
echo "Starting MySQL service..."
brew services start mysql

# Wait for MySQL to start
sleep 5

# Create database and tables
echo "Creating database and tables..."
mysql -u root -e "CREATE DATABASE IF NOT EXISTS meatshop_grocery;"
mysql -u root meatshop_grocery < database_setup.sql

echo "Database setup completed!"
echo "Default admin credentials:"
echo "Username: admin"
echo "Password: admin123"
