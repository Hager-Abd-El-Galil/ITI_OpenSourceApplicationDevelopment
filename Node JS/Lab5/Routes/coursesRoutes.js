const express = require("express");
const router = new express.Router();

const courseController = require('../Controllers/courseController');

//Get All Courses
router.get("/",courseController.getAllCourses);

//Get Course By ID
router.get("/:id",courseController.getCourseByID);

//Create New Course
router.post("/",courseController.addNewCourse);

//Delete Course
router.delete("/:id",courseController.deleteCourse);

module.exports = router;
