import {Component, OnInit} from '@angular/core';
import {FormControl, FormGroup, Validators} from "@angular/forms";
import {LoginService} from "../login.service";
import {Login} from "../login";
import {HttpErrorResponse, HttpHeaders} from "@angular/common/http";
import {data} from "autoprefixer";
import {ApiResponse} from "../apiResponse";
import { Router } from "@angular/router";


@Component({
  selector: 'app-loggin-form',
  templateUrl: './loggin-form.component.html',
  styleUrls: ['./loggin-form.component.scss']
})

export class LogginFormComponent /*implements OnInit */{


  public loginForm = new FormGroup({
    id: new FormControl(),
    email: new FormControl("",[ //usuario@eataday.com
      Validators.required,
      Validators.email
    ]),
    password: new FormControl("password", [
      Validators.required,
      Validators.minLength(6)
    ]),
    terms: new FormControl("", [
      Validators.required,
      Validators.requiredTrue
    ])

  });


  public users: Login[];
  private token: string = localStorage.getItem('token');
  private headers: HttpHeaders;

  public constructor(
    private loginService: LoginService,
    private router: Router,


  ) { }


  public loginCheck() {
    return this.loginService.login(this.loginForm.value as Login).subscribe()
  }



  public reset(): void {
    this.loginForm.reset();
  }

}


