let container = document.getElementById("container");
let state = { target: null }

container.addEventListener("mousedown", event => {
    if (event.target && event.target.classList.contains("stone") && !event.target.classList.contains("active")) {
        event.target.style.cursor = "none";
        state.target = event.target;
        state.offsetX = event.offsetX;
        state.offsetY = event.offsetY;
    }
});

container.addEventListener("mouseup", () => {
    state.target.style.cursor = "default";
    state.target = null;
});

container.addEventListener("dblclick", event => {
    if (event.target && event.target.classList.contains("stone")) {
        if (event.target.classList.contains("active")) {
            event.target.classList.remove("active");
        } else {
            event.target.classList.add("active");
        }
    }
});

container.addEventListener("mousemove", e => {
    if (state.target) {
        state.target.style.position = 'absolute';
        state.target.style.top = e.clientY-25 + 'px';
        state.target.style.left = e.clientX-25 + 'px';
    }
});
