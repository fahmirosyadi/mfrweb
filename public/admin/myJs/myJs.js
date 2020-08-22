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
