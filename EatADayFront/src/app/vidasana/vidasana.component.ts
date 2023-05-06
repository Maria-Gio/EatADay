import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { delay, Subject } from 'rxjs';
import { Recommendations } from '../recommendations';
import { RecommendationsService } from '../recommendations.service';


@Component({
  selector: 'app-vidasana',
  templateUrl: './vidasana.component.html',
  styleUrls: ['./vidasana.component.scss']
})
export class VidasanaComponent implements OnInit {
recommendation: any;

  constructor(private RecommendationsService: RecommendationsService) {

  }
  allRecomm: Recommendations[];

  ngOnInit(): void {

    this.RecommendationsService
      .getRecomm()
      .subscribe((recommendations: Recommendations[]) => (this.allRecomm = recommendations));
    console.log(this.allRecomm);
  }

  getInfo(): void {
    this.RecommendationsService
      .getRecomm()
      .subscribe((recommendations: Recommendations[]) => (this.allRecomm = recommendations));
    console.log(this.allRecomm);
  }
}
