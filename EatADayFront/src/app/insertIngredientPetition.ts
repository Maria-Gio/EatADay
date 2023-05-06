import { Supermarket } from './supermarket';
export interface InsertIngredientPetition{
  supermarket:Supermarket,
  ingredient:string,
  user_id:number;
}
