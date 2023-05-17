import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse, HttpHeaders } from "@angular/common/http";
import { catchError, map, Observable, of } from "rxjs";
import { Login } from "./login";
import { ApiResponse } from './apiResponse';
import { Router } from "@angular/router";

@Injectable({
  providedIn: 'root'
})
export class LoginService {

  idUser: number;

  private urlCheckLogin = "http://localhost:8000/api/login";
  private getUserLogged = "http://localhost:8000/api/soyyo";

  constructor(
    private http: HttpClient,
    private router: Router,
  ) { }



  public login(log: Login): Observable<boolean> {
    const postData = new FormData();
    postData.append('email', log.email);
    postData.append('password', log.password);

    return this.http.post<ApiResponse>(this.urlCheckLogin, postData).pipe(
      catchError((error: HttpErrorResponse) => {
        const errorMessage = error.error.message || 'Unknown error';
        return of({ success: false, message: errorMessage, data: null });
      })
    ).pipe(map((token: any) => {
      if (token.success) {
        localStorage.setItem("token", token.data.token);
        localStorage.setItem('mailToken', token.data.token);
        localStorage.setItem("user", JSON.stringify(token.data));
        if (localStorage.getItem('token')) {
          if (localStorage.getItem('verified')) {
            this.router.navigate(['matchAlimentos']);
          }
          console.log('fallo verificado')

          this.router.navigate(['verify']);
          //Meter aqui ruta al ternativa a no email verificado
        }
        return true
      }
      return false;
    }))
  }



  public getIdRoleUserLoged(): Observable<ApiResponse> {
    let token: string = localStorage.getItem('token');
    return this.http.get<ApiResponse>(this.getUserLogged, { headers: { "Accept": "application/json", "Authorization": `Bearer ${token}` } }).pipe(
      catchError(e => {
        console.error(e);
        return [];
      })
    ).pipe(map((result) => {
      localStorage.setItem("roleUserId", result.data.role_id);
      let id = localStorage.getItem('roleUserId');
      let userRole = JSON.parse(id)
      console.log('isLoggedIn')
      console.log(result.data)
      console.log(userRole);
      return result;
    }))

  }


}
