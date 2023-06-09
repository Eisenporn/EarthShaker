// Получение данных об альбоме и его треках из базы данных
var id = window.location.pathname.split("/").pop();
var albumData;
var compositionData;

fetch("/api/endpoint/" + id, {
    method: "GET",
    headers: {
        "X-Requested-With": "XMLHttpRequest",
        "Content-type": "application/json",
    },
})
    .then((response) => response.json())
    .then((data) => {
        albumData = data.album;
        compositionData = data.composition;
    })
    .catch((error) => {
        console.log(error);
    })
    .finally(() => {
        playAudioPlayerfunc(compositionData);
    });

function playAudioPlayerfunc(compositionData) {
    // Создание элементов списка треков и заполнение данными
    const trackList = document.querySelector(".track-list");
    const imageUrlArrowRight = document.querySelector(".image-url.arrow-right")
        .dataset.src;
    const imageUrlPauseBtn = document.querySelector(".image-url.pause-btn")
        .dataset.src;
    const imageUrlDownloadBtn = document.querySelector(
        ".image-url.download-btn"
    ).dataset.src;
    let audioUrl;

    compositionData.forEach((track, index) => {
        const listItem = document.createElement("li");
        audioUrl = `/storage/${track.music_src}`;

        listItem.innerHTML = `
    <div class="playlist">
        <p class="number-in-album">${index + 1}</p>
        <button class="playbtn active" data-index="${index}" data-src="${
            track.music_src
        }"><img
                src="${imageUrlArrowRight}" alt=""></button>
        <button class="pausebtn" data-index="${index}" data-src="${
            track.music_src
        }"><img
                src="${imageUrlPauseBtn}" alt=""></button>
        <div>
            <p class="title">${track.name}</p>
            <p class="author">${track.maker}</p>
        </div>
    </div>
    <div class="timelist">
        <a href="" download id="download-link-${index}">
            <img src="${imageUrlDownloadBtn}" alt="">
        </a>
        <p class="time"></p>
    </div>
  `;
        trackList.appendChild(listItem);
        let downloadLink = document.getElementById(`download-link-${index}`);
        downloadLink.href = audioUrl;
    });

    // Получение ссылок на элементы плеера
    const audioElement = document.getElementById("audio");
    const playButtons = document.querySelectorAll(".playbtn");
    const pauseButtons = document.querySelectorAll(".pausebtn");
    const progressElement = document.querySelector(".progress");
    const timeStartElement = document.querySelector(".time-start p");
    const controlsElement = document.querySelector(".controls");
    const audioPlayerBottom = document.querySelector(".audioplayer");
    const timeEndElement = document.querySelector(".time-end p");

    const playButtonBottom = controlsElement.querySelector(".play");
    const pauseButtonBottom = controlsElement.querySelector(".pause");
    const rightButton = controlsElement.querySelector(".right");
    const leftButton = controlsElement.querySelector(".left");

    // Инициализация текущего трека
    let currentTrackIndex = 0;
    let pausePositions = {};
    var pauserPromise = {};
    let isPlaying = false;

    // Функция паузы трека
    function pauseTrack() {
        const index = currentTrackIndex;
        audioElement.pause();

        pauserPromise[index] = new Promise((resolve) => {
            resolve(audioElement.currentTime);
        });

        controlsElement.classList.remove("playing");
        pausePositions[index] = audioElement.currentTime;

        isPlaying = false;
    }

    // Функция воспроизведения трека
    async function playTrack(index) {
        const track = compositionData[index];
        const audioSrc = "/storage/" + track.music_src;

        audioElement.src = audioSrc;
        audioElement.load();

        if (pauserPromise[index]) {
            const startPosition = await pauserPromise[index];
            audioElement.currentTime = startPosition;
            delete pausePositions[index];
        }

        audioElement.play();

        timeStartElement.innerText = formatTime(audioElement.currentTime);

        isPlaying = true;
    }

    // Обработчик события для кнопки "right"
    leftButton.addEventListener("click", () => {
        if (isPlaying === false) {
            pauseTrack();
            currentTrackIndex =
                (currentTrackIndex + 1) % compositionData.length;
            console.log(currentTrackIndex);
        } else {
            console.log(isPlaying);
            currentTrackIndex =
                (currentTrackIndex + 1) % compositionData.length;
            console.log(currentTrackIndex);
            playTrack(currentTrackIndex);
        }
    });

    // Обработчик события для кнопки "left"
    rightButton.addEventListener("click", () => {
        if (isPlaying === false) {
            pauseTrack();
            currentTrackIndex =
                (currentTrackIndex + 1) % compositionData.length;
            console.log(currentTrackIndex);
        } else {
            console.log(isPlaying);
            currentTrackIndex =
                (currentTrackIndex - 1 + compositionData.length) %
                compositionData.length;
            console.log(currentTrackIndex);
            playTrack(currentTrackIndex);
        }
    });

    // Обработчики событий для кнопок воспроизведения
    playButtons.forEach((playbutton) => {
        const index = playbutton.dataset.index;
        const pausebutton = pauseButtons[index];

        playButtonBottom.addEventListener("click", () => {
            audioPlayerBottom.classList.add("active");
            playButtonBottom.classList.add("hide");
            pauseButtonBottom.classList.add("active");
            playButtonBottom.classList.add("hide");
            pauseButtonBottom.classList.add("active");
            currentTrackIndex = index;
            playTrack(index);
        });

        playbutton.addEventListener("click", () => {
            audioPlayerBottom.classList.add("active");
            playButtonBottom.classList.add("hide");
            pauseButtonBottom.classList.add("active");
            playbutton.classList.remove("active");
            pausebutton.classList.add("active");
            currentTrackIndex = index;
            playTrack(index);
        });
    });

    // Обработчики событий для кнопок паузы
    pauseButtons.forEach((pausebutton) => {
        const index = pausebutton.dataset.index;
        const playbutton = playButtons[index];

        pausebutton.addEventListener("click", () => {
            playbutton.classList.add("active");
            pausebutton.classList.remove("active");
            playButtonBottom.classList.remove("hide");
            pauseButtonBottom.classList.remove("active");
        });

        pauseButtonBottom.addEventListener("click", () => {
            playButtonBottom.classList.remove("hide");
            pauseButtonBottom.classList.remove("active");
            pauseTrack();
        });

        pausebutton.addEventListener("click", () => {
            pauseTrack();
        });
    });

    // Обновление прогресса воспроизведения
    audioElement.addEventListener("timeupdate", () => {
        // Проверка на NaN перед обновлением элементов плеера
        if (!isNaN(audioElement.duration)) {
            const duration = audioElement.duration;
            const currentTime = audioElement.currentTime;
            const progress = (currentTime / duration) * 100;
            progressElement.style.width = `${progress}%`;
            timeStartElement.innerText = formatTime(currentTime);
            if (!isNaN(duration)) {
                timeEndElement.innerText = formatTime(duration);
            }
        }
    });

    // Функция форматирования времени в формат "м:сс"
    function formatTime(time) {
        const minutes = Math.floor(time / 60);
        const seconds = Math.floor(time % 60);
        return `${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;
    }

    // Функция регулирования громкости музыки
    const volumeInput = document.getElementById("AudioValue");
    volumeInput.addEventListener("input", () => {
        // Получаем текущее значение громкости из input
        const volume = volumeInput.value;

        // Устанавливаем громкость аудиоэлемента в соответствии с значением input
        audioElement.volume = volume;
    });
}
