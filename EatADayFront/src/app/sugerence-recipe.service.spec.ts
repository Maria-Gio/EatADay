import { TestBed } from '@angular/core/testing';

import { SugerenceRecipeService } from './sugerence-recipe.service';

describe('SugerenceRecipeService', () => {
  let service: SugerenceRecipeService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(SugerenceRecipeService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
