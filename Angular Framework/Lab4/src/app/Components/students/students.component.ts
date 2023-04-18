import { Component } from '@angular/core';

@Component({
  selector: 'app-students',
  templateUrl: './students.component.html',
  styleUrls: ['./students.component.css']
})
export class StudentsComponent {
  allStudentsList : {name:string, age:string, phone:string, address:string, email:string}[] = [
    {name:'Hager', age:'23', phone:'01121453657', address:'Alexandria, Egypt', email:'Hager@gmail.com'},
    {name:'Mahmoud', age:'25', phone:'01001423541', address:'Cairo, Egypt', email:'Mahmoud@gmail.com'},
    {name:'Ahmed', age:'27', phone:'01550042134', address:'Alexandria, Egypt', email:'Ahmed@gmail.com'},
    {name:'Alaa', age:'21', phone:'01114545210', address:'Cairo, Egypt', email:'Alaa@gmail.com'},
    {name:'Arwa', age:'19', phone:'01203312511', address:'Alexandria, Egypt', email:'Arwa@gmail.com'},
  ];

}
