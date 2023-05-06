import { Component, OnInit } from '@angular/core';
import { RecommendationsService } from '../recommendations.service';
import { ActivatedRoute } from '@angular/router';
import { Location } from '@angular/common';
import { Recommendations } from '../recommendations';
import { DomSanitizer, SafeResourceUrl } from '@angular/platform-browser';

@Component({
  selector: 'app-vidasana-detail',
  templateUrl: './vidasana-detail.component.html',
  styleUrls: ['./vidasana-detail.component.scss']
})
export class VidasanaDetailComponent implements OnInit {

  public iframeURL?: SafeResourceUrl;

  constructor(
    private RecommendationsService: RecommendationsService,
    private route: ActivatedRoute,
    private location: Location,
    private sanitizer: DomSanitizer
  ) {

  }


  idRecomm: Recommendations;




  ngOnInit(): void {
    this.getIdRecom();
  }

  getIdRecom(): void {
    const id = Number(this.route.snapshot.paramMap.get('id'));
    this.RecommendationsService
      .getRecommnByID(id)
      .subscribe((recommendations: Recommendations) => {
        this.idRecomm = recommendations;
        this.iframeURL = this.sanitizer.bypassSecurityTrustResourceUrl(recommendations.video)
      });

  }

  goBack(): void {
    this.location.back();
  }
}
