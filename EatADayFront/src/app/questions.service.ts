import { Injectable } from '@angular/core';
import {HttpClient, HttpErrorResponse} from "@angular/common/http";
import {catchError, map, Observable, of} from "rxjs";
import {Login} from "./login";
import { ApiResponse } from './apiResponse';
import {data} from "autoprefixer";
import { Questions } from './questions';
import { QuestionsArray } from './question-array';

@Injectable({
  providedIn: 'root'
})
export class questionService {

  private urlGetQuestions= "http://localhost:8000/api/comments";


  constructor(private http: HttpClient) { }

  public getComents(): Observable<QuestionsArray> {
    return this.http.get<QuestionsArray>(this.urlGetQuestions).pipe(
      catchError(e => {
        console.error(e);
        return [];
      })
    )

  }

  // public getCommentsText(id: number): Observable<Questions[]>{
  //   return this.http.get<Questions>(this.urlGetQuestions + '/' + id ).pipe(map((result: Questions[]) => result))
  // }

  // getHeroesById(id: number): Observable<Questions[]> {
  //   return this.http
  //     .get<Questions>(this.urlGetQuestions + '/' + id )
  //     .pipe(map((result: Questions) => result.ids));
  // }

  public getQuestionByID(id: number): Observable<Questions> {
    const url = this.urlGetQuestions + "/" + id;

    return this.http.get<Questions>(url).pipe(catchError(e => {
      console.error(e);
      return [];
    }), map(result => result['data']));
  }




  public checkcoments(log: Questions): Observable<ApiResponse> {
    return this.http.post<ApiResponse>(this.urlGetQuestions, log).pipe(
      catchError((error: HttpErrorResponse) => {
        console.error(error);
        const errorMessage = error.error.message || 'Unknown error';
        return of({ success: false, message: errorMessage, data: null });
      })
    ).pipe(map((result: ApiResponse)=>result))

  }

}
