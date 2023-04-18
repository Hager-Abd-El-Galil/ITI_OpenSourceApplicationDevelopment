import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { RegisterationComponent } from './Components/registeration/registeration.component';
import { StudentsComponent } from './Components/students/students.component';
import { StudentDetailsComponent } from './Components/student-details/student-details.component';
import { ErrorComponent } from './Components/error/error.component';
import { HeaderComponent } from './Components/header/header.component';
import { FooterComponent } from './Components/footer/footer.component';
import { RouterModule, Routes } from '@angular/router';

let routes:Routes = [
  {path:"registeration", component:RegisterationComponent},
  {path:"", component:RegisterationComponent},
  {path:"students", component:StudentsComponent},
  {path:"students/:id", component:StudentDetailsComponent},
  {path:"**", component:ErrorComponent}
]

@NgModule({
  declarations: [
    AppComponent,
    RegisterationComponent,
    StudentsComponent,
    StudentDetailsComponent,
    ErrorComponent,
    HeaderComponent,
    FooterComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    AppRoutingModule,
    ReactiveFormsModule,
    RouterModule.forRoot(routes)
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
