const express = require("express");
const app = express();
const PORT = process.env.PORT || 7500;
const bodyParser = require("body-parser");

const studentRouter = require('./Routes/studentsRoutes');
const courseRouter = require('./Routes/coursesRoutes');

const logging = require('./MiddleWares/logging');

app.use(bodyParser.urlencoded({extended:true}));
app.use(bodyParser.json());

//Global MiddleWare 
app.use("/",logging);

//For Students
app.use("/api/students",studentRouter);

//For Courses
app.use("/api/courses",courseRouter);


app.listen(PORT,()=>{console.log("http://localhost: " + PORT)});
