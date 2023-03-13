const Ajv = require("ajv");
var ajv = new Ajv();

courseSchema =  {
    "type": "object",
    "properties": 
    {
        "courseName":{
            "type": "string", 
            "pattern":"^[a-zA-Z]+$"
        },
        "degree":{
            "type": "string", 
            "enum":["Fair","Good","Very Good","Excellent"],
        }
    },
    "required":["courseName","degree"]
}

module.exports = ajv.compile(courseSchema);