// JavaScript Document

 $(document).ready(function () {
   let question_div1 = $(".question-div1");
   let question_div2 = $(".question-div2");


   for (let i = 0; i < question_div1.length; i++) {
     $(question_div2[i]).slideUp("fast");
   }


   for (let i = 0; i < question_div1.length; i++) {
     $(question_div1[i]).click(function () {
       $(question_div2[i]).slideToggle("fast");
     })
   }


 });