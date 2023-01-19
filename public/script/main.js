if (document.querySelector(".success")) {
  setTimeout(() => {
      document.querySelector(".success").style.display = "none";
  }, 5000);
}

function dateValidation() {
  let today = new Date()
  let afterWeek = new Date()
  afterWeek.setDate(afterWeek.getDate() + 7)
  afterWeek = afterWeek.toISOString().split('T')[0]
  today = today.toISOString().split('T')[0]
  document.getElementById('date').min = today
  document.getElementById('date').max = afterWeek
}

const tabs = document.querySelectorAll(".menu li");
const contents = document.querySelectorAll(".content div");
tabs.forEach((tab) => {
  tab.addEventListener("click", () => {
    tabs.forEach((tab) => {
      tab.classList.remove("active");
    });
    tab.classList.add("active");
    const data = tab.getAttribute("data-cont");
    contents.forEach((content) => {
      content.classList.remove("active");
    });
    document.querySelector(data).classList.add("active");
  });
});
// it doesn't show the first content when the page is loaded
// so we have to add this line to show the first content
document.querySelector(".breakfast").classList.add("active");
document.querySelector(".menu ul li").classList.add("active");
