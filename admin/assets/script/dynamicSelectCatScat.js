window.addEventListener('load', () => {
	const cat = document.getElementById('categorie');
	const sc = document.getElementById('subCategorie');
	cat.addEventListener('change', ()  => {
		sc.disabled = true;
		$.get('../model/choosecat.php', {
			idCat: cat.value,
		}).done((data) => {
			sc.innerHTML = '';
			JSON.parse(data).forEach((e) => {
				let subcat = document.createElement('OPTION');
				subcat.value = e.name;
				let txt = document.createTextNode(e.name);
				subcat.appendChild(txt);
				sc.appendChild(subcat);
			});
			if (cat.value == 'Choisissez une catégorie') {
					sc.disabled = true;
					let opt = document.createElement('OPTION');
					opt.innerHTML = 'Choisissez une sous-catégorie';
					sc.appendChild(opt);
				} else {
					sc.disabled = false;
				}
		});
	});
});