/* Sidebar (small screens) */
document.addEventListener("DOMContentLoaded", function () {
  const collapseBtn = document.querySelector(".collapse-btn");
  const sidebar = document.querySelector(".sidebar");
  if (collapseBtn) {
    collapseBtn.addEventListener("click", function () {
      sidebar.classList.toggle("collapsed");
    });
  }
  updateButtonStatus();
  step5_updateButtonStatus();

  //  Sidebar
  document.querySelectorAll(".toggle_submenu").forEach((item) => {
    item.addEventListener("click", function (e) {
      e.preventDefault();
      const subMenu = this.parentNode.nextElementSibling;
      if (subMenu.style.display === "none") {
        subMenu.style.display = "block";
        subMenu.style.maxHeight = subMenu.scrollHeight + "px";
      } else {
        subMenu.style.maxHeight = "0";
        setTimeout(() => {
          subMenu.style.display = "none";
        }, 500);
      }
      document.querySelectorAll(".sub_menu").forEach((other) => {
        if (other !== subMenu) {
          other.style.maxHeight = "0";
          setTimeout(() => {
            other.style.display = "none";
          }, 500);
        }
      });
    });
  });
});

jQuery(document).ready(function($) {
  // عند الضغط على رابط داخل عنصر li
  $('.sub_menu li a').on('click', function(event) {
      // إزالة الفئة النشطة من جميع العناصر
      $('.sub_menu li').removeClass('selected_sub_menu');

      // إضافة الفئة النشطة للعنصر الذي تم النقر عليه
      $(this).parent().addClass('selected_sub_menu');

      // حفظ الرابط النشط في localStorage
      localStorage.setItem('activeLink', $(this).attr('href'));
  });

  // التأكد من أن الفئة النشطة تبقى عند إعادة تحميل الصفحة
  var activeLink = localStorage.getItem('activeLink');
  if (activeLink) {
    $('.sub_menu li').removeClass('selected_sub_menu');
    $('.sub_menu li a').each(function() {
        if ($(this).attr('href') === activeLink) {
            $(this).parent().addClass('selected_sub_menu');
        }
    });
  }
});

/* Auth Validation */
function validateLoginForm() {
  document.getElementById("username").addEventListener("input", function () {
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
  });

  document.getElementById("password").addEventListener("input", function () {
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
  });
  const username = document.getElementById("username");
  const password = document.getElementById("password");
  const inputs = [username, password];

  inputs.forEach((input) => {
    if (input.value.trim() === "") {
      input.classList.remove("is-valid");
      input.classList.add("is-invalid");
    } else {
      input.classList.remove("is-invalid");
      input.classList.add("is-valid");
    }
  });
}

function validateForgetPasswordForm() {
  document.getElementById("email").addEventListener("input", function () {
    this.classList.remove("is-invalid");
    this.classList.add("is-valid");
  });

  const email = document.getElementById("email");
  if (email.value.trim() === "") {
    email.classList.remove("is-valid");
    email.classList.add("is-invalid");
  } else {
    email.classList.remove("is-invalid");
    email.classList.add("is-valid");
  }
}

// Select All
document.addEventListener("DOMContentLoaded", function () {
  var selectAllCheckbox = document.getElementById("select-all");
  if (selectAllCheckbox) {
    selectAllCheckbox.addEventListener("change", function () {
      var checkboxes = document.querySelectorAll(".row-checkbox");
      for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
      }
    });
  }
});

// Delete Button
document.addEventListener("DOMContentLoaded", function () {
  const checkboxes = document.querySelectorAll(".row-checkbox");
  const selectAllCheckbox = document.getElementById("select-all");
  const deleteButton = document.getElementById("deleteButton");
  // Update Delete Button State
  function updateDeleteButtonState() {
    const checkboxes = document.querySelectorAll(".row-checkbox");
    const deleteButton = document.getElementById("deleteButton");
    let isAnyChecked = Array.from(checkboxes).some(
      (checkbox) => checkbox.checked
    );

    deleteButton.disabled = !isAnyChecked;
    deleteButton.classList.toggle("bg-danger", isAnyChecked);
  }

  document.querySelectorAll(".row-checkbox").forEach((checkbox) => {
    checkbox.addEventListener("change", () => {
      updateDeleteButtonState();
    });
  });
  if (document.getElementById("select-all")) {
    document
      .getElementById("select-all")
      .addEventListener("change", function () {
        const checkboxes = document.querySelectorAll(".row-checkbox");
        checkboxes.forEach((checkbox) => {
          checkbox.checked = this.checked;
        });
        updateDeleteButtonState();
      });
  }

  // Delete selected rows
  if (document.getElementById("deleteButton")) {
    document
      .getElementById("deleteButton")
      .addEventListener("click", function () {
        const checkboxes = document.querySelectorAll(".row-checkbox");
        checkboxes.forEach((checkbox, index) => {
          if (checkbox.checked) {
            checkbox.closest("tr").remove();
          }
        });
        updateDeleteButtonState();
      });
  }

  function updateDeleteButtonStateForAll() {
    let isAllChecked = false;
    if (selectAllCheckbox.checked) {
      isAllChecked = true;
    } else {
      isAllChecked = false;
    }
    if (isAllChecked) {
      deleteButton.classList.add("bg-danger");
    } else {
      deleteButton.classList.remove("bg-danger");
    }
  }
  if (checkboxes) {
    checkboxes.forEach(function (checkbox) {
      checkbox.addEventListener("click", updateDeleteButtonState);
    });
  }
  if (selectAllCheckbox) {
    selectAllCheckbox.addEventListener("click", updateDeleteButtonStateForAll);
  }
});

// Wizard
var currentStep = 1;
var currentStep5 = 1;

function showContent(stepNumber) {
  var contents = document.getElementsByClassName("content-tab");
  var steps = document.getElementsByClassName("step");
  for (var i = 0; i < contents.length; i++) {
    contents[i].style.display = "none";
    steps[i].classList.remove("active-step");
    steps[i].classList.remove("a-prev-step");
  }
  document.getElementById("content" + stepNumber).style.display = "block";
  document.getElementById("step" + stepNumber).classList.add("active-step");
  for (var i = 0; i < stepNumber - 1; i++) {
    steps[i].classList.add("a-prev-step");
  }
  updateButtonStatus();
}

function step5_showContent(stepNumber) {
  var contents = document.getElementsByClassName("step5_content-tab");
  var steps = document.getElementsByClassName("step");
  for (var i = 0; i < contents.length; i++) {
    contents[i].style.display = "none";
  }
  for (var i = 0; i < steps.length; i++) {
    steps[i].classList.remove("step5_active-step");
    steps[i].classList.remove("step5_a-prev-step");
  }
  document.getElementById("step5_content" + stepNumber).style.display = "block";
  document
    .getElementById("step" + stepNumber)
    .classList.add("step5_active-step"); // Add active class to the current step
  for (var i = 0; i < stepNumber - 1; i++) {
    steps[i].classList.add("step5_a-prev-step");
  }
}

function nextStep() {
  if (currentStep < 4) {
    currentStep++;
    showContent(currentStep);
  }
}

function prevStep(currentStep) {
  if (currentStep > 1) {
    currentStep--;
    showContent(currentStep);
  }
}

function step5_nextStep() {
  if (currentStep5 < 3) {
    currentStep5++;
    step5_showContent(currentStep5);
  }
}

function step5_prevStep(currentStep5) {
  if (currentStep5 > 1) {
    currentStep5--;
    step5_showContent(currentStep5);
  }
}

function updateButtonStatus() {
  if (currentStep === 1) {
    let btn = document.getElementById("prevButton");
    if (btn) {
      btn.setAttribute("disabled", "");
    }
  }
  if (document.getElementById("nextButton")) {
    document.getElementById("nextButton").disabled = currentStep === 4;
  }
}

function step5_updateButtonStatus() {
  if (currentStep5 === 1) {
    let btn = document.getElementById("prevButton_phase5");
    if (btn) {
      btn.setAttribute("disabled", "");
    }
  }
  if (document.getElementById("nextButton_phase5")) {
    document.getElementById("nextButton_phase5").disabled = currentStep5 === 3;
  }
}

// Add New Row
function addNewRow() {
  var table = document.querySelector(".table-content table");
  var newIndex = table.rows.length - 1;
  var row = table.insertRow(-1);
  row.innerHTML = `
                                <td>
                                    <input type="checkbox" class="row-checkbox" />
                                </td>
                                <td class="gray-bg">
                                    ${newIndex}
                                </td>
                                <td>
                                    <textarea class="table-input" placeholder="نص تعريفي"></textarea>
                                </td>
                                <td>
                                    <input type="date" />

                                </td>
                                <td>
                                    <input type="date" />
                                </td>
                                <td>
                                    <textarea class="table-input" placeholder="نص تعريفي"></textarea>
                                </td>
                                <td>
                                    <input type="number" class="table-number" />
                                </td>
                                <td>
                                    <input type="number" class="table-number" />

                                </td>
                                <td>
                                    <input type="number" class="table-number" />

                                </td>
                                <td>
                                    <input type="number" class="table-number" />

                                </td>
                                <td>
                                    <input type="number" class="table-number" />

                                </td>
                                <td>
                                    <div class="radio-container">
                                        <input type="radio" id="notStarted${newIndex}" name="status${newIndex}" />
                                        <label for="notStarted${newIndex}">لم يبدأ</label>
                                    </div>
                                    <div class="radio-container">
                                        <input type="radio" id="continue${newIndex}" name="status${newIndex}" />
                                        <label for="continue${newIndex}">مستمر</label>
                                    </div>
                                    <div class="radio-container">
                                        <input type="radio" id="finished${newIndex}" name="status${newIndex}" />
                                        <label for="finished${newIndex}">انتهي</label>
                                    </div>
                                    <div class="radio-container">
                                        <input type="radio" id="stopped${newIndex}" name="status${newIndex}" />
                                        <label for="stopped${newIndex}">متوقف</label>
                                    </div>
                                </td>
                                <td>
                                    <textarea class="table-input" placeholder="نص تعريفي"></textarea>
                                </td>
                                <td>
                                    <textarea class="table-input" placeholder="نص تعريفي"></textarea>
                                </td>
                                <td>
                                    <button type="button" class="base-btn" data-toggle="modal"
                                        data-target="#fileModal">رابط</button>
                                </td>
                            
    `;
}

// Delete Button (Table Row)
document.addEventListener("DOMContentLoaded", function () {
  const deleteButton = document.getElementById("deleteButton");
  function deleteSelectedRows() {
    const table = document.querySelector(".table-content table");
    const checkboxes = table.querySelectorAll(".row-checkbox");
    for (let i = checkboxes.length - 1; i >= 0; i--) {
      if (checkboxes[i].checked) {
        table.deleteRow(i + 3);
      }
    }
    updateRowIndices(table);
    updateDeleteButtonState();
  }
  function updateRowIndices(table) {
    const rows = table.rows;
    for (let i = 1; i < rows.length; i++) {
      rows[i + 1].cells[1].textContent = i;
    }
  }

  if (deleteButton) {
    deleteButton.addEventListener("click", deleteSelectedRows);
  }
});

// Add New Input
function addNewInput() {
  var table = document.querySelector(".table-content2 table");
  var row = table.insertRow(-1);
  var deleteButtonId = "deleteButton" + table.rows.length;

  row.innerHTML = `
        <td>
            <div class="container_inputs">
                <button class="minus" type="button" id="${deleteButtonId}" style="border:none;">-</button>
                <input type="text" placeholder="كتابة توصية أخرى"
                    class="form-control recommendation_input py-4 px-2">
                <div class="index"></div>
            </div>
        </td>
    `;

  document
    .getElementById(deleteButtonId)
    .addEventListener("click", function () {
      this.closest("tr").remove();
      updateIndices();
    });

  updateIndices();
}

// Add New Input with link
function addNewInputWithLink() {
  var table = document.querySelector(".table-content2 table");
  var row = table.insertRow(-1);
  var deleteButtonId = "deleteButton" + table.rows.length;

  row.innerHTML = `
        <td>
            <div class="container_inputs">
                <button type="button" class="minus"
                                                style="border:none; background-color: #0DA9A6;" data-toggle="modal"
                                                data-target="#fileModal">الرابط</button>
                <input type="text" placeholder="كتابة توصية أخرى"
                    class="form-control recommendation_input py-4 px-2">
                <div class="index"></div>
            </div>
        </td>
        <td>
                <button class="minusWithLink" type="button" id="${deleteButtonId}" style="border:none;">-</button>
        </td>
    `;

  document
    .getElementById(deleteButtonId)
    .addEventListener("click", function () {
      this.closest("tr").remove();
      updateIndices();
    });

  updateIndices();
}

function updateIndices() {
  var table = document.querySelector(".table-content2 table");
  var rows = table.querySelectorAll("tr");
  rows.forEach((row, index) => {
    var indexContainer = row.querySelector(".index");
    if (indexContainer) {
      indexContainer.textContent = index + 1; // Update the index display, +1 to make it 1-based
    }
  });
}

// Delete Button (Input)
document.addEventListener("DOMContentLoaded", function () {
  const deleteButton = document.getElementById("deleteButton2");
  function deleteSelectedRows() {
    const table = document.querySelector(".table-content2 table");
    const checkboxes = table.querySelectorAll(".row-checkbox");
    for (let i = checkboxes.length - 1; i >= 0; i--) {
      if (checkboxes[i].checked) {
        table.deleteRow(i + 1);
      }
    }
    for (let i = 1; i < table.rows.length; i++) {
      table.rows[i].cells[1].textContent = i; // Update the index column to match the row number
    }
    updateDeleteButtonState();
  }
  if (deleteButton) {
    deleteButton.addEventListener("click", deleteSelectedRows);
  }
});

// Modal
document.addEventListener("DOMContentLoaded", function () {
  var fileModal = document.getElementById("fileModal");
  if (fileModal) {
    $("#fileModal").on("shown.bs.modal", function () {
      var qrInput = document.getElementById("qrInput");
      var linkTextInput = document.getElementById("linkTextInput");

      document
        .getElementById("qrRadio")
        .addEventListener("change", function () {
          if (this.checked) {
            qrInput.style.display = "block"; // Show QR input
            linkTextInput.style.display = "none"; // Hide URL input
          }
        });

      document
        .getElementById("linkRadio")
        .addEventListener("change", function () {
          if (this.checked) {
            qrInput.style.display = "none"; // Hide QR input
            linkTextInput.style.display = "block"; // Show URL input
          }
        });
    });
  }
});

// Pagination
function showPage(pageNumber) {
  const table1 = document.getElementById("table1");
  const table2 = document.getElementById("table2");
  const pageLinks = document.querySelectorAll(".pagination .page-link");

  table1.style.display = "none";
  table2.style.display = "none";

  pageLinks.forEach((link) => {
    link.classList.remove("selected-page");
  });

  if (pageNumber === 1) {
    table1.style.display = "";
    pageLinks[2].classList.add("selected-page");
  } else if (pageNumber === 2) {
    table2.style.display = "";
    pageLinks[3].classList.add("selected-page");
  }
}

// Toggle Wizard Container
function getCurrentStep() {
  var steps = document.querySelectorAll(".step");
  for (var i = 0; i < steps.length; i++) {
    if (steps[i].classList.contains("active-step")) {
      return parseInt(steps[i].id.substring(4), 10);
    }
  }
  return 1;
}
function toggleContentContainer(tabNumber) {
  var container = document.querySelector(".d-flex");
  if (tabNumber === 1) {
    container.classList.add("content_container");
  } else {
    container.classList.remove("content_container");
  }
}

// Mission 10 Add Input
function addNewInput1() {
  var table = document.querySelector(".table1");
  var row = table.insertRow(-1);
  var deleteButtonId = "deleteButton" + table.rows.length;

  row.innerHTML = `
  <td>
    <div class="container_inputs w-50">
      <button class="minus" type="button" id="${deleteButtonId}" style="border:none;">-</button>
      <input type="text" placeholder="عنوان الدراسة"
        class="form-control mission10_input py-4 px-3">
    </div>
  </td>
`;

  document
    .getElementById(deleteButtonId)
    .addEventListener("click", function () {
      this.closest("tr").remove();
    });
}

function addNewInput2() {
  var table = document.querySelector(".table2");
  var row = table.insertRow(-1);
  var deleteButtonId = "deleteButton" + table.rows.length;

  row.innerHTML = `
  <td>
    <div class="container_inputs w-50">
      <button class="minus" type="button" id="${deleteButtonId}" style="border:none;">-</button>
      <input type="text" placeholder="ملخص الدراسة"
        class="form-control mission10_input py-4 px-3">
    </div>
  </td>
`;

  document
    .getElementById(deleteButtonId)
    .addEventListener("click", function () {
      this.closest("tr").remove();
    });
}

function addNewInput3() {
  var table = document.querySelector(".table3");
  var row = table.insertRow(-1);
  var deleteButtonId = "deleteButton" + table.rows.length;

  row.innerHTML = `
  <td>
    <div class="container_inputs w-50">
      <button class="minus" type="button" id="${deleteButtonId}" style="border:none;">-</button>
      <input type="text" placeholder="اكتب توصية"
        class="form-control mission10_input py-4 px-3">
    </div>
  </td>
`;

  document
    .getElementById(deleteButtonId)
    .addEventListener("click", function () {
      this.closest("tr").remove();
    });
}

function addNewInput4() {
  var table = document.querySelector(".table4");
  var row = table.insertRow(-1);
  var deleteButtonId = "deleteButton" + table.rows.length;

  row.innerHTML = `
  <td>
    <div class="container_inputs w-50">
      <button class="minus" type="button" id="${deleteButtonId}" style="border:none;">-</button>
      <input type="text" placeholder="رابط الدراسة"
        class="form-control mission10_input py-4 px-3">
    </div>
  </td>
`;

  document
    .getElementById(deleteButtonId)
    .addEventListener("click", function () {
      this.closest("tr").remove();
    });
}
// Checkbox
document.addEventListener("DOMContentLoaded", function () {
  var checkboxes = document.querySelectorAll(
    '.table3_mission8 input[type="checkbox"]'
  );
  checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener("change", function () {
      var sameGroupCheckboxes = document.querySelectorAll(
        'input[name="' + checkbox.name + '"]'
      );
      sameGroupCheckboxes.forEach(function (cb) {
        if (cb !== checkbox) {
          cb.checked = false;
        }
      });
    });
  });
});
