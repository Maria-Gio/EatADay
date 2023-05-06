import { Component } from '@angular/core';
import { HttpErrorResponse } from '@angular/common/http';

import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { ApiResponse } from '../apiResponse';

import { questionService } from '../questions.service';
import { Questions } from '../questions';


@Component({
  selector: 'app-user-questions',
  templateUrl: './user-questions.component.html',
  styleUrls: ['./user-questions.component.scss']
})
export class UserQuestionsComponent {

  private user = localStorage.getItem('user');
  private objetoId = JSON.parse(this.user);
  private userid= this.objetoId.id;


  public commentsForm = new FormGroup({
    id: new FormControl(),
    title: new FormControl("",[ //usuario@eataday.com
      Validators.required,
    ]),
    text: new FormControl("Nueva pregunta"),
    isChecked: new FormControl(false)
  });


  public recipes: Questions[];

  public constructor(
    private questionService: questionService ,
    private route: Router

  ) { }


  ngOnInit(): void {
    this.commentsForm.valueChanges.subscribe(values => {

    })
  }


  public commentsCheck() {
    let body = {
      title: this.commentsForm.value.title,

      text: this.commentsForm.value.text,

      isChecked: this.commentsForm.value.isChecked,

      user_id: this.userid
    }
    this.questionService.checkcoments(body as Questions).subscribe((res) => {
      // if(res.success) {
      //   console.log("res");

      // } else if( HttpErrorResponse ){
      //   alert("asassasas");
      // }

        console.log(body);

    })
  }

  public reset(): void {
    this.commentsForm.reset();
  }
}
