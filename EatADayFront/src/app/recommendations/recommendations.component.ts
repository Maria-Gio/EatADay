import { Component, OnInit } from '@angular/core';
import { Recommendations } from '../recommendations';
import { RecommendationsService } from '../recommendations.service';


@Component({
  selector: 'app-recommendations',
  templateUrl: './recommendations.component.html',
  styleUrls: ['./recommendations.component.scss']
})
export class RecommendationsComponent {

  constructor(private RecommendationsService: RecommendationsService){

  }
  allRecomm: Recommendations[];

  ngOnInit(): void {
    
 
  }
}
