window.addEventListener('load', () => {
    const selectOrder = document.getElementById('selectOrder');
    const identifierCustomer = document.getElementById('identifierCustomer');
    const order = document.querySelector('tbody');
    if (selectOrder.value == 'choice') {
        document.querySelector('thead').innerHTML = '';
        let title = document.createElement('h3');
        title.classList.add('opacity-25', 'mt-3', 'ms-3');
        title.innerHTML = 'Aucune commande sélectionnée';
        order.appendChild(title);
    }
    selectOrder.addEventListener('change', () => {
    if (selectOrder.value == 'choice') {
        document.querySelector('thead').innerHTML = '<h3 class="opacity-25 mt-3 ms-3">Aucune commande sélectionnée</h3>';
    }else {
        document.querySelector('thead').innerHTML = '<tr><th>PRODUIT(S)</th><th class=" text-center">PRIX</th><th class=" text-center">QUANTITÉ</th><th class=" text-center">TOTAL</th></tr>';
    } 
    identifierCustomer.disabled = true;
    $.get('../model/chooseOrderHistory.php', {
        identifierOrder: selectOrder.value,
        identifierCustomer: identifierCustomer.value,
    }).done((data) => {
        order.innerHTML = '';
        JSON.parse(data).forEach((e) => {
            let Row = document.createElement('tr');
            let ColOne = document.createElement('td');
            let ColTwo = document.createElement('td');
            ColTwo.classList.add('text-center');
            let ColThree = document.createElement('td');
            ColThree.classList.add('text-center');
            let ColFour = document.createElement('td');
            ColFour.classList.add('text-center');
            ColOne.textContent = e.products_name;
            ColTwo.textContent = e.price;
            ColThree.textContent = e.carts_quantity;
            ColFour.textContent = e.carts_row_total;
            Row.appendChild(ColOne);
            Row.appendChild(ColTwo);
            Row.appendChild(ColThree);
            Row.appendChild(ColFour);
            order.appendChild(Row);
            console.log(document.querySelectorAll('TOTAL'));
            });
        });
    });
});