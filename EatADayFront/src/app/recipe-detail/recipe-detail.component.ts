import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { RecipesService } from '../recipes.service';
import { Recipes } from '../recipes';
import { Location } from '@angular/common';


@Component({
  selector: 'app-recipe-detail',
  templateUrl: './recipe-detail.component.html',
  styleUrls: ['./recipe-detail.component.scss']
})
export class RecipeDetailComponent implements OnInit {
  public recipe?: Recipes;
  constructor(private route: ActivatedRoute, private recipeService: RecipesService,    private location: Location,



  ) {

  }

  ngOnInit(): void {

    let id: number = +this.route.snapshot.paramMap.get('id');
    this.recipeService.getRecipesByID(id).subscribe((recipe: Recipes) => {
      this.recipe = recipe;
      //Hay que cambiar las comillas de las migraciones
      console.log(recipe)
      // console.log(JSON.parse(this.recipe.displayIngredients));
      this.recipe.ingredients = JSON.parse(this.recipe.ingredients)
      this.recipe.displayIngredients=JSON.parse(this.recipe.displayIngredients);

      // this.recipe.ingredients=JSON.parse(this.recipe.ingredients);
    });


  }

  goPrint() {
    /*const jsPDF = require('jspdf');
    const divToPrint = document.getElementById('padre');  // <---------------------
    html2canvas(divToPrint).then(canvas => {
      const imgData = canvas.toDataURL('image/png');
      const pdf = new jsPDF('landscape', 'mm', 'a4');
      pdf.addImage(imgData, 'PNG', 0, 0, 297, 210);
      pdf.save('receta.pdf');
    });*/
  }

  goBack(): void {
    this.location.back();
  }
}
