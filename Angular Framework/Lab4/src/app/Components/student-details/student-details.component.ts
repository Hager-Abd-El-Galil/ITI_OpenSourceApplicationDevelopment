import { Component } from '@angular/core';
import {ActivatedRoute} from '@angular/router'

@Component({
  selector: 'app-student-details',
  templateUrl: './student-details.component.html',
  styleUrls: ['./student-details.component.css']
})
export class StudentDetailsComponent {
  studentID=0;
  constructor(myRoute:ActivatedRoute){
    this.studentID = myRoute.snapshot.params["id"];
  }
}
