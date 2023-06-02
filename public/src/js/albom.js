var id = window.location.pathname.split("/").pop();
console.log(id);
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
    ShowAlbum(albumData);
})
.catch((error) => {
    console.log(error);
});

function ShowAlbum(data) {
    // console.log(data);

    const backroundAlbom = document.querySelector(".albom");
    const cover = backroundAlbom.querySelector(".cover");
    backroundAlbom.style.background = `top/cover url('/storage/${data["image_preview"]}')`;
    cover.style.background =
        "center/cover " + `url(/storage/${data["image_preview"]})`;
}

function ShowComposition(data) {
    console.log(data);
}
