import { Component, OnInit } from '@angular/core';
import { questionService } from '../questions.service';
import { Questions } from '../questions';
import { ActivatedRoute } from '@angular/router';
import { Location } from '@angular/common';

@Component({
  selector: 'app-questions-detail',
  templateUrl: './question-detail.component.html',
  styleUrls: ['./question-detail.component.scss']
})
export class QuestionDetailComponent implements OnInit {

  constructor(
    private questionService: questionService,
    private route: ActivatedRoute,
    // datos del héroe del servidor remoto y este componente los usa para mostrar el héroe
    // servicio de Angular para interactuar con el navegador. Este servicio le permite volver a la vista anterior
    private location: Location
    ){

  }
  public question?: Questions;

  // ngOnInit(): void {
  //   this.questionService
  //     .getComents()
  //     .subscribe((questions: Questions[]) => (this.allQuestions = questions));
  //   console.log(this.allQuestions);
  //   }

  // getQuestions():void{
  //   this.questionService
  //     .getComents()
  //     .subscribe((questions: Questions[]) => (this.allQuestions = questions));
  //   console.log(this.allQuestions);
  // }

  ngOnInit(): void {
    this.getQuestion();
  }

getQuestion(): void {
  const id = Number(this.route.snapshot.paramMap.get('id'));
  this.questionService.getQuestionByID(id)
  .subscribe((question: Questions) =>this.question = question);
}

goBack(): void {
  this.location.back();
}
}
