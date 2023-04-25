import { Component ,OnInit} from '@angular/core';
import { StudentsService } from 'src/app/Services/students.service';

@Component({
  selector: 'app-students',
  templateUrl: './students.component.html',
  styleUrls: ['./students.component.css']
})

export class StudentsComponent implements OnInit{
  Students:any;
  ID:any;
  constructor(public myService : StudentsService){}

  ngOnInit(): void {
    this.myService.GetAllStudents().subscribe({
      next:(data)=>{
        this.Students = data;
      },
      error:(err)=>{}
    })
  }

  GetId(id:any){
    this.ID = id;
  }

  Delete(){
    this.myService.DeleteStudent(this.ID).subscribe();
  }

}

