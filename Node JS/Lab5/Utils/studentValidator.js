const Ajv = require("ajv");
var ajv = new Ajv();

studentSchema =  {
    "type": "object",
    "properties": 
    {
        "name":{
            "type": "string", 
            "pattern":"^[a-zA-Z]+$"
        },
        "dept":{
            "type": "string", 
            "enum":["SD","OS","AI","ES"],
        }
    },
    "required":["name","dept"]
}

module.exports = ajv.compile(studentSchema);