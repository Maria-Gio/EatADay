import { ShoppingList } from "./shoppingList";
import { Ingredients } from './ingredients';

export interface shopListResponse {
  success: boolean;
  message: string;
  data: [{
    id: number;
    ingredients: Ingredients[];
    user_id: number;
    supermarket_id: number;
  }]
}
export interface UserShopListResponse {
  success: boolean,
  message: string,
  data: {
    ingredients: Ingredients[];
  }
}
