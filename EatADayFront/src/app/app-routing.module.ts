import { NgModule, Component } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './login/login.component';
import { MatchRecetasComponent } from './match-recetas/match-recetas.component';
import { RecipeDetailComponent } from './recipe-detail/recipe-detail.component';
import { ShoppingDiaryComponent } from './shopping-diary/shopping-diary.component';
import { CloseSupermarketsComponent } from './close-supermarkets/close-supermarkets.component';
import { SupermarketDetailComponent } from './supermarket-detail/supermarket-detail.component';

import { QuestionDetailComponent } from './question-detail/question-detail.component';
import { QuestionsComponent } from './questions/questions.component';
import { SendRecipeComponent } from './send-recipe/send-recipe.component';



import {LoginGGuard} from "./login-g.guard";
import { VidasanaComponent } from './vidasana/vidasana.component';
import { VidasanaDetailComponent } from './vidasana-detail/vidasana-detail.component';
import { SugerenceRecipeService } from './sugerence-recipe.service';
import { UserQuestionsComponent } from './user-questions/user-questions.component';

const routes: Routes = [

  { path: 'login', component: LoginComponent },
  { path: 'matchAlimentos', component: MatchRecetasComponent },
  { path: 'RecipeDetail/:id', component: RecipeDetailComponent },
  { path: 'QuestionDetail/:id', component: QuestionDetailComponent, canActivate:[LoginGGuard] },
  { path: 'shoppingDiary', component: ShoppingDiaryComponent, canActivate:[LoginGGuard] },
  { path: 'send-recipe', component: SendRecipeComponent, canActivate:[LoginGGuard] },
  { path: 'supermarketDetail/:id', component: SupermarketDetailComponent, canActivate:[LoginGGuard] },
  { path: 'closeSupermarkets/:id', component: CloseSupermarketsComponent, canActivate:[LoginGGuard] },
  { path: 'vidasana', component: VidasanaComponent },
  { path: 'vidasanaDetail/:id', component: VidasanaDetailComponent, canActivate:[LoginGGuard] },
  { path: 'questions', component: QuestionsComponent },
  { path: 'questions', component: QuestionsComponent },
  { path: 'user-questions', component: UserQuestionsComponent },

  { path: '**', component: LoginComponent },

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})

export class AppRoutingModule { }

