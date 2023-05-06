import { ComponentFixture, TestBed } from '@angular/core/testing';

import { RecetasTopComponent } from './recetas-top.component';

describe('RecetasTopComponent', () => {
  let component: RecetasTopComponent;
  let fixture: ComponentFixture<RecetasTopComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ RecetasTopComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(RecetasTopComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
