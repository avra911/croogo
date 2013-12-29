/**
 *
 * @type {$|*|jQuery|HTMLElement}
 */
var recalculeaza = $("#recalculeaza");
$(document).ready(function () {
    if($('#ComenziCodulCotatiei').val() != '') {
        recalculeaza.click();
    }
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
                $.each(obj.cotatii, function () {
                    var old_price = '';
                    if(this.old_price != this.valoare ) {
                        old_price = this.old_price;
                    }
                    rezultat +=
                        '<tr>' +
                            '<td><input type="radio" id="asigurator_' + this.denumire + '" name="data[Comenzi][asigurator]" index="' +
                            this.valoare + '" value="' + this.denumire + '" /></td>' +
                            '<td><label for="asigurator_' + this.denumire + '">' + this.denumire + '</label></td>' +
                            '<td>' + this.clasa_bm + '</td>' +
                            '<td><span class="pull-right old_price">' + old_price + '</span></td>' +
                            '<td><span class="pull-right">' + this.valoare + ' RON</span></td>' +
                        '</tr>'
                    ;
                });
                rezultat += '</table>';
                $('#rezultat').html(rezultat);
                $('#ComenziCodulCotatiei').val(obj.codul_cotatiei);
            }
        },
        complete: function (data) {
            recalculeaza.button('reset');
        }
    });
    event.preventDefault();
});

$(".table input[type=radio][name='data[Comenzi][asigurator]']").live('click', function () {
    $('#ComenziAsigurator').val($(this).val());
    $('#ComenziValoare').val($(this).attr('index'));
});