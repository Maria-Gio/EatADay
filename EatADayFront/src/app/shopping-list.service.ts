import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { catchError, map, Observable } from 'rxjs';
import { ShoppingList } from './shoppingList';
import { Supermarket } from './supermarket';
import { InsertIngredientPetition } from './insertIngredientPetition';
import { ApiResponse } from './apiResponse';
import { shopListResponse, UserShopListResponse } from './shopListResponse';
import { Ingredients } from './ingredients';
import { editIngredientPetition } from './shopListPetition';

@Injectable({
  providedIn: 'root'
})
export class ShoppingListService {
  private urlBase: string = 'http://localhost:8000/api/shoppingList';
  private urlBaseUser: string = 'http://localhost:8000/api/generalShoppingList';

  constructor(private http: HttpClient) {

  }
  public getSuperMarketUserShoppingList(userId: number, supermarketId: number): Observable<shopListResponse> {
    //POST
    console.log('hola');

    return this.http.get<shopListResponse>(this.urlBase + "/" + userId + "/" + supermarketId).pipe(catchError(e => {
      console.error(e);
      return [];
    }));
  }
  // public getBoughtSuperMarketUserShoppingList(userId: number, supermarketId: number): Observable<shopListResponse> {
  //   //POST
  //   console.log('hola comprado');

  //   return this.http.get<shopListResponse>(this.urlBase + "/" + userId + "/bought/" + supermarketId).pipe(catchError(e => {
  //     console.error(e);
  //     return [];
  //   }));
  // }
  public getUserShoppingList(id: number): Observable<UserShopListResponse> {
    return this.http.get<UserShopListResponse>(this.urlBaseUser + '/' + id).pipe(catchError(e => {
      console.error(e);
      return [];
    }), map(result => result));

  }

  public deleteIngredientFromUserList(userId: number, ingredient: Ingredients): Observable<UserShopListResponse> {

    return this.http.delete(this.urlBaseUser + "/" + userId + "/" + ingredient.id).pipe(catchError(e => {
      console.error(e);
      return [];
    }), map(result => result));
  }
  public deleteIngredientFromSupermarketList(userId: number, supermarketId: Supermarket, ingredient: Ingredients): Observable<UserShopListResponse> {

    return this.http.delete(this.urlBase + "/" + userId + "/" + supermarketId.id + "/" + ingredient.id).pipe(catchError(e => {
      console.error(e);
      return [];
    }), map(result => result));
  }
  public setBoughtBoolean(userId: number, supermarketId: Supermarket, ingredient: Ingredients): Observable<UserShopListResponse> {
    const data = {
      supermarketId: supermarketId,
      ingredient: ingredient,
      userId: userId
    };
    return this.http.post<UserShopListResponse>(this.urlBase + "/bought", data).pipe(catchError(e => {
      console.log(e);
      return [];
    }))
  }
  public ingredientToSpecificList(supermarket: Supermarket, ingredient: Ingredients, id: number): Observable<ApiResponse> {
    const data = {
      supermarket: supermarket,
      ingredient: ingredient,
      user_id: id
    };
    return this.http.post<InsertIngredientPetition>(this.urlBase + "/insert", data).pipe(catchError(e => {
      console.error(e);
      return [];
    }));
  }
  public ingredientToUserList(ingredient: Ingredients, id: number): Observable<ApiResponse> {
    const data = {

      ingredient: ingredient,
      user_id: id
    };
    return this.http.post<ApiResponse>(this.urlBaseUser + "/insert", data).pipe(catchError(e => {
      console.error(e);
      return [];
    }));
  }
  public editIngredient(userId: number, supermarketId: Supermarket, ingredient: Ingredients, formData: FormData): Observable<UserShopListResponse> {
    const data = {
      supermarketId: supermarketId,
      ingredient: ingredient,
      userId: userId,
      data: formData
    };
    return this.http.post<UserShopListResponse>(this.urlBase + "/edit", data).pipe(catchError(e => {
      console.log(e);
      return [];
    }))
  }

}
