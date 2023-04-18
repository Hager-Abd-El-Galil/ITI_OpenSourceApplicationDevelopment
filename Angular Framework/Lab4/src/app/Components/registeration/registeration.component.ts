import { Component } from '@angular/core';
import { FormControl, FormGroup, FormBuilder, Validators } from '@angular/forms';

@Component({
  selector: 'app-registeration',
  templateUrl: './registeration.component.html',
  styleUrls: ['./registeration.component.css']
})
export class RegisterationComponent {
  FormValid:any;
  validationForm = new FormGroup({
    studentName:new FormControl(null,[Validators.required, Validators.minLength(3)]),
    studentAge:new FormControl(null,[Validators.required, Validators.min(20),Validators.max(40)]),
    studentEmail:new FormControl(null,[Validators.required, Validators.email])
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

  Add(){
    this.FormValid = this.validationForm.valid;
  }

}
