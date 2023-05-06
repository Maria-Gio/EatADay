import { Component, EventEmitter, Input, Output } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { switchMap } from 'rxjs';
import { Ingredients } from '../ingredients';
import { ShoppingListService } from '../shopping-list.service';
import { Supermarket } from '../supermarket';
import { UserShopListResponse } from '../shopListResponse';

@Component({
  selector: 'app-edit-modal',
  templateUrl: './edit-modal.component.html',
  styleUrls: ['./edit-modal.component.scss']
})
export class EditModalComponent {
  public formulario: FormGroup;
  public naturalOrDecimalPattern = /^[+-]?\d+(\.\d+)?$/;
  @Input() ingredientToEdit: Ingredients;
  @Input() supermarket: Supermarket;
  @Input() userId: number;
  @Output() eventEdit: EventEmitter<void> = new EventEmitter();
  constructor(private formBuilder: FormBuilder, private shoppingListService: ShoppingListService) { }

  ngOnInit(): void {
    this.formulario = this.formBuilder.group({
      name: [null, Validators.minLength(3)],
      price_k: [null, Validators.pattern(this.naturalOrDecimalPattern)],
      price: [null, Validators.pattern(this.naturalOrDecimalPattern)],
      userLike: [null]
    });
  }
  public saveInfo() {
    if (this.formulario.valid) {
      console.log(this.formulario.value)
      console.log(this.supermarket)
      console.log(this.userId)
      console.log(this.ingredientToEdit)
      this.shoppingListService.editIngredient(this.userId, this.supermarket, this.ingredientToEdit, this.formulario.value).subscribe((response:UserShopListResponse)=>{
        if(response.success){
          this.eventEdit.emit();
        }

      })
    }
  }

}

