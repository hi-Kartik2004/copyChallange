console.log("Js loaded successfully");

// handling required banner
let Inputname = document.getElementById("name");
// console.log(InputName);
let count = 0;
let checkboxes = document.querySelectorAll('input[type="checkbox"]');
let inputField = document.getElementsByClassName("input__style");
let required = document.getElementsByClassName("_3p6UuR5HglZs4S5xXWepGh");
for (let i = 0; i < inputField.length; i++) {
  let escape = false;
  inputField[i].addEventListener("change", (e) => {
    let value = e.target.value;
    if (value != "" && !escape) {
      count++;
      escape = true;
      required[i].innerHTML = "Required";
      required[i].style.backgroundColor = "#e8e8e8";
      required[i].style.color = "black";
    }
    if (value == "") {
      count--;
      escape = false;
    }
    //   count--;
    if (value == "") {
      required[i].innerHTML = "This is a required field";
      required[i].style.backgroundColor = "red";
      required[i].style.color = "white";
    }

    let questionCount = document.getElementById("answered_question_count");
    questionCount.innerHTML = `${count}`;
  });
}

// handling checkboxes;
let increase = false;
escape = false;
let checkboxCount = 0;
for (let i = 0; i < checkboxes.length; i++) {
  checkboxes[i].addEventListener("click", (e) => {
    let value = e.target.value;
    // console.log(value);
    if (checkboxes[i].checked) {
      checkboxCount++;
      console.log(checkboxCount);
    } else {
      checkboxCount--;
      console.log(checkboxCount);
    }
    // console.log(increase);

    if (checkboxCount > 0 && !escape) {
      count++;
      escape = true;
      let questionCount = document.getElementById("answered_question_count");
      questionCount.innerHTML = `${count}`;
      required[5].innerHTML = "Required";
      required[5].style.backgroundColor = "#e8e8e8";
      required[5].style.color = "black";
    }
    if (checkboxCount == 0) {
      required[5].innerHTML = "This is a required field";
      required[5].style.backgroundColor = "red";
      required[5].style.color = "white";
      count--;
      escape = false;
      let questionCount = document.getElementById("answered_question_count");
      questionCount.innerHTML = `${count}`;
    }
  });
}
