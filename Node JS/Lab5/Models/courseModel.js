const mongoose = require("mongoose");
var DB_url = "mongodb://127.0.0.1:27017/school";
mongoose.connect(DB_url, { useNewUrlParser:true });
let CourseSchema = new mongoose.Schema({
        courseName:{type: String, pattern:"^[a-zA-Z]+$",required:true},
        degree:{type: String, enum:["Fair","Good","Very Good","Excellent"],required:true}
});

module.exports = mongoose.model("courses", CourseSchema);