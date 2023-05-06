import { HttpClient, HttpErrorResponse, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { catchError, map, Observable, of } from 'rxjs';
import { ApiResponse } from './apiResponse';
import { SugerenceRecipes } from './sugerencerecipe';

@Injectable({
  providedIn: 'root'
})
export class SugerenceRecipeService {
  private urlBase: string = 'http://localhost:8000/api/sugerenceRecipes';


  constructor(private http: HttpClient) { }


  public checkRecipes(log: SugerenceRecipes): Observable<ApiResponse> {
    return this.http.post<ApiResponse>(this.urlBase, log).pipe(
      catchError((error: HttpErrorResponse) => {
        console.error(error);
        const errorMessage = error.error.message || 'Unknown error';
        return of({ success: false, message: errorMessage, data: null });
      })
    ).pipe(map((result: ApiResponse)=>result))

  }
}
