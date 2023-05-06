import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { catchError, map, Observable } from 'rxjs';
import { Supermarket } from './supermarket';

@Injectable({
  providedIn: 'root'
})
export class SupermarketService {
  private urlBase: string = 'http://localhost:8000/api/supermarkets';
  constructor(private http: HttpClient) { }

  public getSupermarkets(): Observable<Supermarket[]> {
    return this.http.get<Supermarket[]>(this.urlBase).pipe(catchError(e => { console.error(e); return []; }),
      map(result => result['data']))

  }
  public getSupermarketByID(id: number): Observable<Supermarket> {
    const url = this.urlBase + "/" + id;

    return this.http.get<Supermarket>(url).pipe(catchError(e => {
      console.error(e);
      return [];
    }), map(result => result['data']));
  }
}
