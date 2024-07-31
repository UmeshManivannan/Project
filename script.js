<script>
let scrollcontainer = document.querySelector(".all-brand");
let backbtn = document.getElementById("backbtn");
let nextbtn = document.getElementById("nextbtn");

scrollcontainer.addEventListener("wheel", (evt)=>{
    evt.preventDefault();
    scrollcontainer.scrollLeft += evt.deltaY;
});
</script>