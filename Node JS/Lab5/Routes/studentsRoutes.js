const express = require("express");
const router = new express.Router();

const studentController = require('../Controllers/studentController');

//Get All Students 
router.get("/",studentController.getAllStudents);

//Get Student By ID
router.get("/:id",studentController.getStudentByID);

//Create New Student
router.post("/",studentController.addNewStudent);

//Delete Student
router.delete("/:id",studentController.deleteStudent);

module.exports = router;
