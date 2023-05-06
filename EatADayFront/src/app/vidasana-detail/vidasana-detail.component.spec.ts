import { ComponentFixture, TestBed } from '@angular/core/testing';

import { VidasanaDetailComponent } from './vidasana-detail.component';

describe('VidasanaDetailComponent', () => {
  let component: VidasanaDetailComponent;
  let fixture: ComponentFixture<VidasanaDetailComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ VidasanaDetailComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(VidasanaDetailComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
