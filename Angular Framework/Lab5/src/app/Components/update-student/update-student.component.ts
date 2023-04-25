import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { StudentsService } from 'src/app/Services/students.service';

@Component({
  selector: 'app-update-student',
  templateUrl: './update-student.component.html',
  styleUrls: ['./update-student.component.css']
})
export class UpdateStudentComponent implements OnInit{
  ID:any;
  student:any;
  isUpdated:boolean = false;
  
  constructor(myRoute:ActivatedRoute, public myService : StudentsService){
    this.ID = myRoute.snapshot.params["id"];
  }
  ngOnInit(): void {
    this.myService.GetStudentById(this.ID).subscribe({
      next:(data)=>{
        this.student = data;
      },
      error:(err)=>{},
    })
  }

  Update(name:any, age:any, email:any, phone:any, grade:any){
      let updatedStudent = {name, age, email, phone, grade};
      this.myService.UpdateStudent(this.ID, updatedStudent).subscribe();    
      this.isUpdated = true;
  }
}
