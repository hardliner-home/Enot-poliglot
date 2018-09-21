
const formWindow = $("#form-window");
const modalWindow = $("#modal")[0];
const result = $("#result")[0];
let lang = '';

// const phoneMask = new IMask(
//     document.getElementsByClassName('.'), {
//       mask: '+{7}(000)00-00-000'
// });

$(document).keypress((e) => {
    if (e.key == 'Escape') {
        closeModal();
    }
});

$(document).mouseup((e) => {
    if (!formWindow.is(e.target)
        && formWindow.has(e.target).length === 0) {
        closeModal();
    }
});

$('#modal-enroll').click(() => {
    const input_1 = $('#input-1').val();
    const input_2 = $('#input-2').val();

    const dataMessage = [input_1, input_2, lang];

    if (input_1 === '' || input_2 === '') {
        // css
        return false;
    }

    if ($('#modal-check').prop('checked') == true) {
        sendData(dataMessage);
        lang = '';
    }
    else {
        // css
    }
});

$('#study-enroll').click(() => {

    const input_1 = $('#study-name').val();
    const input_2 = $('#study-email').val();
    const dataMessage = [input_1, input_2];

    if (input_1 === '' || input_2 === '') {
        //
        return false;
    }

    if ($('#study-check').prop('checked') == true) {
        sendData(dataMessage);
    }
    else {
        //
    }

});

$('.enroll-window').click(() => {
    $('#input-2').attr('placeholder', 'Email');
    openModal();
});

$('.call-window').click(() => {
    $('#input-2').attr('placeholder', 'Телефон');
    openModal();
});

const sendData = (dataMessage) => {

    $.ajax({
        type: "POST",
        url: "mail.php",
        data: {data1: dataMessage[0], 
                data2: dataMessage[1], 
                data3: dataMessage[2]}
    }).done((request) => {
        if (request === 'done') {
            clearInput();
            closeModal();
        }
        openResult(request);
    });
};

const openResult = (req) => {
    result.style.display = 'block'

    $("#result").find('img').attr('src', './images/result/' + req + '.png');

    if (req === 'done') {
        const content = 'Ваша заявка отправлена'
        $("#result").find('p').html(content);
    }

    if (req !== 'done') {
        const content = 'Повторите позже'
        $("#result").find('p').html(content);
    }

    setTimeout(() => {
        result.style.display = 'none';
    }, 3000);
};

const openModal = () => {
    modalWindow.style.display = 'block';
};

const closeModal = () => {
    modalWindow.style.display = 'none';
};

const clearInput = () => {
    $("input").val('');
    $('[type="checkbox"]').attr('checked', false);
};

const setLanguage = (language) => {
    lang = language;
};