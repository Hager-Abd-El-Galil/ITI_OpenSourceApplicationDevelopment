import { Component } from '@angular/core';
import { StudentsService } from 'src/app/Services/students.service';
import { FormControl, FormGroup, FormBuilder, Validators } from '@angular/forms';

@Component({
  selector: 'app-add-new-student',
  templateUrl: './add-new-student.component.html',
  styleUrls: ['./add-new-student.component.css']
})
export class AddNewStudentComponent {

  constructor(private myService : StudentsService){}

  FormValid:any;
  validationForm = new FormGroup({
    studentName:new FormControl(null,[Validators.required, Validators.minLength(3)]),
    studentAge:new FormControl(null,[Validators.required, Validators.min(20),Validators.max(40)]),
    studentEmail:new FormControl(null,[Validators.required, Validators.email]),
    studentPhone:new FormControl(null,[Validators.required, Validators.minLength(11), Validators.maxLength(11)]),
  })

  get StudentNameValid(){
    return this.validationForm.controls["studentName"].valid;
  }

  get StudentAgeValid(){
    return this.validationForm.controls["studentAge"].valid;
  } 

  get StudentEmailValid(){
    return this.validationForm.controls["studentEmail"].valid;
  }

  get StudentPhoneValid(){
    return this.validationForm.controls["studentPhone"].valid;
  }


  Add(name:any, age:any, email:any, phone:any, grade:any){
    this.FormValid = this.validationForm.valid;
    if(this.FormValid){
      let newStudent = {name, age, email, phone, grade};
      this.myService.AddNewStudent(newStudent).subscribe();    
    }

  }
  
}
