import { Component, OnInit } from '@angular/core';
import { SupermarketService } from '../supermarket.service';
import { Supermarket } from '../supermarket';
import { ActivatedRoute } from '@angular/router';
import { DomSanitizer, SafeResourceUrl } from '@angular/platform-browser';

@Component({
  selector: 'app-close-supermarkets',
  templateUrl: './close-supermarkets.component.html',
  styleUrls: ['./close-supermarkets.component.scss']
})
export class CloseSupermarketsComponent implements OnInit {

  public supermarket?: Supermarket;
  public iframeURL?: SafeResourceUrl;
  constructor(private route: ActivatedRoute, private supermarketService: SupermarketService, private sanitizer: DomSanitizer
  ) {

  }
  ngOnInit(): void {
    let id: number = +this.route.snapshot.paramMap.get('id');
    this.supermarketService.getSupermarketByID(id).subscribe((supermarket: Supermarket) => {
      this.supermarket = supermarket;
      this.iframeURL = this.sanitizer.bypassSecurityTrustResourceUrl('https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d50270.4859317089!2d-0.903321360340685!3d38.04929123107228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s' + supermarket.name.toLocaleLowerCase() + '!5e0!3m2!1ses!2ses!4v1677162935655!5m2!1ses!2ses')
    });
  }


}
