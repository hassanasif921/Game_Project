const question = document.getElementById("question");
const choices = Array.from(document.getElementsByClassName("choice-text"));
const questionCounterText = document.getElementById("questionCounter");
const scoreText = document.getElementById("score");

let currentQuestion = {};
let acceptingAnswers = false;
let score = 0;
let questionCounter = 0;
let availableQuestions = [];


let questions = [{
        "question": "FFC stands for",
        "choice1": "Foreign Finance Corporation",
        "choice2": "Federation of Football Council",
        "choice3": "Film Finance Corporation",
        "choice4": "None of the above",
        "answer": 3
    },
    {
        "question": "Eritrea, which became the 182nd member of the UN in 1993, is in the continent of",
        "choice1": "Asia",
        "choice2": "Africa",
        "choice3": "Europe",
        "choice4": "Australia",
        "answer": 2
    },
    {
        "question": "Garampani sanctuary is located at",
        "choice1": "Junagarh, Gujarat",
        "choice2": "Diphu, Assam",
        "choice3": "Kohima, Nagaland",
        "choice4": "Gangtok, Sikkim",
        "answer": 2
    },
    {
        "question": "Entomology is the science that studies",
        "choice1": "Behavior of human beings",
        "choice2": "Insects",
        "choice3": "The origin and history of technical and scientific terms",
        "choice4": "The formation of rocks",
        "answer": 2
    },
    {
        "question": "Grand Central Terminal, Park Avenue, New York is the world's",
        "choice1": "largest railway station",
        "choice2": "highest railway station",
        "choice3": "longest railway station",
        "choice4": "None of the above",
        "answer": 1

    },
    {
        "question": "For which of the following disciplines is Nobel Prize awarded?",
        "choice1": "Physics and Chemistry",
        "choice2": "Physiology or Medicine",
        "choice3": "Literature, Peace and Economics",
        "choice4": "All of the above",
        "answer": 4

    },
    {
        "question": "Hitler party which came into power in 1933 is known as",
        "choice1": "Labour Party",
        "choice2": "Nazi Party",
        "choice3": "Ku-Klux-Klan",
        "choice4": "Democratic Party",
        "answer": 2

    },
    {
        "question": "Fastest shorthand writer was",
        "choice1": "Dr. G. D. Bist",
        "choice2": "J.R.D. Tata",
        "choice3": "J.M. Tagore",
        "choice4": "Khudada Khan",
        "answer": 1

    },
    {
        "question": "Epsom (England) is the place associated with",
        "choice1": "Horse racing",
        "choice2": "Polo",
        "choice3": "Shooting",
        "choice4": "Snooker",
        "answer": 2

    },
    {
        "question": "First human heart transplant operation conducted by Dr. Christiaan Barnard on Louis Washkansky, was conducted in",
        "choice1": "1967",
        "choice2": "1968",
        "choice3": "1958",
        "choice4": "1922",
        "answer": 1

    },
    {
        "question": "Galileo was an Italian astronomer who",
        "choice1": "developed the telescope",
        "choice2": "discovered four satellites of Jupiter",
        "choice3": "discovered that the movement of pendulum produces a regular time measurement",
        "choice4": "All of the above",
        "answer": 4
    },
    {
        "question": "Habeas Corpus Act 1679",
        "choice1": "states that no one was to be imprisoned without a writ or warrant stating the charge against him",
        "choice2": "provided facilities to a prisoner to obtain either speedy trial or release in bail",
        "choice3": "safeguarded the personal liberties of the people against arbitrary imprisonment by the king's orders",
        "choice4": "All of the above",
        "answer": 4

    },
    {
        "question": "Exposure to sunlight helps a person improve his health because",
        "choice1": "the infrared light kills bacteria in the body",
        "choice2": "resistance power increases",
        "choice3": "the pigment cells in the skin get stimulated and produce a healthy tan",
        "choice4": "the ultraviolet rays convert skin oil into Vitamin D",
        "answer": 4

    },
    {
        "question": "Golf player Vijay Singh belongs to which country?",
        "choice1": "USA",
        "choice2": "Fiji",
        "choice3": "India",
        "choice4": "UK",
        "answer": 2
    },
    {
        "question": "Guarantee to an exporter that the importer of his goods will pay immediately for the goods ordered by him, is known as",
        "choice1": "Letter of Credit (L/C)",
        "choice2": "laissezfaire",
        "choice3": "inflation",
        "choice4": "None of the above",
        "answer": 1

    },
    {
        "question": "First Afghan War took place in",
        "choice1": "1839",
        "choice2": "1843",
        "choice3": "1833",
        "choice4": "1848",
        "answer": 1
    },
    {
        "question": "Gulf cooperation council was originally formed by",
        "choice1": "Bahrain, Kuwait, Oman, Qatar, Saudi Arabia and United Arab Emirates",
        "choice2": "Second World Nations",
        "choice3": "Third World Nations",
        "choice4": "Fourth World Nations",
        "answer": 1

    },
    {
        "question": "First China War was fought between",
        "choice1": "China and Britain",
        "choice2": "China and France",
        "choice3": "China and Egypt",
        "choice4": "China and Greek",
        "answer": 1

    }
];

//constants

const CORRECT_BONUS = 10;
const MAX_QUESTIONS = 18;

startGame = () => {
    questionCounter = 0;
    score = 0;
    availableQuestions = [...questions];

    getNewQuestion();
};

getNewQuestion = () => {
    if (availableQuestions.length === 0 || questionCounter >= MAX_QUESTIONS) {
        //go to the end page
        return window.location.assign("end.php?score=" + score);
    }

    questionCounter++;
    questionCounterText.innerText = questionCounter + "/" + MAX_QUESTIONS;

    const questionIndex = Math.floor(Math.random() * availableQuestions.length);
    currentQuestion = availableQuestions[questionIndex];
    question.innerText = currentQuestion.question;

    choices.forEach(choice => {
        const number = choice.dataset["number"];
        choice.innerText = currentQuestion["choice" + number];

    });
    availableQuestions.splice(questionIndex, 1);
    acceptingAnswers = true;
};

choices.forEach(choice => {
    choice.addEventListener("click", e => {
        if (!acceptingAnswers) return;

        acceptingAnswers = false;
        const selectedChoice = e.target;
        const selectedAnswer = selectedChoice.dataset["number"];

        const classToApply = selectedAnswer == currentQuestion.answer ? "correct" : "incorrect";

        if (classToApply === "correct") {
            incrementScore(CORRECT_BONUS);
        }

        selectedChoice.parentElement.classList.add(classToApply);

        setTimeout(() => {
            selectedChoice.parentElement.classList.remove(classToApply);
            getNewQuestion();
        }, 1000);

    });
})

incrementScore = num => {
    score += num;
    scoreText.innerText = score;
};

startGame();