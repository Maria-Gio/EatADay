import { HttpClient, HttpErrorResponse, HttpHeaders, HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { catchError, map, Observable, of } from 'rxjs';
import { ApiResponse } from './apiResponse';
import { Ingredients } from './ingredients';
import { Recipes } from './recipes';

@Injectable({
  providedIn: 'root'
})
export class RecipesService {
  private urlBase: string = 'http://localhost:8000/api/recipes';
  private headers = new HttpHeaders()
    .set('content-type', 'application/json')
    .set('Access-Control-Allow-Origin', '*')
    .set('Access-Control-Allow-Methods', 'GET,PUT,POST,OPTIONS')
    .set('Accept', 'application/json')
    .set('X-Requested-With', 'XMLHttpRequest');
  constructor(private http: HttpClient) { }

  public getRecipes(): Observable<Recipes[]> {
    return this.http.get<Recipes[]>(this.urlBase).pipe(catchError(e => { console.error(e); return []; }),
      map(result => result['data']))

  }
  public getRecipesByID(id: number): Observable<Recipes> {
    const url = this.urlBase + "/" + id;

    return this.http.get<Recipes>(url).pipe(catchError(e => {
      console.error(e);
      return [];
    }), map(result => result['data']));
  }
  public searchRecipes(ingredients: string[]): Observable<Recipes[]> {

    let url = this.urlBase + "/search";


    if (ingredients.length === 0) {
      return of([]);
    }

    console.log(ingredients);
    return this.http.post<Recipes[]>(url, ingredients, { "headers": this.headers }).pipe(catchError(e => {
      console.error(e);
      return [];
    }), map(result => result['data']))

  }






  
  public checkRecipes(log: Recipes): Observable<ApiResponse> {
    return this.http.post<ApiResponse>(this.urlBase, log).pipe(
      catchError((error: HttpErrorResponse) => {
        console.error(error);
        const errorMessage = error.error.message || 'Unknown error';
        return of({ success: false, message: errorMessage, data: null });
      })
    ).pipe(map((result: ApiResponse)=>result))

  }
}
