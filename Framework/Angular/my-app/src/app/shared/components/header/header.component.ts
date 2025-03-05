import { Component } from '@angular/core';

@Component({
  selector: 'app-header',
  imports: [],
  templateUrl: './header.component.html',
  styleUrl: './header.component.css',
})
export class HeaderComponent {
  showContent = false;

  toggleDisplay() {
    // alert('ZZZZZZZZ');
    this.showContent = !this.showContent;
  }
}
