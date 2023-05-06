import { ComponentFixture, TestBed } from '@angular/core/testing';

import { BuscadorMixtoComponent } from './buscador-mixto.component';

describe('BuscadorMixtoComponent', () => {
  let component: BuscadorMixtoComponent;
  let fixture: ComponentFixture<BuscadorMixtoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ BuscadorMixtoComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(BuscadorMixtoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
