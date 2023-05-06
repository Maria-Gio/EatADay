import { Injectable } from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {catchError, map, Observable} from "rxjs";
import {User} from "./user";
import {ApiResponse} from "./apiResponse";
import {ActivatedRoute} from "@angular/router";

@Injectable({
  providedIn: 'root'
})
export class UserService {
  private urlGetId: string = "http://localhost:8000/api/users/";

  constructor(
    private http: HttpClient,
    private route: ActivatedRoute,
  ) { }

  public getUserId(id: number): Observable<ApiResponse> {
    /*id = +this.route.snapshot.paramMap.get('id');*/
    return this.http.get<ApiResponse[]>(`${this.urlGetId}${id}/getuserid`).pipe(
      catchError(e => {
        console.error(e);
        return [];// le pasamos un array vacío para que no devuelva nada
      })
    ).pipe(map((result: ApiResponse)=>result))
  }









}
