updateQualificationRemoveButtons();
updateSkillRemoveButtons();

function addQualification() {
    var qualificationBox = document.getElementById('qualification-box');
    var multiBox = qualificationBox.querySelector('.multi-box');
    var duplicateBox = multiBox.cloneNode(true);
    qualificationBox.appendChild(duplicateBox);
    updateQualificationRemoveButtons();
}



function removeQualification(button) {
    button.closest('.multi-box').remove();
    updateQualificationRemoveButtons();
}

function addskills() {
    var skillBox = document.getElementById('skill-box');
    var multiBox = skillBox.querySelector('.multi-box');
    var duplicateBox = multiBox.cloneNode(true);
    skillBox.appendChild(duplicateBox);
    updateSkillRemoveButtons();
}

function removeskill(button) {
    button.closest('.multi-box').remove();
    updateSkillRemoveButtons();
}

function updateQualificationRemoveButtons() {
    var boxes = document.getElementById('qualification-box').getElementsByClassName('multi-box');
    if (boxes.length === 1) {
        boxes[0].querySelector('.remove-btn').disabled = true;
    } else {
        for (var i = 0; i < boxes.length; i++) {
            boxes[i].querySelector('.remove-btn').disabled = false;
        }
    }
}




function updateSkillRemoveButtons() {
    var boxes = document.getElementById('skill-box').getElementsByClassName('multi-box');
    if (boxes.length === 1) {
        boxes[0].querySelector('.remove-btn').disabled = true;
    } else {
        for (var i = 0; i < boxes.length; i++) {
            boxes[i].querySelector('.remove-btn').disabled = false;
        }
    }
}