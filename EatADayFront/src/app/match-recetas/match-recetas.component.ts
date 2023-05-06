import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Ingredients } from '../ingredients';
import { debounceTime, distinctUntilChanged, Observable, of, Subject, switchMap } from 'rxjs';
import { Recipes } from '../recipes';
import { RecipesService } from '../recipes.service';
import { UserService } from "../user.service";
import { ActivatedRoute, Router } from "@angular/router";
import { LoginService } from "../login.service";
import { User } from "../user";
@Component({
  selector: 'app-match-recetas',
  templateUrl: './match-recetas.component.html',
  styleUrls: ['./match-recetas.component.scss']
})
export class MatchRecetasComponent {
  public showFinder: boolean = false;
  public ingredientPills: Ingredients[] = [];
  public ingredientNames: string[] = [];

  // public recipesFound$: Observable<Recipes[]> = of([]);
  public recipesFound$: Recipes[] = [];

  /*  private rolIdUser: number;*/



  constructor(
    private RecipesService: RecipesService,
    private userService: UserService,
    private route: ActivatedRoute,
    private loginService: LoginService

  ) { }
  ngOnInit(): void {

    this.loginService.getIdRoleUserLoged().subscribe();
  }

  public getShowFinder(): void {
    if (this.showFinder === false) {
      this.showFinder = !this.showFinder;

    }
  }
  public deleteFromIngredientList(ingredient: Ingredients): void {
    console.log(ingredient)
    this.ingredientPills = this.ingredientPills.filter(ingredienteLista => ingredienteLista.name !== ingredient.name)
  }
  public searchRecipe() {
    this.ingredientNames = this.ingredientPills.map(ingredient => ingredient.name.toLowerCase());
    console.log(this.ingredientNames)
    this.RecipesService.searchRecipes(this.ingredientNames).subscribe(response => this.recipesFound$ = response);
    console.log(this.recipesFound$);
    this.ingredientPills = [];
    this.showFinder = false;
  }
  public close() {
    this.showFinder = false;
  }

}
