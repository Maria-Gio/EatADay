import { HttpErrorResponse } from '@angular/common/http';
import { Component } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { ApiResponse } from '../apiResponse';

import { SugerenceRecipeService } from '../sugerence-recipe.service';
import { SugerenceRecipes } from '../sugerencerecipe';

@Component({
  selector: 'app-send-recipe',
  templateUrl: './send-recipe.component.html',
  styleUrls: ['./send-recipe.component.scss']
})
export class SendRecipeComponent {

  private user = localStorage.getItem('user');
  private objetoId = JSON.parse(this.user);
  private userid= this.objetoId.id;


  public recipesForm = new FormGroup({
    id: new FormControl(),
    title: new FormControl("",[ //usuario@eataday.com
      Validators.required,
    ]),
    // photo: new FormControl("", [
    //   Validators.required,
    // ]),
    ingredients: new FormControl("", [
      Validators.required,
    ]),
    description: new FormControl("", [
      Validators.required,
    ]),
    isChecked: new FormControl(false)
  });


  public recipes: SugerenceRecipes[];

  public constructor(
    private recipeService: SugerenceRecipeService ,
    private route: Router

  ) { }


  ngOnInit(): void {
    this.recipesForm.valueChanges.subscribe(values => {

    })
  }

  public recipeCheck() {
    let body = {
      title: this.recipesForm.value.title,
      // photo: this.recipesForm.value.photo,
      ingredients: this.recipesForm.value.ingredients,
      description: this.recipesForm.value.description,
      isChecked: this.recipesForm.value.isChecked,
      user_id: this.userid
    }
    this.recipeService.checkRecipes(body as SugerenceRecipes).subscribe((res) => {
      // if(res.success) {
      //   console.log("res");

      // } else if( HttpErrorResponse ){
      //   alert("asassasas");
      // }

        console.log(body);

    })
  }

  public reset(): void {
    this.recipesForm.reset();
  }
}
