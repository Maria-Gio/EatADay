import { Injectable } from '@angular/core';
import {ActivatedRouteSnapshot, CanActivate, Route, Router, RouterStateSnapshot, UrlTree} from '@angular/router';
import {Observable, tap} from 'rxjs';
import {LoginService} from "./login.service";
import {HttpHeaders} from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})
export class LoginGGuard implements CanActivate {

  private token: string = localStorage.getItem('token');
  private headers: HttpHeaders;


  constructor(
    private router: Router
  ) {
    this.headers = new HttpHeaders({"Accept": "application/json", "Authorization": `Bearer ${this.token}`});
  }

  redirect(data: boolean): void {
    if(!data) {
      this.router.navigate(['/', 'login']);
    }
  }



  canActivate(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree {
    if (!this.token) {
      this.router.navigate(['/login']);
      alert("You dont have permissions");
      return false;
    }

    let id = localStorage.getItem('roleUserId');
    let userRole: number = JSON.parse(id);
    if(!(userRole === 1 || userRole === 2)){
      console.log("U arent log");
      this.router.navigate(['/', 'login']);
      alert("You dont have permissions");
      return false;
    }
    return true;
    }














}
