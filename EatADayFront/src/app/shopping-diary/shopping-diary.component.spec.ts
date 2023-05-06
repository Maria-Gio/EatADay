import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ShoppingDiaryComponent } from './shopping-diary.component';

describe('ShoppingDiaryComponent', () => {
  let component: ShoppingDiaryComponent;
  let fixture: ComponentFixture<ShoppingDiaryComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ShoppingDiaryComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ShoppingDiaryComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
