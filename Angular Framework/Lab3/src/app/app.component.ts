import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Lab3';
  allStudents :{name:string, age:string}[] = [];

  getData(data:any){
    this.allStudents.push(data);
    console.log(this.allStudents)
  }
}
