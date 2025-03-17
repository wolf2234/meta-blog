document.addEventListener("DOMContentLoaded", function () {
    let posts = document.querySelectorAll(".posts");
    posts.forEach(function (post) {
        showPosts(post);
    });

    function showPosts(post) {
        let buttonLoad = post.querySelector(".load");
        let currentItems = 3;
        let postLength = post.querySelectorAll(".post__item").length;
        buttonLoad.addEventListener("click", function (e) {
            let elementList = [...post.querySelectorAll(".post__item")];
            console.log(elementList);
            for (let i = currentItems; i <= currentItems + 3; i++) {
                if (elementList[i]) {
                    setTimeout(function () {
                        elementList[i].style.display = "flex";
                    });
                }
            }
            currentItems += 3;

            if (currentItems >= elementList.length) {
                buttonLoad.classList.add("hide");
            }
        });
    }
});
