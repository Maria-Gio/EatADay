import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CloseSupermarketsComponent } from './close-supermarkets.component';

describe('CloseSupermarketsComponent', () => {
  let component: CloseSupermarketsComponent;
  let fixture: ComponentFixture<CloseSupermarketsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CloseSupermarketsComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(CloseSupermarketsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
