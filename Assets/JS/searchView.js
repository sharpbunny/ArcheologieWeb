$('#jsville').bootcomplete({
    url:'sites/json',
    minLength : 1,
    method: 'post',
    dataParams: {
        data:'ville'
    },
    formParams: {
        'group' : $('#jsdepartement')
    }
});

$('#jsdepartement').bootcomplete({
    url:'sites/json',
    minLength : 1,
    method: 'post',
    dataParams: {
        data:'dept'
    }
});
