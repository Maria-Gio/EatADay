import { Component, EventEmitter, Input, Output } from '@angular/core';
import { debounceTime, delay, distinctUntilChanged, Observable, of, Subject, switchMap } from 'rxjs';
import { IngredientsService } from '../ingredients.service';
import { Ingredients } from '../ingredients';
import { HttpClient } from '@angular/common/http';
import { Result } from '../../../result';

@Component({
  selector: 'app-buscador-alimentos',
  templateUrl: './buscador-alimentos.component.html',
  styleUrls: ['./buscador-alimentos.component.scss']
})
export class BuscadorAlimentosComponent {

  public ingredients: Ingredients[] = [];
  @Input() ingredientPills: Ingredients[];
  @Output() eventClose: EventEmitter<void> = new EventEmitter();
  //lleva el $ porque es asincrona
  public ingredientsFound$: Observable<Ingredients[]> = of([]);
  public searchTerm: Subject<string> = new Subject();
  constructor(private IngredientsService: IngredientsService) { }
  ngOnInit(): void {
    // this.IngredientsService.getIngredients().pipe(delay(30)).subscribe((ingredients: Ingredients[]) => this.ingredients = ingredients);

    this.ingredientsFound$ = this.searchTerm.pipe(

      debounceTime(150),
      distinctUntilChanged(),
      switchMap(text => {
        return this.IngredientsService.searchIngredients(text);
      })
    )
  }
  public close(): void {
    this.eventClose.emit();
  }
  public addToRecipeList(ingredient: Ingredients) {
    let ingredientExists = this.ingredientPills.find((pill) => pill.id === ingredient.id);
    if (!ingredientExists) {
      this.ingredientPills.push(ingredient);
      console.log(this.ingredientPills);
    }
  }
  public search(value: string) {
    this.searchTerm.next(value);
  }
}
