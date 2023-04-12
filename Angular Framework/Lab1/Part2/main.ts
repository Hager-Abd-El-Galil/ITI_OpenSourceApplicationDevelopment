class Account{

   constructor(private Acc_no :number, private Balance :number){}

   debitAmount(){}
   creditAmount(){}
   getBalance(){}
}

interface IAccount{
    Date_of_opening:Date;

    addCustomer();
    removeCustomer(); 
}

class Current_Account extends Account implements IAccount{

    constructor(Acc_no, Balance, private Interest_rate :number, public Date_of_opening:Date){
        super(Acc_no, Balance);
    }

    addCustomer(){
        throw new Error("Method Not Implemented");
    }

    removeCustomer(){
        throw new Error("Method Not Implemented");
    }
}

class Saving_Account extends Account implements IAccount{

    constructor(Acc_no, Balance, private Min_Balance :number, public Date_of_opening:Date){
        super(Acc_no, Balance);
    }

    addCustomer(){
        throw new Error("Method Not Implemented");
    }

    removeCustomer(){
        throw new Error("Method Not Implemented");
    }

}
