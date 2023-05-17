import { Component, OnInit } from '@angular/core';
import { Supermarket } from '../supermarket';

import { SupermarketService } from '../supermarket.service';
import { ShoppingList } from '../shoppingList';
import { ShoppingListService } from '../shopping-list.service';
import { map, switchMap } from 'rxjs';
import { Input } from '@angular/core';
import { ApiResponse } from '../apiResponse';
import { Router } from '@angular/router';
import { Ingredients } from '../ingredients';
import { UserShopListResponse } from '../shopListResponse';

@Component({
  selector: 'app-shopping-diary',
  templateUrl: './shopping-diary.component.html',
  styleUrls: ['./shopping-diary.component.scss']
})
export class ShoppingDiaryComponent implements OnInit {
  public supermarkets?: Supermarket[];
  public userShoppingList?: Ingredients[];
  public selectedSupermarket: Supermarket;
  // @Input() modalSupermarket: Supermarket[];
  public  id = JSON.parse(localStorage.getItem('user')).id;
  public  verified = localStorage.getItem('mailToken');

  // public id: number = 2;
  public ingredientToUserList: Ingredients;
  public supermarketModal: boolean = false;
  public insertResponse: ApiResponse;
  constructor(private supermarketService: SupermarketService, private shoppingListService: ShoppingListService, private router: Router
  ) {

  }



  ngOnInit(): void {

    this.shoppingListService.getUserShoppingList(this.id).subscribe((shopList: UserShopListResponse) => {
      // console.log(shopList.data.ingredients);
      this.userShoppingList = shopList.data.ingredients;
      // this.userShoppingList = JSON.parse(shopList.data.ingredients);
      console.log(this.userShoppingList)

    });


    this.supermarketService.getSupermarkets().subscribe((supermarkets: Supermarket[]) => {
      this.supermarkets = supermarkets;

    });

  }
  public Show() {
    console.log(this.userShoppingList);
  }
  public delete(ingredient: Ingredients) {
    console.log(ingredient)
    this.shoppingListService.deleteIngredientFromUserList(this.id, ingredient).pipe(
      switchMap(() => this.shoppingListService.getUserShoppingList(this.id))
    ).subscribe((shopList: UserShopListResponse) => {
      this.userShoppingList = shopList.data.ingredients;
      console.log(this.userShoppingList)
      // this.userShoppingList.ingredients = JSON.parse(this.userShoppingList.ingredients);
    });
  }
  public openModal(ingredient: Ingredients) {
    this.supermarketModal = true;
    this.ingredientToUserList = ingredient;
  }
  public choseSupermarket(chosenSupermarket: Supermarket): void {
    this.selectedSupermarket = chosenSupermarket;
    console.log(this.selectedSupermarket);
    console.log(this.ingredientToUserList);
    this.shoppingListService.ingredientToSpecificList(this.selectedSupermarket, this.ingredientToUserList, this.id).subscribe((response: ApiResponse) => {
      console.log(response);
      if (response.success) {
        this.supermarketModal = false;
        this.delete(this.ingredientToUserList)
      }
    });
  }
  public toUserList(ingredient: Ingredients): void {
    this.shoppingListService.ingredientToUserList(ingredient, this.id).pipe(
      switchMap(() => this.shoppingListService.getUserShoppingList(this.id))
    ).subscribe((shopList: UserShopListResponse) => {
      console.log(shopList);

      this.userShoppingList = shopList.data.ingredients;
      // this.userShoppingList.ingredients = JSON.parse(this.userShoppingList.ingredients);
    });

  }
  public toSupermarketList(ingredient: Ingredients): void {
    this.openModal(ingredient);

  }
  public goToSupermarketDetail(id: number): void {
    this.router.navigate(['supermarketDetail/'])
  }

}
