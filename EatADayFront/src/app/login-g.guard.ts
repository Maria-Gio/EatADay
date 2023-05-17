import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate, Route, Router, RouterStateSnapshot, UrlTree } from '@angular/router';
import { Observable, tap } from 'rxjs';
import { LoginService } from "./login.service";
import { HttpHeaders } from "@angular/common/http";
import { User } from './user';

@Injectable({
  providedIn: 'root'
})
export class LoginGGuard implements CanActivate {

  private token: string = localStorage.getItem('token');
  private mailToken: string = localStorage.getItem('mailToken');
  private verified: string = localStorage.getItem('verified');
  private headers: HttpHeaders;


  constructor(
    private router: Router
  ) {
    this.headers = new HttpHeaders({ "Accept": "application/json", "Authorization": `Bearer ${this.token}` });
  }

  redirect(data: any): void {
    // console.log(data)
    if (!data) {
      this.router.navigate(['/', 'login']);
    }
  }



  canActivate(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree {
    let user: User = JSON.parse(localStorage.getItem('user'));
    console.log(user.verified)
    if (!this.token) {
      this.router.navigate(['/login']);
      alert("You dont have permissions1");
      return false;
    }
    // console.log(localStorage.getItem('verified')+'  aqui')
    if (user.verified === 0) {
      this.router.navigate(['/verify']);
      alert("Your email isnt verified");
      return false;
    }


    let userRole = user.id;
    if (!(userRole === 1 || userRole === 2)) {
      console.log(user.id)
      console.log(userRole)
      console.log("U arent log");
      // this.router.navigate(['/', 'login']);
      alert("You dont have permissions2");
      return false;
    }
    return true;
  }














}
