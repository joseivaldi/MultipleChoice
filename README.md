# MultipleChoice

MultipleChoiceExams is a set of PHP clases to manage Multiple Choice Exams. This
clases are able to adapt to different CMS, as Drupal, so the CMS only have the
responsability of managing the content of the database.


#Example

This is how the code works:

```php
<?php
require 'vendor/autoload.php';

use mdagostino\MultipleChoiceExams\Exam\Exam;
use mdagostino\MultipleChoiceExams\Controller\ExamWithTimeController;
use mdagostino\MultipleChoiceExams\Question\Question;
use mdagostino\MultipleChoiceExams\Timer\ExamTimer;
use mdagostino\MultipleChoiceExams\Question\QuestionInfo;
use mdagostino\MultipleChoiceExams\Question\QuestionEvaluatorSimple;
use mdagostino\MultipleChoiceExams\ApprovalCriteria\BasicApprovalCriteria;

// First create a list of Questions
// Each question can use a different evaluator method, for this example,
// all the questions use the simplest evaluation method: "A question is
// considered correct if the user chose only all the right questions".
$question_evaluator = new QuestionEvaluatorSimple();


$question = new Question($question_evaluator, new QuestionInfo());
$question
  ->setTitle('Django language')
  ->setDescription('In which language is written the Django framework');
  ->setChoices(['python' => 'Python', 'php' => 'PHP', 'go' => 'Go', 'java' => 'Java'])
  ->setRightChoices(['python'])
$questions[] = $question;



$question = new Question($question_evaluator, new QuestionInfo());
$question
  ->setTitle('Languages that runs on browsers')
  ->setDescription('Witch programming language can run on web browsers?');
  ->setChoices(['cobol' => 'Cobol', 'javascript' => 'Javascript', 'asm' => 'Assembler'])
  ->setRightChoices(['javascript'])
$questions[] = $question;


$question = new Question($question_evaluator, new QuestionInfo());
$question
  ->setTitle('Planets')
  ->setDescription('Wich planets of the Solar System are considered "giant planets"?');
  ->setChoices([
    'Me' => 'Mercury',
    'Ve' => 'Venus',
    'Ea' => 'Earth',
    'Ma' => 'Mars',
    'Ju' => 'Jupiter',
    'Sa' => 'Saturn',
    'Ur' => 'Uranus',
    'Ne' => 'Neptune'
    ])
  ->setRightChoices(['Ju', 'Sa', 'Ur', 'Ne'])
$questions[] = $question;


// This Exam is approved with 75%, each right question sums 1 point,
// each wrong question rest 0.3 points
$approval_criteria = new BasicApprovalCriteria;
$approval_criteria
  ->setScoreToApprove(75)
  ->setRightQuestionsSum(1)
  ->setWrongQuestionsRest(0.3);

$exam = new Exam();
$exam->setQuestions($questions);

$controller = new ExamWithTimeController($exam, $approval_criteria);

$exam_timer = new ExamTimer();
$exam_timer->setDuration(60); // 60 minutes
$controller->setTimer($exam_timer);
$controller->startExam();

$controller->answerCurrentQuestion(['go']); // Wrong answer
$controller->moveToNextQuestion();
$controller->answerCurrentQuestion(['javascript']); // Right answer
$controller->tagCurrentQuestion('review later');
$controller->moveToNextQuestion();
$controller->answerCurrentQuestion(['Ju', 'Sa']); // Wrong answer (incomplete)
$controller->tagCurrentQuestion('review later');
$controller->tagCurrentQuestion('difficult question');
$controller->untagCurrentQuestion('review later');
$controller->moveToNextQuestion();

$controller->finalizeExam();

echo 'Exam: ' . ($controller->getApprovalCriteria()->isApproved($exam->getQuestions()) ? 'Approved' : ' Not Approved')  . PHP_EOL;
echo 'Exam score: ' . sprintf('%.2f%%', $controller->getApprovalCriteria()->getScore()) . PHP_EOL;
echo 'Questions tagged to review later: ' . count($controller->getQuestionsTagged('review later'))  . PHP_EOL;
echo 'Questions tagged as difficult questions: ' . count($controller->getQuestionsTagged('difficult question'))  . PHP_EOL;

```
