const courseModel = require('../Models/courseModel');

var getAllCourses = async (req,res)=>{
    let allCourses = await courseModel.find();
    res.json(allCourses);
 };

var getCourseByID = async (req,res)=>{
    let course = await courseModel.findById(req.params.id);
    res.json(course);
 };

var addNewCourse = async (req,res)=>{
    var newCourse = new courseModel(req.body);
    await newCourse.save();
    res.json(newCourse); 
 };

var deleteCourse = async (req,res)=>{
    await courseModel.findByIdAndDelete(req.params.id);
    res.send("Deleted Successfully...");
 }; 

module.exports = {getAllCourses ,getCourseByID ,addNewCourse ,deleteCourse};