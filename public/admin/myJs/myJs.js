class MyFetch{

	getData(url) {
	    return fetch(url).then(response => response.json());
	}

	deleteData(url) {
	    return fetch(url).then(response => response.json());
	}

	postData(url,data) {
	    return fetch(url,{
	        method: 'post',
	        headers: {
	            'X-CSRF-Token': data.get('_token')
	        },
	        body: data
	    }).then(response => response.json());
	}

}

class MyCode {
	async loadPeriode(id) {
		let mf = new MyFetch();
		let awal = await mf.getData('/api/profil');
        let periode = document.getElementById(id);
        let th = new Date().getFullYear();
        periode.innerHTML = `<option value="">Pilih Periode</option>`;
        try {
            for (let i = th; i >= awal.tahun; i--) {
                periode.innerHTML += `
                    <option>${i}</option>
                `;
            }
        	// return true;
        } catch(e) {
            alert(e);
        }
	}
}
