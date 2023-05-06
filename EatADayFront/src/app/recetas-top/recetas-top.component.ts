import { Component } from '@angular/core';
import { delay, Subject } from 'rxjs';
import { Recipes } from '../recipes';
import { RecipesService } from '../recipes.service';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-recetas-top',
  templateUrl: './recetas-top.component.html',
  styleUrls: ['./recetas-top.component.scss']
})
export class RecetasTopComponent {
  public topRecipes: Recipes[] = [];
  public searchTerm: Subject<string> = new Subject();
  constructor(private RecipesService: RecipesService, private http: HttpClient) { }
  ngOnInit(): void {


    this.RecipesService.getRecipes().pipe(delay(30)).subscribe((recipes: Recipes[]) => this.topRecipes = recipes.sort(() => (Math.random() > .5) ? 1 : -1).slice(0, 3));

  }
}
