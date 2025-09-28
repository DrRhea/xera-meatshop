-- Remove category field from gallery table
-- This script removes the category column from the gallery table

USE meatshop_grocery;

-- Remove category column from gallery table
ALTER TABLE gallery DROP COLUMN category;

-- Show the updated table structure
DESCRIBE gallery;
