var userTicket = require("./module");

let flightTicket = userTicket.ticket;

var user = new flightTicket();
user.addTicket(1,1,25,"Borg Elarab","Dubai",new Date("2023-4-8"));
user.addTicket(2,5,26,"Borg Elarab","Saudi Arabia",new Date("2023-3-22"));

console.log("\nGet Ticket of ID = 1:");
user.getTicket(1);

console.log("\nDisplay All Tickets:");
user.displayAllTickets();

console.log("\nUpdate Ticket of ID = 1:");
user.updateTicket(1,5,26,"Tokio","Saudi Arabia",new Date("2023-5-5"));

console.log("\nDisplay All Tickets After Updating:");
user.displayAllTickets();

