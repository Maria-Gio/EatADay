export interface Recipes {
  id?: number,
  title: string,
  photo: string,
  ingredients: string,
  displayIngredients: string,
  preparation: string,
  description: string,
  isChecked: boolean,

}
// <!-- 'title' => 'required|string',
//     'photo' => 'nullable|string',
//     'ingredients' => 'required|string',
//     'displayIngredients' => 'required|string',
//     'preparation' => 'required|string',
//     'description' => 'required|string',
//     'isChecked' =>'boolean' -->
