import { Component ,OnInit} from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { StudentsService } from 'src/app/Services/students.service';

@Component({
  selector: 'app-student-details',
  templateUrl: './student-details.component.html',
  styleUrls: ['./student-details.component.css']
})
export class StudentDetailsComponent implements OnInit{
  ID:any;
  Student:any;

  constructor(myRoute:ActivatedRoute, public myService : StudentsService){
    this.ID = myRoute.snapshot.params["id"];
  }

  ngOnInit(): void {
    this.myService.GetStudentById(this.ID).subscribe({
      next:(data)=>{
        this.Student = data;
      },
      error:(err)=>{},
    })
  }
}
