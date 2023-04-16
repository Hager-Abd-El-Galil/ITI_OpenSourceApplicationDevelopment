import { Component, EventEmitter, Output  } from '@angular/core';

@Component({
  selector: 'app-registration',
  templateUrl: './registration.component.html',
  styleUrls: ['./registration.component.css']
})
export class RegistrationComponent {
  studentName = "";
  studentAge = "";
  @Output() registrationEvent = new EventEmitter();

  Add(){
    if(this.studentName.length >= 3 && +this.studentAge > 20 && +this.studentAge < 40 ){
      let newStudent = {name:this.studentName, age:this.studentAge};
      this.registrationEvent.emit(newStudent);
      this.studentName = "";
      this.studentAge = "";
    } 
  }
}
