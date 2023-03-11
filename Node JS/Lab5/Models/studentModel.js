const mongoose = require('mongoose');
var DB_URL = "mongodb://127.0.0.1:27017/school";
mongoose.connect(DB_URL,{useNewUrlParser:true});

let studentSchema = new mongoose.Schema({
        name:{type: String, pattern:"^[a-zA-Z]+$",required:true},
        dept:{type: String, enum:["SD","OS","AI","ES"],required:true,minLength:2}
});

module.exports = mongoose.model("students",studentSchema);