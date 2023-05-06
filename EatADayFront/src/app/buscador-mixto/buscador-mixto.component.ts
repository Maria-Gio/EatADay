import { Component, ElementRef, EventEmitter, Output, ViewChild } from '@angular/core';
import { debounceTime, distinctUntilChanged, Observable, of, Subject, switchMap } from 'rxjs';
import { IngredientsService } from '../ingredients.service';
import { Ingredients } from '../ingredients';
import { Supermarket } from '../supermarket';

@Component({
  selector: 'app-buscador-mixto',
  templateUrl: './buscador-mixto.component.html',
  styleUrls: ['./buscador-mixto.component.scss']
})
export class BuscadorMixtoComponent {
  public ingredients: Ingredients[] = [];
  //lleva el $ porque es asincrona
  public ingredientsFound$: Observable<Ingredients[]> = of([]);
  public searchTerm: Subject<string> = new Subject();
  @Output() ingredientToSpecificList = new EventEmitter<Ingredients>();
  @Output() ingredientToUserList = new EventEmitter<Ingredients>();
  @ViewChild('inputSearch') inputSearch: ElementRef<HTMLInputElement>;
  constructor(private IngredientsService: IngredientsService) { }
  ngOnInit(): void {

    this.ingredientsFound$ = this.searchTerm.pipe(

      // debounceTime(150),
      // distinctUntilChanged(),
      switchMap(text => {
        return this.IngredientsService.searchMixIngredients(text);
      })
    )
  }

  public search(value: string) {
    this.searchTerm.next(value);
  }

  public choseSupermarket(ingredient: Ingredients) {
    this.ingredientToSpecificList.emit(ingredient);
    this.inputSearch.nativeElement.value = '';
    this.ingredientsFound$ = of([]);

  }
  public toUserList(ingredient:Ingredients) {
    console.log(ingredient);
    this.ingredientToUserList.emit(ingredient);
    this.inputSearch.nativeElement.value = '';
    this.ingredientsFound$ = of([]);
  }
}
