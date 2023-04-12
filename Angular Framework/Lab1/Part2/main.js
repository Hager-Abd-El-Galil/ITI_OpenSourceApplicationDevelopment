class Account {
    constructor(Acc_no, Balance) {
        this.Acc_no = Acc_no;
        this.Balance = Balance;
    }
    debitAmount() { }
    creditAmount() { }
    getBalance() { }
}
class Current_Account extends Account {
    constructor(Acc_no, Balance, Interest_rate, Date_of_opening) {
        super(Acc_no, Balance);
        this.Interest_rate = Interest_rate;
        this.Date_of_opening = Date_of_opening;
    }
    addCustomer() {
        throw new Error("Method Not Implemented");
    }
    removeCustomer() {
        throw new Error("Method Not Implemented");
    }
}
class Saving_Account extends Account {
    constructor(Acc_no, Balance, Min_Balance, Date_of_opening) {
        super(Acc_no, Balance);
        this.Min_Balance = Min_Balance;
        this.Date_of_opening = Date_of_opening;
    }
    addCustomer() {
        throw new Error("Method Not Implemented");
    }
    removeCustomer() {
        throw new Error("Method Not Implemented");
    }
}
