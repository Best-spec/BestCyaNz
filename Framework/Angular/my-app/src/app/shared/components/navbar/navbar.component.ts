import { Component, Input } from '@angular/core';
import { AppComponent } from '../../../app.component';

@Component({
  selector: 'app-navbar',
  imports: [AppComponent],
  templateUrl: './navbar.component.html',
  styleUrl: './navbar.component.css',
})
export class NavbarComponent {
  message = 'Hello Boonyarit';
  @Input() lname!: string;
}
