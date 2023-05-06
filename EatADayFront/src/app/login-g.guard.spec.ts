import { TestBed } from '@angular/core/testing';

import { LoginGGuard } from './login-g.guard';

describe('LoginGGuard', () => {
  let guard: LoginGGuard;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    guard = TestBed.inject(LoginGGuard);
  });

  it('should be created', () => {
    expect(guard).toBeTruthy();
  });
});
