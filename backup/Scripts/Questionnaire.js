
function countAnswers() {
    const form = document.getElementById('questionnaireForm');
    const answers = {};
    const formData = new FormData(form);

    for (let [name, value] of formData.entries()) {
        if (answers[value]) {
            answers[value]++;
        } else {
            answers[value] = 1;
        }
    }

    console.log(answers);
    //document.cookie = `questionnaire=${JSON.stringify(answers)}; path=/; max-age=${7 * 24 * 60 * 60}`;

    setCookie('questionnaire', JSON.stringify(answers));

    alert(JSON.stringify(answers));

}


function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

