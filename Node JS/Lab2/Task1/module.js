class ticket{
    
    tickets = [];

    addTicket(id,seatNum,flightNum,departureAirport,arrivalAirport,travellingDate){
        let ticket = {
            id,
            seatNum,
            flightNum,
            departureAirport,
            arrivalAirport,
            travellingDate
        }
        this.tickets.push(ticket);
    }

    displayAllTickets(){
        this.tickets.forEach((elem) => {
            console.log(elem);
        })
    }

    getTicket(id){
        this.tickets.forEach((elem) => {
            if(elem.id === id){
                console.log(elem)
            }
        })
    }

    updateTicket(id,seatNum,flightNum,departureAirport,arrivalAirport,travellingDate){
        this.tickets.forEach((elem) => {
            if(elem.id === id){
                elem.id = id;
                elem.seatNum = seatNum;
                elem.flightNum = flightNum;
                elem.departureAirport = departureAirport;
                elem.arrivalAirport = arrivalAirport;
                elem.travellingDate = travellingDate;

                this.getTicket(id);
            }
        })
    }
    
}

module.exports = {
    ticket
}