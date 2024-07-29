// function addInput() {
//     const dynamicInputs = document.getElementById('dynamicInputs');
//     const lastInput = document.querySelector('.data-input:last-child input');

//     // Check if the last input is not empty before adding another
//     if (!lastInput || lastInput.value !== "") {
//         const newInput = document.createElement('div');
//         newInput.classList.add('data-input');
//         newInput.innerHTML = `
//             <input type="number" name="data" required>
//             <button type="button" class="removeBtn" onclick="removeInput(this)">Remove</button>
//         `;
//         dynamicInputs.appendChild(newInput);
//     } else {
//         alert("Please fill in the previous input before adding another.");
//     }
// }

// function removeInput(button) {
//   const parentDiv = button.parentNode;
//   parentDiv.parentNode.removeChild(parentDiv);
// }

function addInput() {
  const dynamicInputs = document.getElementById("dynamicInputs");
  const lastInput = document.querySelector(".data-input:last-child input");

  // Check if the last input is not empty before adding another
  if (!lastInput || lastInput.value !== "") {
    const newInput = document.createElement("div");
    newInput.classList.add("data-input");
    newInput.innerHTML = `
            <label for="[sizes]">Size(inch):</label>
            <input type="text" name="sizes[]" required>
            <label for="[weights]">Weight(grams):</label>
            <input type="text" name="weights[]" required>
            <button type="button" class="removeBtn" onclick="removeInput(this)">
            <span class="material-symbols-outlined">delete</span></button>
        `;
    dynamicInputs.appendChild(newInput);
  } else {
    alert("Please fill in the previous input before adding another.");
  }
}

function removeInput(button) {
  const parentDiv = button.parentNode;
  parentDiv.parentNode.removeChild(parentDiv);
}
