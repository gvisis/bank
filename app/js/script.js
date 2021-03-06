const labels = document.querySelectorAll(".form-control label");

// splits letters in arrary
// map turns into array of letters with span tag and transition
// join turns it back to a string
labels.forEach((label) => {
  label.innerHTML = label.innerText
    .split("")
    //! index * 50 index is 0 and everytime its increased by one so ever letter has a different transition delay
    .map(
      (letter, index) =>
        `<span style="transition-delay: ${index * 35}ms">${letter}</span>`
    )
    .join("");
});
