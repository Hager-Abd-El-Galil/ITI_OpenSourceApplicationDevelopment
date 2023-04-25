import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class StudentsService {

  private Base_URL = "http://localhost:3000/students"; 
  
  constructor(private readonly myClient : HttpClient) { }

  GetAllStudents(){
    return this.myClient.get(this.Base_URL);
  }

  GetStudentById(id:any){
    return this.myClient.get(this.Base_URL + "/" + id);
  }

  AddNewStudent(newStudent:any){
    return this.myClient.post(this.Base_URL ,newStudent);
  }

  DeleteStudent(id:any){
    return this.myClient.delete(this.Base_URL + "/" + id);
  }

  UpdateStudent(id:any, updatedStudent:any){
    return this.myClient.put(this.Base_URL + "/" + id, updatedStudent);
  }
}
