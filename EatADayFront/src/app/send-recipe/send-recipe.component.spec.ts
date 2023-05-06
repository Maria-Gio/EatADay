import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SendRecipeComponent } from './send-recipe.component';

describe('SendRecipeComponent', () => {
  let component: SendRecipeComponent;
  let fixture: ComponentFixture<SendRecipeComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ SendRecipeComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(SendRecipeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
