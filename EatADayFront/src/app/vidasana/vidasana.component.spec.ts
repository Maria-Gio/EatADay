import { ComponentFixture, TestBed } from '@angular/core/testing';

import { VidasanaComponent } from './vidasana.component';

describe('VidasanaComponent', () => {
  let component: VidasanaComponent;
  let fixture: ComponentFixture<VidasanaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ VidasanaComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(VidasanaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
