const courseModel = require('../Models/courseModel');
const courseValidator = require('../Utils/courseValidator');

var getAllCourses = async (req,res)=>{
    let allCourses = await courseModel.find();
    res.json(allCourses);
 };

var getCourseByID = async (req,res)=>{
    let course = await courseModel.findById(req.params.id);
    res.json(course);
 };

var addNewCourse = async (req,res)=>{
    var foundCourse = await courseModel.findOne({courseName:req.body.courseName}).exec();
    if(foundCourse) return res.json("Course Already Exists..");
    var newCourse = new courseModel(req.body);
    var validCourse = courseValidator(newCourse);
    if(validCourse){
        await newCourse.save();
        res.json(newCourse);
    }else{
        res.json("Not Compatible...")
    }
 };

var deleteCourse = async (req,res)=>{
    await courseModel.findByIdAndDelete(req.params.id);
    res.send("Deleted Successfully...");
 }; 

module.exports = {getAllCourses ,getCourseByID ,addNewCourse ,deleteCourse};