import { Ingredients } from './ingredients';
import { Supermarket } from './supermarket';
export interface ShopListPetition {
  user_id: number,
  supermarket_id: number,

}
export interface editIngredientPetition {
  ingredient: Ingredients,
  user_id: number,
  supermarket: Supermarket
  edit_name: string,
  edit_price: number,
  edit_priceK: number,
  edit_userLike: boolean
}
