const studentModel = require('../Models/studentModel');

var getAllStudents = async (req,res)=>{
    let allStudents = await studentModel.find();
    res.json(allStudents);
 };

var getStudentByID = async (req,res)=>{
    let student = await studentModel.findById(req.params.id);
    res.json(student);
 };

var addNewStudent = async (req,res)=>{
    var newStudent = new studentModel(req.body);
    await newStudent.save();
    res.json(newStudent);
 };

var deleteStudent = async (req,res)=>{
    await studentModel.findByIdAndDelete(req.params.id);
    res.send("Deleted Successfully...");
 };

module.exports = {getAllStudents,getStudentByID,addNewStudent,deleteStudent};