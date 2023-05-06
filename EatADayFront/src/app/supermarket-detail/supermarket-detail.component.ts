import { Component } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ShoppingListService } from '../shopping-list.service';
import { ShoppingList } from '../shoppingList';
import { Supermarket } from '../supermarket';
import { SupermarketService } from '../supermarket.service';
import { ApiResponse } from '../apiResponse';
import { map, switchMap } from 'rxjs';
import { Location } from '@angular/common';
import { shopListResponse, UserShopListResponse } from '../shopListResponse';
import { Ingredients } from '../ingredients';
import { FormControl, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-supermarket-detail',
  templateUrl: './supermarket-detail.component.html',
  styleUrls: ['./supermarket-detail.component.scss']
})
export class SupermarketDetailComponent {
  public supermarket?: Supermarket;
  public userShoppingList?: Ingredients[];
  public userBoughtShoppingList?: Ingredients[];
  public id = JSON.parse(localStorage.getItem('user')).id;
  public response: ApiResponse;
  public editModal: boolean = false;
  public deleteModal: boolean = false;
  public deleteOption: boolean = null;
  public ingredientToEdit: Ingredients;
  public ingredientToDelete: Ingredients;
  constructor(private route: ActivatedRoute, private location: Location, private router: Router, private supermarketService: SupermarketService, private shoppingListService: ShoppingListService
  ) {

  }

  ngOnInit(): void {
    let id: number = +this.route.snapshot.paramMap.get('id');
    this.supermarketService.getSupermarketByID(id).subscribe((supermarket: Supermarket) => {
      this.supermarket = supermarket;
      this.shoppingListService.getSuperMarketUserShoppingList(this.id, supermarket.id).pipe(map(result => result)).subscribe((shopList: shopListResponse) => {
        // console.log(shopList);
        this.userShoppingList = shopList.data[0].ingredients.filter((ingredient) => !ingredient.isBought);
        this.userBoughtShoppingList = shopList.data[0].ingredients.filter((ingredient) => ingredient.isBought);
        console.log(shopList.data[0]);

      });


    })
  }
  public chose(ingredient: Ingredients) {
    this.deleteModal = true;
    this.ingredientToDelete = ingredient;
  }
  public delete() {

    this.shoppingListService.deleteIngredientFromSupermarketList(this.id, this.supermarket, this.ingredientToDelete).pipe(
      switchMap(() => this.shoppingListService.getSuperMarketUserShoppingList(this.id, this.supermarket.id))).subscribe((shopList: shopListResponse) => {
        // console.log(shopList);
        this.userShoppingList = shopList.data[0].ingredients.filter((ingredient) => !ingredient.isBought);
        this.userBoughtShoppingList = shopList.data[0].ingredients.filter((ingredient) => ingredient.isBought);
        console.log(shopList.data[0]);
        this.deleteModal = false;
      });


  }
  public closeSupermarkets() {
    this.router.navigate(['closeSupermarkets/' + this.supermarket.id])
  }
  public setBoughtTrue() {
    this.shoppingListService.setBoughtBoolean(this.id, this.supermarket, this.ingredientToDelete)
      .pipe(switchMap(() =>
        this.shoppingListService.getSuperMarketUserShoppingList(this.id, this.supermarket.id)))
      .subscribe((shopList: shopListResponse) => {
        this.userShoppingList = shopList.data[0].ingredients.filter((ingredient) => !ingredient.isBought);
        this.userBoughtShoppingList = shopList.data[0].ingredients.filter((ingredient) => ingredient.isBought);
        console.log(shopList.data[0]);

      })
    this.deleteModal = false;
  }

  public show() {
    console.log(this.userShoppingList);
  }
  public recharge() {
    this.shoppingListService.getSuperMarketUserShoppingList(this.id, this.supermarket.id).pipe(map(result => result)).subscribe((shopList: shopListResponse) => {
      // console.log(shopList);
      this.userShoppingList = shopList.data[0].ingredients.filter((ingredient) => !ingredient.isBought);
      this.userBoughtShoppingList = shopList.data[0].ingredients.filter((ingredient) => ingredient.isBought);
      console.log(shopList.data[0]);

    });
    this.editModal = false;
  }
  public goBack(): void {
    this.location.back();
  }
  public openEditModal(ingredient: Ingredients) {
    // this.settingsModal = true;
    this.editModal = true;
    this.ingredientToEdit = ingredient;
  }
}
