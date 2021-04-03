let last = -1;

let filmsList = [
    ["John Wick", "September 19, 2014", "Keanu Reeves|Michael Nyqvist|Alfie Alle|Adrianne Palicki", 
        "It is the first installment in the John Wick film series. The story focuses on John Wick (Reeves) searching for the men who broke into his home, stole his vintage car and killed his puppy, which was a last gift to him from his recently deceased wife.", 
        "https://upload.wikimedia.org/wikipedia/en/9/98/John_Wick_TeaserPoster.jpg"
    ],
    ["Avengers: Endgame", "April 22, 2019", "Robert Downey J.|Chris Evans|Ian McShane|Chris Hemsworth|Scarlett Johansson",
        "After the devastating events of Avengers: Infinity War (2018),the universe is in ruins due to the efforts of the Mad Titan, Thanos.With the help of remaining allies, the Avengers must assemble once more in order to undo Thanos's actions and undo the chaos to the universe, no matter what consequences may be in store, and no matter who they face...",
        "https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_UY1200_CR90,0,630,1200_AL_.jpg"
    ],
    ["Inception", "July 8, 2010",  "Leonardo DiCaprio|Ken Watanabe|Joseph Gordon-Levitt|Marion Cotillard|Elliot Page|Tom Hardy", 
        "Cobb is a talented thief, the best of the best in the dangerous art of extraction: he steals valuable secrets from the depths of the subconscious during sleep, when the human mind is most vulnerable. Cobb's rare abilities made him a valuable player in the betrayal world of industrial espionage, but they also transformed him.",
        "https://upload.wikimedia.org/wikipedia/en/2/2e/Inception_%282010%29_theatrical_poster.jpg"
    ]
]
const selectPoster = (num) => {
    let title_list = document.getElementsByClassName("left_title");
    for(let elem of title_list) {
        elem.setAttribute("style", "border-style: none;");
    }
    title_list[num].setAttribute("style", "border-left: 3px solid rgb(79, 79, 235);");

    let titleFilm = document.querySelector(".name");
    titleFilm.innerHTML = filmsList[num][0];

    let dateFilm = document.querySelector(".date");
    dateFilm.innerHTML = filmsList[num][1];

    let actorsFilm = document.querySelector(".actors");
    while (actorsFilm.firstChild) {
        actorsFilm.removeChild(actorsFilm.firstChild);
    }
    for(let elem of filmsList[num][2].split("|")) {
        let span = document.createElement("span");
        span.textContent = elem;
        actorsFilm.appendChild(span)
    }

    let description = document.querySelector(".descr");
    description.innerHTML = filmsList[num][3];

    let img = document.querySelector(".poster_image");
    img.setAttribute("src", filmsList[num][4]);
}

selectPoster(1);
