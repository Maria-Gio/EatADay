import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Results, User } from './register';
import { Observable } from 'rxjs';
import { FormGroup } from '@angular/forms';


@Injectable({
  providedIn: 'root'
})
export class RegisterService {

  private headers= new HttpHeaders()
  .set('content-type', 'application/json')
  .set('Access-Control-Allow-Origin', '*')
  .set('X-Requested-With','XMLHttpRequest');
  

  public urlback: string = 'http://localhost:8000/api/signup';
  constructor(private http: HttpClient) { }

  register(registerForm: FormGroup): Observable<Results>{
    return this.http.post<Results>(this.urlback, registerForm, {'headers': this.headers} );
  }

}
//
