import { Component } from '@angular/core';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent {
  public showModals: boolean = false;
  public showRegister: boolean = false;
  public showLogin: boolean = true;


  public getModals(): void {
    this.showModals = !this.showModals;
  }
  public getRegisterModal(): void {
    this.showRegister = !this.showRegister;
    this.showLogin = false;
  }
  public getLoginModal(): void {
    this.showLogin = !this.showLogin;
    this.showRegister = false;
  }
}
