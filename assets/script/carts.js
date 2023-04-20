window.addEventListener('load', () => {
    const idCust = document.getElementById('identifierCustomer');
    $.get('../model/totalCart.php', {
        identifierCustomer: idCust.value,
    }).done((data) => {
        JSON.parse(data).forEach((e) => {
            document.getElementById('totalOrder').innerHTML = e.sum_row_total;
        });
    });
});


function updateTableCart(q, ctId, pdtPr)
{
    $.get('../model/updateTableCart.php', {
        quantity: q,
        cartId: ctId,
        rowTotal: (pdtPr * q),
    })
    setTimeout(function() {
        window.location.reload();
    }, 1000);
}