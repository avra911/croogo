var recalculeaza = $("#recalculeaza");
$(document).ready(function () {
    recalculeaza.click();
});

recalculeaza.click(function (event) {
    recalculeaza.button('loading');
    $.ajax({
        type: 'POST',
        url: ApiUrlAddress,
        data: $('#ComenziAdminAddForm').serialize(),
        success: function (data) {
            var obj = $.parseJSON(data);
            if (obj.eroare_ws) {
                $('#rezultat').html(obj.eroare_ws);
            }
            else {
                var rezultat = '<table class="table">';
                $.each(obj, function () {
                    rezultat +=
                        '<tr>' +
                            '<td><input type="radio" id="asigurator_' + this.denumire + '" name="asigurator" index="' +
                            this.valoare + '" value="' + this.denumire + '" /></td>' +
                            '<td><label for="asigurator_' + this.denumire + '">' + this.denumire + '</label></td>' +
                            '<td>' + this.clasa_bm + '</td>' +
                            '<td><span class="pull-right">' + this.valoare + 'RON</span></td>' +
                            '</tr>'
                    ;
                });
                rezultat += '</table>';
                $('#rezultat').html(rezultat);
            }

        },
        complete: function (data) {
            recalculeaza.button('reset');
        }
    });
    event.preventDefault();
});

$(".table input[name='asigurator']").live('click', function () {
    $('#ComenziAsigurator').val($(this).val());
    $('#ComenziValoare').val($(this).attr('index'));
});