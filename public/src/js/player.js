// Скрипт аудио плеера

const AUDIO_PLAYER = document.querySelector("#audio");
const progress = document.querySelectorAll(".progress")[0];
const blockAudioPlayer = document.querySelector(".audioplayer");
const btnRelease = document.querySelector(".see_release");
const pauseBtn = document.querySelector(".pausebtn");
const playBtn = document.querySelector(".playbtn");
// Событие кнопки вызова
const listParent = document.querySelector(
    "body > section.albom--list > div:nth-child(2) > ul"
);
const audioElem = document.querySelector("#audio");

var ordinalIndex = 0;

let is_pause = true;

console.log(jsonPhp);

let playlist = [];
for (let i = 0; i < jsonPhp.length; i++) {
    let obj = JSON.parse(jsonPhp[i]);
    // console.log(`Title: ${obj.title} \nPath: ${obj.img_src} \nAlbum_id: ${obj.album_id}\nTrack: ${obj.music_src}\n`);
    playlist.push(obj.music_src);
    console.log(i);
}
console.log(playlist);

const audioPlayer = () => {
    const control = document.querySelector(".controls");
    const timeEnd = document.querySelector(".time-end");
    const pause = control.querySelector(".pause");
    const value = timeEnd.querySelector(".value");
    valueSound = value.querySelector("div");

    const right = control.querySelector(".right");
    const left = control.querySelector(".left");
    const play = control.querySelector(".play");

    let track = 0;

    let audioInterval;

    play.addEventListener("click", () => {
        console.log(AUDIO_PLAYER);
        play.classList.add("hide");
        pause.classList.add("active");
        is_pause = !is_pause;

        switchTrack(track);
        audioInterval = setInterval(() => {
            audioPlay(track);
        }, 25);
        AUDIO_PLAYER.play();
    });

    pause.addEventListener("click", () => {
        pause.classList.remove("active");
        play.classList.remove("hide");
        AUDIO_PLAYER.pause();
        clearInterval(audioInterval);
    });

    left.addEventListener("click", (e) => {
        track = track >= playlist.length - 1 ? 0 : track + 1;
        // track++;
        switchTrack(track);
    });

    right.addEventListener("click", (e) => {
        track--;
        track =
            track < 0
                ? playlist.length + (track % playlist.length)
                : track % playlist.length;
        switchTrack(track);
    });
};

const audioPlay = (track) => {
    let audioTime = AUDIO_PLAYER.currentTime;
    let audioLength = Math.round(AUDIO_PLAYER.duration);
    progress.style.width = (audioTime * 100) / audioLength + "%";
    console.log(track);
    if (audioTime === audioLength && audioLength < playlist.length - 1) {
        track++;
        switchTrack(track);
    } else if (audioTime === audioLength >= playlist.length - 1) {
        track++;
        switchTrack(track);
    }
};

const switchTrack = (numTrack) => {
    console.log(numTrack, playlist[numTrack]);
    AUDIO_PLAYER.src = playlist[numTrack];
    AUDIO_PLAYER.currentTime = 0;

    if (!is_pause) AUDIO_PLAYER.play();
};

playlist = playlist.map((track) => track);

playlist.forEach((track) => {
    const audio = new Audio(track);

    console.log(audio);

    audio.play();
});

const fillListOfMusic = ({ name_track, music_src }) => {
    ordinalIndex++;
    let child = document.createElement("li");
    const author_name = "KARIM_LOH";

    //TODO Переделай SQL запрос, чтобы получить ещё и автора песни!

    child.innerHTML = `
    <div class="playlist">
        <p>${ordinalIndex}</p>
        <button class="playbtn" index="${ordinalIndex}" src="${music_src}"><img src="icon/svg/arrow_right.svg" alt=""></button>
        <button class="pausebtn" index="${ordinalIndex}" src="${music_src}"><img src="icon/svg/pausebtn.svg" alt=""></button>
        <div>
            <p class="title">${name_track}</p>
            <p class="author">${author_name}</p>
        </div>
    </div>
    <div class="timelist">
        <p class="time">--</p>
        <img src="icon/svg/share.svg" alt="">
    </div>
    `;
    return child;
};

const fillTracks = (tracks_array) => {
    console.log(tracks_array);
    for (let i = 0; i < tracks_array.length; i++) {
        listParent.appendChild(fillListOfMusic(JSON.parse(tracks_array[i])));
    }
};

const playButtonAddEventListener = () => {
    let array = document.querySelectorAll("button[src]");
    if (!array) return;
    array.forEach((elem) => {
        elem.addEventListener("click", () => {
            audioElem.src = elem.getAttribute("src");
            indexbtn = elem.getAttribute("index");
            track = indexbtn;
            AUDIO_PLAYER.play();
        });
    });
};

fillTracks(jsonPhp);
playButtonAddEventListener();

console.log(blockAudioPlayer);

btnRelease.addEventListener("click", () => {
    blockAudioPlayer.classList.toggle("active");
});

document.addEventListener("DOMContentLoaded", () => {
    audioPlayer();
});
