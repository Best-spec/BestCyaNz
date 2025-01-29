import { TestBed } from '@angular/core/testing';

import { ScriptEtcService } from './script-etc.service';

describe('ScriptEtcService', () => {
  let service: ScriptEtcService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ScriptEtcService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
