var timer = document.getElementsByClassName('timer');                                  //Retrieve the timerNode in QuestionClassNode
const Questions  = document.getElementsByClassName('Questionclass');                        //Retrieve all questions nodes
const Part  = document.getElementsByClassName('tab-pane');                                  //Retrieve all parts nodes
const links  = document.getElementsByClassName('nav-link');                                  //Retrieve all parts nodes
const bouttonSuivant = document.getElementById('bouttonSuivant');
const boutonSoumission = document.getElementById('Soumettre');

var minutes =  parseInt(timer[retrieveCurrentQuestion()].innerText.substring(0,2));
var seconds =  parseInt(timer[retrieveCurrentQuestion()].innerText.substring(3,5));


//function to retrieve the current active element
function retrieveCurrentQuestion(){
    for(var i = 0; i < Questions.length; i ++){
        if(Questions[i].classList.contains('active')){
           return i;
        }
    }
}

//function to retrieve the current active part
function retrieveCurrentPart(){
    for(var i = 0; i < Part.length; i ++){
        if(Part[i].classList.contains('active')){
            return i;
        }
    }
}

function slide(){
    var currentIndexPart = retrieveCurrentPart();
    var currentIndexQuestion = retrieveCurrentQuestion();

    if(currentIndexQuestion == (Questions.length - 2)){
        bouttonSuivant.style.display = 'none';
        boutonSoumission.style.display = 'block';
    }

    if(Part[currentIndexPart].id != Questions[currentIndexQuestion + 1].parentNode.id){
        links[currentIndexPart].classList.remove('active');
        links[currentIndexPart + 1].classList.add('active');
        Questions[currentIndexQuestion].classList.remove('active');
        Questions[currentIndexQuestion + 1].classList.add('active');
        Part[currentIndexPart].classList.remove('active');
        Part[currentIndexPart+1].classList.add('active');
    } else{


        if(currentIndexQuestion <= Questions.length - 2){
            Questions[currentIndexQuestion].classList.remove('active');
            Questions[currentIndexQuestion + 1].classList.add('active');
        }

    }

    minutes =  parseInt(timer[retrieveCurrentQuestion()].innerText.substring(0,2));
    seconds =  parseInt(timer[retrieveCurrentQuestion()].innerText.substring(3,5));
}

//Action when clicking on suivant button
bouttonSuivant.addEventListener('click',function(){
    slide();
});



// Shown on page current chrono time
function getCurrentChrono(){

        if(minutes == 0){
            if(seconds == 0){
                if(retrieveCurrentQuestion() != (Questions.length - 1)){
                    slide();
                }
            }
        }


        if(seconds == 0 && minutes != 0){
            seconds = 59;
            minutes = minutes - 1;
        }

        if(seconds < 10){
            timer[retrieveCurrentQuestion()].innerText = "0" + minutes + ":" + "0" + seconds;
        }else{
            timer[retrieveCurrentQuestion()].innerText = "0" + minutes + ":" + seconds;
        }

        if(seconds == 20 && minutes == 0){
            timer[retrieveCurrentQuestion()].style.color = "#3BB54A";
            timer[retrieveCurrentQuestion()].classList.remove("font-w500");
            timer[retrieveCurrentQuestion()].classList.add("font-w700");
        }

        if(seconds >= 1 && minutes >= 0){
            seconds = seconds - 1;
        }

}

//Trigger Chrono time function each second
const TimerProcess = setInterval(function(){
    getCurrentChrono();
},1000);