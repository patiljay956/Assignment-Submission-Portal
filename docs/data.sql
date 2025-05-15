-- Create Database
CREATE DATABASE IF NOT EXISTS users;
USE users;

-- Create staff table
CREATE TABLE IF NOT EXISTS `staff` (
  `Sr.no` INT NOT NULL,
  `Name` TEXT NOT NULL,
  `Staff_id` VARCHAR(255) NOT NULL,
  `Phone_no` bigint NOT NULL,
  `Branch` TEXT NOT NULL,
  `Password` VARCHAR(1000) NOT NULL,
  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

-- Create students table
CREATE TABLE IF NOT EXISTS `students` (
  `srno` INT NOT NULL,
  `name` TEXT NOT NULL,
  `enrollNo` VARCHAR(255) NOT NULL,
  `rollNo` INT NOT NULL,
  `phoneNo` bigint NOT NULL,
  `branch` TEXT NOT NULL,
  `sem` INT NOT NULL,
  `password` VARCHAR(1000) NOT NULL,
  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file` VARCHAR(10000)
) ;

-- Add primary and unique keys
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Sr.no`),
  ADD UNIQUE KEY `Staff_id` (`Staff_id`);

ALTER TABLE `students`
  ADD PRIMARY KEY (`srno`),
  ADD UNIQUE KEY `enrollNo` (`enrollNo`);

-- Set AUTO_INCREMENT for staff and students tables
ALTER TABLE `staff`
  MODIFY `Sr.no` INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `students`
  MODIFY `srno` INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

-- Commit the changes
COMMIT;

select * from students;
select * from staff;