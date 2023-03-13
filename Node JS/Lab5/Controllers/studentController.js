const studentModel = require('../Models/studentModel');
const studentValidator = require('../Utils/studentValidator');

var getAllStudents = async (req,res)=>{
    let allStudents = await studentModel.find();
    res.json(allStudents);
 };

var getStudentByID = async (req,res)=>{
    let student = await studentModel.findById(req.params.id);
    res.json(student);
 };

var addNewStudent = async (req,res)=>{
    var foundStudent = await studentModel.findOne({name:req.body.name,dept:req.body.dept}).exec();
    if(foundStudent) return res.json("Student Already Exists..");
    var newStudent = new studentModel(req.body);
    var validStudent = studentValidator(newStudent);
    if(validStudent){
        await newStudent.save();
        res.json(newStudent);
    }else{
        res.json("Not Compatible...")
    }
 };

var deleteStudent = async (req,res)=>{
    await studentModel.findByIdAndDelete(req.params.id);
    res.send("Deleted Successfully...");
 };

module.exports = {getAllStudents,getStudentByID,addNewStudent,deleteStudent};