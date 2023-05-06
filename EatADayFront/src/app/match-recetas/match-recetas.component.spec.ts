import { ComponentFixture, TestBed } from '@angular/core/testing';

import { MatchRecetasComponent } from './match-recetas.component';

describe('MatchRecetasComponent', () => {
  let component: MatchRecetasComponent;
  let fixture: ComponentFixture<MatchRecetasComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ MatchRecetasComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(MatchRecetasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
